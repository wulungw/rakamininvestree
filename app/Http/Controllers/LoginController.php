<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

  public function login()
  {
    return view('/');
  }

  public function authenticate(Request $request)
  {;
    $credentials = $request->validate([
      'email' => 'required',
      'password' => 'required',
    ]);
    
    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      switch (auth::user()->name) {
        case 'admin':
          return redirect()->intended('/home');
          break;
        case 'Admin2':
          return redirect()->intended('/homeadmin');
          break;
        default:
          return '/login';
          break;
      }
    }

    return redirect('/')->with('error', 'Email / Password salah!');
  }

  public function logout()
  {
    Auth::logout();

    return redirect('/');
  }
}
