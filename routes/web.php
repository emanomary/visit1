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

/*Route::get('/', function () {
    return view('welcome');
});*/
//route for logout user
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/error', 'HomeController@error')->name('error');

Route::get('results/search','HomeController@search')->name('results.search');

/******************* routes **************************/

Route::group(['middleware' => 'auth','role:admin|super_admin|user'], function() 
{
    Route::group(['middleware' => 'auth','role:admin|super_admin,user'], function() 
    {   
    	//users routes
    	Route::get('users', 'userController@index')->name('users.index');

        Route::get('users/create', 'userController@create')->name('users.create');

        Route::post('users/store', 'userController@store')->name('users.store');

        Route::get('users/edit/{id}', 'userController@edit')->name('users.edit');

        Route::post('users/update/{id}', 'userController@update')->name('users.update');

        Route::get('users/destroy/{id}', 'userController@destroy')->name('users.destroy');

        //visitors routes
        Route::get('visitors', 'VisitorController@index')->name('visitors.index');

        Route::get('visitors/create', 'VisitorController@create')->name('visitors.create');

        Route::post('visitors/store', 'VisitorController@store')->name('visitors.store');

        Route::get('visitors/edit/{id}', 'VisitorController@edit')->name('visitors.edit');

        Route::post('visitors/update/{id}', 'VisitorController@update')->name('visitors.update');

        Route::get('visitors/destroy/{id}', 'VisitorController@destroy')->name('visitors.destroy');
    });
    //////////////////////////////////////////////////////////////////////////

    //visits routes
	Route::get('visits', 'VisitController@index')->name('visits.index');

    Route::get('visits/create', 'VisitController@create')->name('visits.create');

    Route::post('visits/store', 'VisitController@store')->name('visits.store');

    Route::get('visits/edit/{id}', 'VisitController@edit')->name('visits.edit');

    Route::post('visits/update/{id}', 'VisitController@update')->name('visits.update');

    Route::get('visits/destroy/{id}', 'VisitController@destroy')->name('visits.destroy');

    Route::get('visits/search', 'VisitController@search')->name('visits.search');

});