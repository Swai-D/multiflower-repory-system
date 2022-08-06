<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeBladeController extends Controller
{
  public function waitingPage()
  {
    return view('HomeBladeFiles.waiting-page');
  }

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

    public function resendPasswordForm()
    {
      return view('HomeBladeFiles.resend-password');
    }


}
