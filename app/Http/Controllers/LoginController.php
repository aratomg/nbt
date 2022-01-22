<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('page.login');
    }

    public function check(Request $request)
    {
        $user = $request->only('identifiant', 'password');
        if (Auth::attempt($user)) {
            $userAuth = Auth::user();
            if ($userAuth->type === 'admin') {
                return redirect('/index');
            }
        }
        return back()->with('error', 'erreur');
    }
}
