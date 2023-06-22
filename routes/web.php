<?php
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\apController;
use App\Http\Controllers\forget;
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
//  Route::redirect('/', '/client');
// Route::get('/home',function(){
// 	return view('home');
// });
// Route::get('/rt',function(){
// 	return "return Test 1 !!";
// });
// Route::get('uri',[PagesController::class,'testone']);
// Route::get('cs',[PagesController::class,'cs']);
// Route::get('arr',[PagesController::class,'arr']);
// Route::get('/', [RedirectController::class, 'index'])->middleware('RedirectIndex');
// Route::get('/redirectme', function () {
//     return redirect()->route("RedirectIndex");
// });
// Route::middleware(['maintenance'])->group(function () {
//     Route::resource('/', ClientsController::class);
// });

// Route::middleware(['apMid'])->group(function () {
//     Route::resource('/ap', apController::class);
//     Route::resource('/client', ClientsController::class);
// });

Route::redirect('/', '/ap')->middleware(['maintenance']);
Route::resource('/client', ClientsController::class)->middleware(['maintenance', 'apMid']);
Route::resource('/ap', apController::class)->middleware(['maintenance']);

Route::get('/forget', function () {
    Session::forget('ap_query');
    return redirect('ap');
});



Route::get('/maintenance', function () {
    return view('maintenance');
});