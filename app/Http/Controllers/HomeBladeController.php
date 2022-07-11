<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeBladeController extends Controller
{
    public function loginForm()
    {
      return view('HomeBladeFiles.login');
    }

    public function registerForm()
    {
      return view('HomeBladeFiles.register');
    }


    public function forGotPasswordForm()
    {
      return view('HomeBladeFiles.forgot-password');
    }


}
