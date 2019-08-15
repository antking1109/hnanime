<?php

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
Route::get('you-dont-have-permission-to-access.html', function (){
    return view('errors.not_permission');
})->name('errors.permission');
// Authentication Routes...
Route::get('tct-110910081997-login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('tct-110910081997-login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

/**
 *
 */
Route::group(['prefix'=>'/admin', 'namespace' => 'Admin', 'middleware' => ['auth']],function(){
    Route::get('/','DashBoardController@index')->name('admin.dashboard');

    // CRUD User...
    Route::get('/users', 'UserController@index')->name('admin.user.index');
    Route::get('/users/create', 'UserController@create')->name('admin.user.create');
    Route::post('/users/create', 'UserController@store')->name('admin.user.store');
    Route::get('/users/{id}/delete', 'UserController@getDestroy')->name('admin.user.getDestroy');
    Route::post('/users/{id}/delete', 'UserController@postDestroy')->name('admin.user.postDestroy');
    Route::get('/users/{id}/edit', 'UserController@edit')->name('admin.user.edit');
    Route::post('/users/{id}/edit', 'UserController@update')->name('admin.user.update');
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
