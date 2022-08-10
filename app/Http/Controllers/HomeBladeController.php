<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Report;


use Auth;
use Image;
use File;

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


    public function userSettingsPage(User $user_id)
    {
      $user = User::where('id','=', $user_id->id)->get();
      $userReportsCount = Report::where('userId','=', $user_id->id)->count();
      return view('HomeBladeFiles.user-settings-page', compact('user', 'userReportsCount'));
    }


    public function updateProfile(Request $request, User $user)
  {

    // dd($request->name);
    if (isset($request->name)) {
        User::where('id', '=', $user->id)->update(['name' => $request->name]);

    }
    if (isset($request->email)) {
        User::where('id', '=', $user->id)->update(['email' => $request->email]);

    }

      // save image
      if (request()->file('avatar')) {


      $mime = request()->file('avatar')->getMimeType();



       if(strstr($mime, "image/")){

         //Delete the Old IMAGE AVATAR from  avatar Folder (Save Space)
         $imagePath = explode('/', $user->avatar);
         $avatarName = $imagePath[5];
         Storage::disk('s3')->delete('Uploads/avatars/'.$avatarName);

         //store another avatar
         $user_image = request()->file('avatar');
         $filename = time().'.'.$user_image->getClientOriginalExtension();
         Image::make($user_image)->resize(300, 300);
         $filePath = 'Uploads/avatars/'.$filename;
         Storage::disk('s3')->put($filePath, file_get_contents($user_image));
         $filePath = Storage::disk('s3')->url($filePath);
         $user = Auth::user();
         $user->avatar = $filePath;
         $user ->save();


       }

       else {
           return redirect()->back()->with('Message', 'The Uploaded File was Not a Photo/Image, Please Try To Upload Image Format, Thank You !');
       }



    }



    return redirect()->back();

}


}
