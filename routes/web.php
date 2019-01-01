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

Route::get('/', 'FrontEndController@index')->name('frontend.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//Route::get('/adminLogin', 'AdminController@login')->name('admin.login');
Route::match(['get', 'post'], '/adminLogin', 'AdminController@login')->name('admin.login');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/admin/profile/{id}', 'AdminController@profile')->name('admin.profile');
    Route::post('/admin/update/profile/{id}', 'AdminController@update')->name('admin.update');

//    Sliders Routes
    Route::get('/admin/slider', 'SliderController@index')->name('slider');
    Route::post('/admin/slider/{id}', 'SliderController@update')->name('slider.update');

//    About Routes
    Route::get('/admin/about', 'AboutController@index')->name('about');
    Route::post('/admin/about/{id}', 'AboutController@update')->name('about.update');

//    Service Routes
    Route::get('/admin/service/create', 'ServicesController@create')->name('service.create');
    Route::post('/admin/service/store', 'ServicesController@store')->name('service.store');
    Route::get('/admin/service/index', 'ServicesController@index')->name('service.index');
    Route::get('/admin/service/edit/{id}', 'ServicesController@edit')->name('service.edit');
    Route::post('/admin/service/update/{id}', 'ServicesController@update')->name('service.update');
    Route::get('/admin/service/delete/{id}', 'ServicesController@delete')->name('service.delete');
});


Route::get('/logout', 'AdminController@logout')->name('admin.logout');
