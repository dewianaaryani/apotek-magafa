<?php

namespace App\Http\Controllers;

use App\Models\Transaction_Detail;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use DB;
class TransactionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addDetailTransaction(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        // $total = Transaction_Detail::where('transaction_id', '=', $id)->sum('transaction_details.')
        
        // $dTransactions = DB::table('transaction_details')->where('transaction_id', '=', $id)->latest()->paginate(5);
        $dTransactions = Transaction_Detail::where('transaction_id', '=', $id)->latest()->paginate(5);
        return view('transaction_details.index', compact('transaction', 'dTransactions'))
            ->with('i', (request()->input('page', 1) -1) *5);
    }
    public function createDetailTransaction($id){
        $transaction = Transaction::find($id);
        $products = Product::all();
        return view('transaction_details.create', compact('transaction', 'products'));
    }
    public function storeDetailTransaction(Request $request, $id){
        $transaction = Transaction::find($id);
        $request->validate([
            'product_id' => 'required',
            'qty' => 'required',
        ]);
        
        $dTransaction = new Transaction_Detail;
        $dTransaction->transaction_id = $id;
        $dTransaction->product_id = $request->product_id;
        $dTransaction->qty = $request->qty;
        $dTransaction->save();
        $product = Product::find($request->product_id);
        $product->stok = $product->stok - $dTransaction->qty;
        $product->update();
        $transaction->total = $transaction->total + ($product->harga_jual * $dTransaction->qty);
        $transaction->update();
        $stock = Stock::where('product_id', $product->id);
        $stock = new Stock;
        $stock->product_id = $product->id;
        $stock->qty = $dTransaction->qty;
        $stock->kind = "terjual";
        $stock->save();
        return redirect()->route('addDetailTransaction', $transaction->id)
            ->with('success', 'success added detail transactions');
    }
     public function index()
    {
        echo "hello world";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "hello world";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction_Detail  $transaction_Detail
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction_Detail $transaction_Detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction_Detail  $transaction_Detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction_Detail $transaction_Detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction_Detail  $transaction_Detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction_Detail $transaction_Detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction_Detail  $transaction_Detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction_Detail $transaction_Detail)
    {
        //
    }
}
