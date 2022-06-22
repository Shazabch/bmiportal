<?php
use App\Http\Controllers\adminController;
use App\Http\Controllers\customerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified','request'])->name('dashboard');

require __DIR__.'/auth.php';
// Admin 
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
        // login route
        Route::get('login','AuthenticatedSessionController@create')->name('login');
        Route::post('login','AuthenticatedSessionController@store')->name('adminlogin');
    });
    Route::middleware('admin')->group(function(){
        Route::get('dashboard','HomeController@index')->name('dashboard');

    });
    Route::post('logout','Auth\AuthenticatedSessionController@destroy')->name('logout');
});
Route::middleware('admin')->group(function () {
   Route::resource("customers",customerController::class);
    Route::resource("admins", adminController::class);
});

//Route for  Customer Profile
Route::middleware('auth')->group(function(){
    Route::get('/profile',[customerController::class,'profile'])->name('profile');
Route::post('/customers/store1/{id}',[customerController::class,'store1'])->name('customers.store1');
});






