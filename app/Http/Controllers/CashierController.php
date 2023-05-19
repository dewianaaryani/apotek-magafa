<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as Cashier;

class CashierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashiers = Cashier::where('role', '=', 'cashier')->paginate(5);
        return view('users.cashiers.index', compact('cashiers'))->with('i', (request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.cashiers.create');
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
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required'
        ]);
        $dataRequest =  $request->all();
        $data = [
            'name' => $dataRequest['name'],
            'address' => $dataRequest['address'],
            'phone_number' => $dataRequest['phone_number'],
            'role' => "cashier",
            'email' => $dataRequest['email'],
            'password' => $dataRequest['password'],
        ];
        Cashier::create($data);
        return redirect()->route('cashiers.index')->with('success', 'success added data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cashier $cashier)
    {
        return view('users.cashiers.edit', compact('cashier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cashier $cashier)
    {
        $request -> validate([
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required'
        ]);

        $cashier->update($request->all());
        return redirect()->route('cashiers.index')
            ->with('success', 'Kasir updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cashier $cashier)
    {
        $cashier->delete();
        return redirect()->route('cashiers.index')
            ->with('success', 'Kasir deleted successfully!');
    }
}
