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
Route::get('admin/groups', array('before' => 'auth', function(){
    return View::make('admin/groups');
}));
Route::get('/', function()
{
    return View::make('hello');
});

//api
Route::post('admin/api/customers', array('before' => 'auth', 'uses' => '\\Api\\CustomerController@getCustomers'));
Route::post('admin/api/customer/edit/{id}', array('before' => 'auth', 'uses' => '\\Api\\CustomerController@editCustomer'));
Route::post('admin/api/customer/delete/{id}', array('before' => 'auth', 'uses' => '\\Api\\CustomerController@deleteCustomer'));
Route::post('admin/api/customer/save', array('before' => 'auth', 'uses' => '\\Api\\CustomerController@saveCustomer'));
Route::post('admin/api/customer/{id}/products', array('before' => 'auth', 'uses' => '\\Api\\ProductController@getCustomerProducts'));
Route::post('admin/api/customergroups', array('before' => 'auth', 'uses' => '\\Api\\CustomergroupsController@getCustomergroups'));
Route::post('admin/api/customergroups/edit/{id}', array('before' => 'auth', 'uses' => '\\Api\\CustomergroupsController@editCustomergroup'));
Route::post('admin/api/customergroups/delete/{id}', array('before' => 'auth', 'uses' => '\\Api\\CustomergroupsController@deleteCustomergroup'));
Route::post('admin/api/customergroups/save', array('before' => 'auth', 'uses' => '\\Api\\CustomergroupsController@saveCustomergroups'));
Route::post('admin/api/customergroups/view/{id}', array('before' => 'auth', 'uses' => '\\Api\\CustomergroupsController@viewCustomergroup'));