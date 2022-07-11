<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class ManagerController extends Controller
{
    public function index()
    {
      $users = User::orderBy('created_at', 'desc')->get();
      return view('ManagerBladeFiles.manager-index-page', compact('users'));
    }

    public function viewUser(User $user_id)
    {
      $user = User::where('id', $user_id->id)->get();
      return view('ManagerBladeFiles.view-user-page', compact('user'));
    }
}
