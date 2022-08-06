<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





//**************************HomeBladeController*********************************
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/Multiflower-Report-System/login-page', [App\Http\Controllers\HomeBladeController::class, 'loginForm'])->middleware('guest');
Route::get('/Multiflower-Report-System/waiting-page', [App\Http\Controllers\HomeBladeController::class, 'waitingPage'])->middleware('auth');
Route::get('/Multiflower-Report-System/register-page', [App\Http\Controllers\HomeBladeController::class, 'registerForm']);
Route::get('/Multiflower-Report-System/forgot-password-page', [App\Http\Controllers\HomeBladeController::class, 'forGotPasswordForm'])->middleware('guest');
Route::get('/Multiflower-Report-System/resend-password-page', [App\Http\Controllers\HomeBladeController::class, 'resendPasswordForm'])->middleware('guest');
Route::get('/', function(){return redirect('/Multiflower-Report-System/login-page'); });
//**************************end*************************************************

//*****************************waitingPage***************************************
Route::get('/Multiflower-Report-System/waiting-page', [App\Http\Controllers\HomeBladeController::class, 'waitingPage'])->middleware('auth');

//*****************************end***********************************************

//**************************ReportController*********************************
Route::get('/Multiflower-Report-System/home-page', [App\Http\Controllers\ReportController::class, 'index'])->middleware(['auth','AuthorizedUsers']);
Route::get('/Multiflower-Report-System/compose-report', [App\Http\Controllers\ReportController::class, 'create'])->middleware(['auth','AuthorizedUsers']);
Route::post('/Multiflower-Report-System/store-report', [App\Http\Controllers\ReportController::class, 'store'])->middleware(['auth','AuthorizedUsers']);
Route::get('/Multiflower-Report-System/reply-report', [App\Http\Controllers\ReportController::class, 'reply'])->middleware(['auth','AuthorizedUsers']);
Route::get('/Multiflower-Report-System/view-report/{report_id}', [App\Http\Controllers\ReportController::class, 'show'])->middleware(['auth','AuthorizedUsers']);
Route::get('/Multiflower-Report-System/view-my-reports-list', [App\Http\Controllers\ReportController::class, 'myReports'])->middleware(['auth','AuthorizedUsers']);
//**************************end*************************************************


//**************************ManagerController*********************************
Route::get('/Multiflower-Report-System/manager-home-page', [App\Http\Controllers\ManagerController::class, 'index'])->middleware(['auth','AuthorizedUsers']);
Route::get('/Multiflower-Report-System/view-user-page/{user_id}', [App\Http\Controllers\ManagerController::class, 'viewUser'])->middleware(['auth','AuthorizedUsers']);
Route::get('/Multiflower-Report-System/delete-user-page/{user_id}', [App\Http\Controllers\ManagerController::class, 'deleteUserPage'])->middleware(['auth','AuthorizedUsers']);
Route::get('/Multiflower-Report-System/manager-register-new-staff-page', [App\Http\Controllers\ManagerController::class, 'registerNewStaffForm']);
Route::get('/Multiflower-Report-System/manager-make-me-admin-access/{user}', [App\Http\Controllers\ManagerController::class, 'makeMeAdminPage']);
Route::get('/Multiflower-Report-System/manager-remove-me-admin/{user}', [App\Http\Controllers\ManagerController::class, 'removeMeAdminPage']);
Route::get('/Multiflower-Report-System/manager-remove-user-admin-access/{user}', [App\Http\Controllers\ManagerController::class, 'removeAdminAccess']);
Route::get('/Multiflower-Report-System/manager-make-me-admin/{user}', [App\Http\Controllers\ManagerController::class, 'makeMeAdmin']);
Route::get('/Multiflower-Report-System/manager-delete-staff/{user}', [App\Http\Controllers\ManagerController::class, 'deleteStaff']);
Route::post('/Multiflower-Report-System/manager-update-staff-page/{user}', [App\Http\Controllers\ManagerController::class, 'updateUserDetails']);
Route::post('/Multiflower-Report-System/manager-register-new-staff-store-page', [App\Http\Controllers\ManagerController::class, 'createNewStaff']);


//**************************end*************************************************


//**************************DirectMessageController*********************************
Route::get('/Multiflower-Report-System/direct-message-home-page', [App\Http\Controllers\DirectMessageController::class, 'index'])->middleware(['auth','AuthorizedUsers']);
Route::get('/Multiflower-Report-System/direct-message-show-page', [App\Http\Controllers\DirectMessageController::class, 'show'])->middleware(['auth','AuthorizedUsers']);
Route::get('/Multiflower-Report-System/direct-message-create-sms/{user_id}', [App\Http\Controllers\DirectMessageController::class, 'create'])->middleware(['auth','AuthorizedUsers']);
Route::post('/Multiflower-Report-System/direct-message-send-sms', [App\Http\Controllers\DirectMessageController::class, 'store'])->middleware(['auth','AuthorizedUsers']);
Route::get('/Multiflower-Report-System/direct-message-read-sms/{direct_messages}', [App\Http\Controllers\DirectMessageController::class, 'show'])->middleware(['auth','AuthorizedUsers']);

//**************************end*************************************************




Auth::routes();
