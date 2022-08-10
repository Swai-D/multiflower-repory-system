<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Report;


class ManagerController extends Controller
{
    public function index()
    {
      $users = User::where('email', '!=', 'davyswai@gmail.com')->orWhere('name', '!=', 'Davy Swai')->orderBy('created_at', 'desc')->get();
      return view('ManagerBladeFiles.manager-index-page', compact('users'));
    }

    public function viewUser(User $user_id)
    {
      $user = User::where('id', $user_id->id)->get();
      $userReports= Report::where('userId', $user_id->id)->get();
      $userReportsCount = Report::where('userId', $user_id->id)->count();
      return view('ManagerBladeFiles.view-user-page', compact('user', 'userReports', 'userReportsCount'));
    }

    public function deleteUserPage(User $user_id)
    {
      $user = User::where('id', $user_id->id)->get();
      $userReports= Report::where('userId', $user_id->id)->get();
      $userReportsCount = Report::where('userId', $user_id->id)->count();
      return view('ManagerBladeFiles.delete-user-page', compact('user', 'userReports', 'userReportsCount'));
    }

    public function registerNewStaffForm()
    {
      return view('HomeBladeFiles.manager-register-new-staff');
    }

    public function createNewStaff(Request $request)
    {
      $data = $request-> validate([
          'name' => ['required', 'string', 'max:255'],
          'section' => ['required', 'string', 'max:255'],
          'status' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
      ]);

      if (isset($data)) {
        User::create([
            'name' => $data['name'],
            'section' => $data['section'],
            'status' => $data['status'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect('/Multiflower-Report-System/manager-home-page')->with('Message', 'Staff Was Created Successfully!');
      }
    }

    public function updateUserDetails(Request $request, User $user)
    {
      // dd($request->name);
      if (isset($request->name)) {
          User::where('id', '=', $user->id)->update(['name' => $request->name]);

      }
      if (isset($request->email)) {
          User::where('id', '=', $user->id)->update(['email' => $request->email]);

      }

      if (isset($request->section)) {
          User::where('id', '=', $user->id)->update(['section' => $request->section]);

      }
      if (isset($request->status)) {
          User::where('id', '=', $user->id)->update(['status' => $request->status]);

      }

      return redirect()->back()->with('Message', 'Staff Details Was Updated Succesfuly !');
    }


    public function makeMeAdminPage(User $user)
    {

      $userAdmin = User::where('id', $user->id)->get();
      return view('ManagerBladeFiles.make-me-admin-page', compact('userAdmin'));
    }

    public function removeMeAdminPage(User $user)
    {

      $userAdmin = User::where('id', $user->id)->get();
      return view('ManagerBladeFiles.remove-me-admin-page', compact('userAdmin'));
    }

    public function makeMeAdmin(Request $request, User $user)
    {
      User::where('id', '=', $user->id)->update(['userType' => 'managerAccess']);
      return redirect('/Multiflower-Report-System/view-user-page/'.$user->id)->with('Message', 'You have Succesfuly make !'.$user->name. ' an Admin');
    }

    public function removeAdminAccess(Request $request, User $user)
    {
      User::where('id', '=', $user->id)->update(['userType' => 'Normal']);
      return redirect('/Multiflower-Report-System/view-user-page/'.$user->id)->with('Message', 'You have Succesfuly Remove '.$user->name. ' Admin Privilage');
    }

    public function deleteStaff(User $user)
    {
      if ($user->userType == 'admin') {
        return redirect()->back()->with('Message', 'You Have No Mandatory To Delete This User In The Record, Please Contact Your Admin To Grant You Such Privilage, Thank You !');
      }

      else {

          User::where('id', '=', $user->id)->delete();
          Report::where('userId', '=', $user->id)->delete();
          return redirect('/Multiflower-Report-System/manager-home-page')->with('Message', 'You Have Succesfuly Remove '.$user->name. ', In The Records, Thank You !');
      }

    }

    public function deleteStaffReportPage(Report $report)
    {
          $userReport = Report::where('id', '=', $report->id)->get();
          return view('ManagerBladeFiles.delete-user-report-page', compact('userReport'));
    }

    public function deleteStaffReport(Report $report)
    {
          Report::where('id', '=', $report->id)->delete();
          // Storage::disk('s3')->delete('Uploads/avatars/'.$avatarName);
          return redirect('/Multiflower-Report-System/home-page')->with('Message', 'You Have Succesfuly Remove The Report In The Records, Thank You !');


    }

}
