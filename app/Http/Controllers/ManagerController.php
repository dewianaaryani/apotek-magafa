<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as Manager;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managers = Manager::where('role','=', 'manager')->paginate(5);
        
        return view('users.managers.index', compact('managers'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.managers.create');
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
            'role' => "manager",
            'email' => $dataRequest['email'],
            'password' => $dataRequest['password'],
        ];
        Manager::create($data);
        return redirect()->route('managers.index')->with('success', 'success added data!');
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
    public function edit(Manager $manager)
    {
        return view('users.managers.edit', compact('manager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $manager)
    {
        $request -> validate([
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required'
        ]);

        $manager->update($request->all());
        return redirect()->route('managers.index')
            ->with('success', 'Manager updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        $manager->delete();
        return redirect()->route('managers.index')
            ->with('success', 'Manager deleted successfully!');
    }
}
