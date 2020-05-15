<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class adminLoginController extends Controller
{
    public function login()
    {
        return view('admin.account.login');
    }
    public function post_login(Request $req)
    {
        $email = $req->email;
        $password = $req->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('themsp');
        }
        else {
            return redirect()->back()->with('alert', 'Updated!');
        }
    }
}