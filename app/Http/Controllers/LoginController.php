<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

  public function login()
  {
    return view('login');
  }

  public function authenticate(Request $request)
  {

    $credentials = $request->validate([
      'email' => 'required',
      'password' => 'required',
    ]);
    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      switch (auth::user()->name) {
        case 'Front Office':
          return redirect()->intended('/homefo');
          break;
        case 'Admin':
          return redirect()->intended('/homeadmin');
          break;
        default:
          return '/login';
          break;
      }
    }


    return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
  }

  public function logout()
  {
    Auth::logout();

    return redirect('/login');
  }
}
