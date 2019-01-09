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

Route::get('/', [
    'uses' => 'frontEndController@search',
    'as' => 'search'
]);
Route::get('/test', function () {
    return view('frontend.index');
});
Route::get('/result', [
    'uses' => 'frontEndController@result',
    'as' => 'result'
]);
Route::get('/companyresult', [
    'uses' => 'frontEndController@result2',
    'as' => 'companyresult'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function() {
    Route::get('/addcreditor', [
        'uses' => 'adminController@create',
        'as' => 'addcreditor'
    ]);
    Route::post('/addcreditor/save', [
        'uses' => 'adminController@saved',
        'as' => 'addcreditor.save'
    ]);
    Route::get('/managecreditor', [
        'uses' => 'adminController@index',
        'as' => 'manage'
    ]);
    Route::get('/edit/{id}', [
        'uses' => 'adminController@edit',
        'as' => 'edit'
    ]);
    Route::post('/delete', [
        'uses' => 'adminController@delete',
        'as' => 'delete'
    ]);
    Route::post('/update/{id}', [
        'uses' => 'adminController@update',
        'as' => 'update'
    ]);
    Route::get('/managecompany', [
        'uses' => 'adminController2@index',
        'as' => 'managecompany'
    ]);
    Route::get('/addcompany', [
        'uses' => 'adminController2@create',
        'as' => 'addcompany'
    ]);
    Route::post('/addcompany/save', [
        'uses' => 'adminController2@saved',
        'as' => 'addcompany.save'
    ]);
    Route::get('/addcompany/edit/{id}', [
        'uses' => 'adminController2@edit',
        'as' => 'editcompany'
    ]);
    Route::post('/addcompany/delete', [
        'uses' => 'adminController2@delete',
        'as' => 'deletecompany'
    ]);
    Route::post('/addcompany/update/{id}', [
        'uses' => 'adminController2@update',
        'as' => 'updatecompany'
    ]);
    Route::get('/adduser', [
        'uses' => 'userController@create',
        'as' => 'adduser'
    ]);
    Route::post('/adduser/store', [
        'uses' => 'userController@store',
        'as' => 'adduser.store'
    ]);
    Route::get('/manageuser', [
        'uses' => 'userController@index',
        'as' => 'manageuser'
    ]);
    Route::get('/adduser/edit', [
        'uses' => 'adminController@editUser',
        'as' => 'adduser.edit'
    ]);
    Route::post('/adduser/update/{id}', [
        'uses' => 'adminController@saveChanges',
        'as' => 'adduser.update'
    ]);
});





