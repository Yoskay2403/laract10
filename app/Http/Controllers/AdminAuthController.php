<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.index");
    }

    function login(Request $request) {
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ],[
            'username.required'=>'Username wajib di isi',
            'password.required'=>'Password wajib di isi',
        ]);

        $data = [
            'username'=>$request->username,
            'password'=>$request->password,
        ];

        if(Auth::attemt($data)){
            // Kalau otentikasi sukses
            return 'sukses';
        } else {
            // Kalau otentikasi gagal
            return 'gagal';
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    // /**
    //  * Display the specified resource.
    //  */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}