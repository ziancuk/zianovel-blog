<?php

namespace App\Http\Controllers;

use App\Models\Loket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('dashboard.login');
    }

    public function getRegister()
    {
        return view('dashboard.register');
    }

    public function postRegister(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:3',
                'username' => 'required|unique:users,username|min:3',
                'password' => 'required|min:6'
            ],
            [
                'required' => 'Form Tidak Boleh Kosong!',
                'password.min' => 'Kata Sandi Minimal 6 Karakter',
                'min' => 'Minimal 3 huruf',
                'unique' => 'Username sudah digunakan. Silahkan ganti username anda!',
            ]
        );
        User::create([
            'name' => ucfirst($request->name),
            'username' => strtolower($request->username),
            'password' => bcrypt($request->password)
        ]);
        return redirect('/login')->with('status', 'Registrasi berhasil. Silahkan melakukan Login.');
    }
    public function login(Request $request)
    {
        if (Auth::attempt(['username' => strtolower($request->username), 'password' => $request->password])) {
            return redirect('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Username/Password tidak sesuai');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
