<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function prosesLogin(Request $request)
    {
        $user = User::where('email', $request->email)
                    ->where('password', $request->password)
                    ->first();

        if($user){

            session([
                'id' => $user->id,
                'nama' => $user->nama,
                'role' => $user->role
            ]);

            if($user->role == 'admin'){

                return redirect('/admin/dashboard');

            } else {

                return redirect('/');

            }

        } else {

            return back()->with('error', 'Login gagal');
        }
    }

    public function logout()
    {
        session()->flush();

        return redirect('/login');
    }
}