<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductSaleController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->orderBy('id', 'desc')->get();
        return view('backend.pages.sales.index', compact('products'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                "product_id" => "required",
                "qty" => "required|numeric",
                "note" => "nullable|string",
            ]);

            $product = DB::table('products')->where('id', $validatedData['product_id'])->first();

            if ($product->stock < $validatedData['qty']) {
                return redirect()->back()->with("error", "Out of stock")->withInput();
            }

            $id = $product->id;
            $total = $validatedData['qty'] * $product->price;
            $qty = $product->stock - $validatedData['qty'];

            DB::beginTransaction();

            // Insert into transactions table
            DB::table('transactions')->insert([
                'product_id' => $id,
                'qty' => $validatedData['qty'],
                'note' => $validatedData['note'],
                'total' => $total,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Update the products table
            DB::table('products')->where('id', $id)->update([
                'stock' => $qty,
                'updated_at' => now(),
            ]);

            DB::commit(); // If everything succeeds, commit the transaction

            return redirect()->back()->with("success", "Transaction successfully completed");
        } catch (\Exception $e) {
            DB::rollback(); // If an exception occurs, roll back the transaction
            return redirect()->back()->with("error", "Transaction failed: " . $e->getMessage())->withInput();
        }
    }

}
