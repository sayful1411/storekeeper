<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = DB::table('transactions')
                        ->join('products', 'transactions.product_id', '=', 'products.id')
                        ->select('transactions.*', 'products.name as product_name')
                        ->orderBy('id', 'desc')
                        ->get();
        return view('backend.pages.transactions.index', compact('transactions'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = DB::table('transactions')
        ->join('products', 'transactions.product_id', '=', 'products.id')
        ->select('transactions.*', 'products.name as product_name')
        ->where('transactions.id', $id)
        ->first();

        if($transaction == null){
            abort(404);
        }

        return view('backend.pages.transactions.show', compact('transaction'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->transaction_id;

        DB::table('transactions')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Transactions deleted successfully.');
    }
}
