<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Transaction_Detail;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test($id){
        $transaction = Transaction::find($id);
        $dTransactions = Transaction_Detail::where('transaction_id', '=', $id);
        $data['transaction'] = $transaction;
        $data['dTransactions'] = $dTransactions;
        return view('print', compact('data'));
    }
    public function printTransaction(Request $request, $id){
        $transaction = Transaction::find($id);
        $dTransactions = Transaction_Detail::where('transaction_id', '=', $id)->get();
        $data = [
            'transaction' => $transaction,
            'dTransactions' => $dTransactions
        ];
        $pdf = PDF::loadView('print', $data);
     
        return $pdf->download('itsolutionstuff.pdf');
        

        
        // return view('transaction_details.create', compact('transaction', 'products'));
    }
    public function payTransaction($id){
        $transaction = Transaction::find($id);
        return view('transactions.pay', compact('transaction'));
    }
    public function endTransaction(Request $request, $id){
        $transaction = Transaction::find($id);
        $request->validate([
            'pay' => 'required',
        ]);
        $transaction->pay = $request->pay;
        $transaction->change = $request->pay - $transaction->total;
        $transaction->update();
        return redirect()->route('printTransaction', $transaction->id);
    }
    public function index()
    {
        
        $transactions = Transaction::query()
            ->join('users as customer', 'customer.id','=', 'customer_id')
            ->join('users as cashier', 'cashier.id', '=', 'cashier_id' )
            ->select(   'transactions.id as id',
                        'transactions.total as total',
                        'transactions.pay as pay',
                        'transactions.change as change',
                        'customer.name as customer_name',
                        'cashier.name as cashier_name',
                        'transactions.created_at as created_at'
            )->latest()->paginate(5);
        return view('transactions.index', compact('transactions'))
            ->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = User::where('role','=', 'customer')->get();
        $cashiers = User::where('role','=', 'cashier')->get();
        return view('transactions.create', compact('customers','cashiers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id',
        ]);
        $transaction = Transaction::create($request->all());
        // dd($transaction->id);
        return redirect()->route('addDetailTransaction', $transaction->id)
            ->with('success', 'success create transaction!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $dTransactions = Transaction_Detail::where('transaction_id', $transaction->id)->get();
        $dTransactions->each->delete();
        $transaction->delete();
        return redirect()->route('transactions.index')
            ->with('success', 'Success delete transactions');
    }
}
