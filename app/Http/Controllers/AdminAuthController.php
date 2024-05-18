<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    public function index(){
        return view("admin/index");
    }

    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $data = [
            'username'=> $request->username,
            'password'=> $request->password
        ];

        if(Auth::attempt($data)){
            // Kalau otentikasi sukses
            return 'sukses';
        } else{
            // Kalau otentikasi gagal
            return 'gagal';
        }
        
    }
}

    // public function showLoginForm()
    // {
    //     return view('admin.login');
    // }

    //     public function login(Request $request)
    //     {
    //         // Membuat validator dengan aturan validasi
    //         $validator = Validator::make($request->all(), [
    //             'username' => 'required|string',
    //             'password' => 'required|string',
    //             'admin_level' => 'required|string'
    //         ]);
            
    //          // Memeriksa apakah validasi gagal
    //         if ($validator->fails()) {
    //             return redirect()->back()->withErrors($validator)->withInput();
    //         }
            
    //         // Mengambil kredensial dari input yang sudah valid
    //         $credentials = $request->only('username', 'password', 'admin_level');
    
    //         // Check if admin already exists
    //         $admin = Admin::where('username', $credentials['username'])->first();
    //         if (!$admin) {
    //             // Create new admin
    //             $admin = Admin::create([
    //                 'username' => $credentials['username'],
    //                 'password' => Hash::make($credentials['password']),
    //                 'admin_level' => $credentials['admin_level'],
    //             ]);
    //         }
    
    //            // Mencoba login dengan kredensial tersebut
    //         if (Auth::guard('admin')->attempt($request->only('username', 'password'))) {
    //              // Jika login berhasil, arahkan ke halaman dashboard
    //             return redirect()->intended('/admin/dashboard');
    //         }
            
    //          // Jika login gagal, arahkan kembali ke halaman login dengan pesan error
    //         return redirect()->back()->withErrors(['message' => 'Invalid username or password']);
    //     }
    
    //     public function logout()
    //     {
    //         // Melakukan logout dan mengarahkan ke halaman login
    //         Auth::guard('admin')->logout();
    //         return redirect('/admin/login');
    //     }