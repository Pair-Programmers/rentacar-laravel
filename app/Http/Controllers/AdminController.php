<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'email' => 'required'
        ]);

        $user = \App\Models\User::where('email', $request->email)->get()->first();

        if($user){
            if(Hash::check($request->password, $user->password)){
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()->withErrors(['password'=>'Invalid credentials']);
            }
        } else {
            return redirect()->back()->withErrors(['email'=>'User not found']);
        }

        // $user->name = $request->name;
        // $user->role = $request->role;
        // $user->email = $request->email;
        // if($request->filled('password')){
        //     $user->password = $request->password;
        // }
        // $user->save();
        // return redirect()->back();
    }

    public function showDashboardPaage()
    {
        return view('adminpanel.pages.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginPaage()
    {
        return view('adminpanel.pages.login');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
