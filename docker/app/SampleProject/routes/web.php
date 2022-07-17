<?php

use Illuminate\Support\Facades\Route;

Route::get('/thinkings', 'ThinkingController@index')->name('thinking.list');
Route::get('/thinking/new', 'ThinkingController@create')->name('thinking.new');
Route::post('/thinking', 'ThinkingController@store')->name('thinking.store');
Route::get('/thinking/edit/{id}', 'ThinkingController@edit')->name('thinking.edit');
Route::post('/thinking/update/{id}', 'ThinkingController@update')->name('thinking.update');
Route::get('/thinking/{id}', 'ThinkingController@show')->name('thinking.detail');
Route::delete('/thinking/{id}', 'ThinkingController@destroy')->name('thinking.destroy');


Route::get('/plans/{thinking_id}', 'PlanController@index')->name('plan.list');
Route::get('/plan/{thinking_id}/new', 'PlanController@create')->name('plan.new');
Route::post('/plan', 'PlanController@store')->name('plan.store');
Route::get('/plan/{thinking_id}/edit/{id}', 'PlanController@edit')->name('plan.edit');
Route::post('/plan/update/{id}', 'PlanController@update')->name('plan.update');
Route::get('/plan/{id}', 'PlanController@show')->name('plan.detail');
Route::delete('/plan/{id}', 'PlanController@destroy')->name('plan.destroy');


Route::get('/', function () {
    return redirect('/thinkings');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



// Admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        //login route
        Route::get('login', 'AuthenticatedSessionController@create')->name('login');
        Route::post('login', 'AuthenticatedSessionController@store')->name('adminlogin');
    });
    Route::middleware('admin')->group(function () {
        Route::get('dashboard', 'HomeController@index')->name('dashboard');
    });
    Route::post('logout', 'Auth\AuthenticatedSessionController@destroy')->name('logout');
});
