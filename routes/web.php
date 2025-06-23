<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\Pages\Dashboard;
use App\Http\Livewire\Pages\NoAccess;
use App\Http\Livewire\Pages\InactiveAccount;
use App\Http\Livewire\Pages\Application;
use App\Http\Livewire\Pages\Facilities\ListFacilities;
use App\Http\Livewire\Pages\Facilities\ListAccreditations;
use App\Http\Livewire\Pages\Facilities\ProfileFacility;
use App\Http\Livewire\Pages\Practitioners\ListPractitioners;
use App\Http\Livewire\Pages\Practitioners\ListCertifications;
use App\Http\Livewire\Pages\Practitioners\ProfilePractitioner;
use App\Http\Livewire\Pages\Practitioners\ViewCertificate;
use App\Http\Livewire\Pages\Practitioners\FileUpload;
use App\Http\Livewire\Pages\Users\ListUsers;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/email', function () {
    return view('auth.passwords.email');
});
Route::get('/reset', function () {
    return view('auth.passwords.reset');
});

Route::get('/application', function () {
    return view('livewire.pages.application');
});
Route::get('/apply-certification', function () {
    return view('livewire.pages.practitioners.form-application-certification');
})->name('apply-certification');

Auth::routes(['verify' => true]);
Route::group(['middleware' => ['auth', 'verified', 'ActivatedAccountAccess']], function(){
    Route::get('/pages/dashboard', Dashboard::class)->name('dashboard');
    
    Route::get('/pages/practitioners/list-practitioners', ListPractitioners::class)->name('list-practitioners');
    Route::get('/pages/practitioners/list-certifications', ListCertifications::class)->name('list-certifications');
    Route::get('/pages/practitioners/profile-practitioner/{param}', ProfilePractitioner::class)->name('profile-practitioner');
    Route::get('/pages/facilities/list-facilities', ListFacilities::class)->name('list-facilities');
    Route::get('/pages/facilities/list-accreditations', ListAccreditations::class)->name('list-accreditations');
    Route::get('/pages/facilities/profile-facility/{param}', ProfileFacility::class)->name('profile-facility');
    Route::get('/pages/practitioners/view-certificate/{param}', ViewCertificate::class)->name('view-certificate');
    Route::get('/pages/practitioners/file-upload', FileUpload::class)->name('file-upload');
    });
Route::group(['middleware' => ['auth', 'AdminLevel', 'ActivatedAccountAccess']], function(){
    Route::get('/pages/users/list-users', ListUsers::class)->name('list-users');
});

Route::get('/pages/no-access', NoAccess::class)->name('no-access');
Route::get('/pages/inactive-account', InactiveAccount::class)->name('inactive-account');

Route::get('/clear-cache-all', function() {
    Artisan::call('cache:clear');
    dd("Cache Clear All");
})->middleware('auth');

Route::get('/email/verify', Verify::class)->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/pages/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');
// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
