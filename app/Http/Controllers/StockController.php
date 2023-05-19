<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewStock($id){
        $product = Product::find($id);
        $stocks = Stock::where('product_id','=', $product->id)->latest()->paginate(5);
        // echo $stocks;
        return view('stocks.viewStock', compact('product', 'stocks'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }
    public function editStock($id){
        $product = Product::find($id);
        return view('stocks.editStock', compact('product'));
    }
    public function editStockPost(Request $request, Product $product, Stock $stock,$id)
    {
        
        $product = Product::find($id);
        $request->validate([
            'qty' => 'required',
            'kind_stock' => 'required'
        ]);
        $stock = new Stock();
        $stock->product_id = $id;
        $stock->qty = $request->qty;
        $stock->kind = $request->kind_stock;
        if ($stock -> kind == "masuk") {
            $productStock = $product->stok + $stock->qty;
        }else if ($stock -> kind == "retur") {
            $productStock = $product->stok - $stock->qty;
        }
        
        $stock->save();
        $product->stok = $productStock;
        $product->update();
     
        return  redirect()->route('viewStock', $product->id)
            ->with('success', 'success added stock!');
    }
    public function deleteStockPost(Request $request, Product $product, Stock $stock,$id){
        $stock = Stock::find($id);
        $product = Product::where('id','=', $stock->product_id)->first();
        if ($stock -> kind == "masuk") {
            $productStock = $product->stok - $stock->qty;
        }else if ($stock -> kind == "retur") {
            $productStock = $product->stok + $stock->qty;
        }else if ($stock -> kind == "terjual") {
            $productStock = $product->stok + $stock->qty;
        }
        
        $stock->delete();
        // If softdeleted

            DB::table('products')->where('id', $stock->product_id)
              ->update(array('stok' => $productStock));
        
        
        return redirect()->route('viewStock',  $stock->product_id)->with('success','Stock deleted successfully');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
