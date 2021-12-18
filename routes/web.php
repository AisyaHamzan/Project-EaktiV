<?php

use App\Http\Controllers\Admin\EventController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','isAdmin'])->group(function(){
   
    Route::get('/dashboard', 'Admin\FrontendController@index' );
    Route::get('events','Admin\EventController@index');
    Route::get('add-event','Admin\EventController@add')-> name('add-event');
    Route::post('insert-event','Admin\EventController@insert');
    Route::get('logout','LogoutController@perform')->name('logout');
    Route::get('edit-event/{id}','Admin\EventController@edit');
    Route::put('update-event/{id}','Admin\EventController@update');
    Route::get('delete-event/{id}','Admin\EventController@destroy');
   });


