<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/admin', function()
{
    return View::make('admin');
});
Route::post('admin/postLogin', 'AdminController@postLogin');
Route::get('admin/dashboard', array('before' => 'auth', function()
{
    return View::make('admin/dashboard');
}));
Route::get('/', function()
{
    return View::make('hello');
});

//api
Route::post('admin/api/customers', '\\Api\\CustomerController@getCustomers');
Route::post('admin/api/customer/edit/{id}', '\\Api\\CustomerController@editCustomer');
Route::post('admin/api/customer/delete/{id}', '\\Api\\CustomerController@deleteCustomer');
Route::post('admin/api/customer/save', '\\Api\\CustomerController@saveCustomer');
