<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function dashboard()
    {
        if(Auth::check() === true){
            return view('admin.dashboard');
        }

        return redirect()->route('admin.login');

    }

    public function showLoginForm()
    {
        return view('admin.formLogin');
    }

    public function login(Request $request)
    {
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return redirect()->back()->withInput()->withErros(['Dados do Email Inválido!']);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){
            return redirect()->route('mostrar_painel');
        }

        return redirect()->back()->withInput()->withErros(['Dados Inválidos!']);

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin');
    }

}
