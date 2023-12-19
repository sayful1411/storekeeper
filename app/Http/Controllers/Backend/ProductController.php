<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = DB::table('products')->orderBy('id','desc')->get();
        return view('backend.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|string|max:150",
            "price" => "required|numeric",
            "stock" => "required|numeric",
            "description" => "required|string"
        ]);

        DB::table('products')->insert([
            "name" => $validatedData["name"],
            "price" => $validatedData["price"],
            "stock" => $validatedData["stock"],
            "description" => $validatedData["description"],
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        return redirect()->back()->with("success", "product added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        if($product == null){
            abort(404);
        }

        return view('backend.pages.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        if($product == null){
            abort(404);
        }

        return view('backend.pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            "name" => "required|string|max:150",
            "price" => "required|numeric",
            "stock" => "required|numeric",
            "description" => "required|string"
        ]);

        DB::table('products')->where('id', $id)->update([
            "name" => $validatedData["name"],
            "price" => $validatedData["price"],
            "stock" => $validatedData["stock"],
            "description" => $validatedData["description"],
            "updated_at" => now(),
        ]);

        return redirect()->back()->with("success", "product updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->product_id;
        DB::table('products')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    public function sale()
    {
        $products = DB::table('products')->orderBy('id','desc')->get();
        return view('backend.pages.products.sale', compact('products'));
    }
}
