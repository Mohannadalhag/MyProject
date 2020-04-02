<?php




///operation routes
Route::get('/operation','operationsController@index')->name('operations.index');
Route::get('/operation/create','operationsController@create')->name('operations.create');
Route::post('/operation','operationsController@store')->name('operations.store');
Route::get('/operation/{id}','operationsController@show')->name('operations.show');
Route::get('/operation/{id}/edit','operationsController@edit')->name('operations.edit');
Route::put('/operation/{id}','operationsController@update')->name('operations.update');
Route::delete('/operation/{id}','operationsController@destroy')->name('operations.destroy');

///accounts routes
Route::get('/accounts','accountsController@index')->name('accounts.index');
Route::get('/accounts/create','accountsController@create')->name('accounts.create');
Route::post('/accounts','accountsController@store')->name('accounts.store');
Route::get('/accounts/{id}','accountsController@show')->name('accounts.show');
Route::get('/accounts/{id}/edit','accountsController@edit')->name('accounts.edit');
Route::put('/accounts/{id}','accountsController@update')->name('accounts.update');
Route::delete('/accounts/{id}','accountsController@destroy')->name('accounts.destroy');



///essential operation routes
Route::get('/essentialoperations','essentialoperationsController@index')->name('essentialoperations.index');
Route::get('/essentialoperations/create','essentialoperationsController@create')->name('accessentialoperationsounts.create');
Route::post('/essentialoperations','essentialoperationsController@store')->name('essentialoperations.store');
Route::get('/essentialoperations/{id}','essentialoperationsController@show')->name('essentialoperations.show');
Route::get('/essentialoperations/{id}/edit','essentialoperationsController@edit')->name('essentialoperations.edit');
Route::put('/essentialoperations/{id}','essentialoperationsController@update')->name('essentialoperations.update');
Route::delete('/essentialoperations/{id}','essentialoperationsController@destroy')->name('essentialoperations.destroy');


Route::get('/', 'PagesController@index' );
Route::get('/about', 'PagesController@about' );
Route::get('/services', 'PagesController@services' );

//posts routes

Route::get('/posts','PostsController@index')->name('posts.index');
Route::get('/posts/create','PostsController@create')->name('posts.create');
Route::post('/posts','PostsController@store')->name('posts.store');
Route::get('/posts/{id}','PostsController@show')->name('posts.show');
Route::get('/posts/{id}/edit','PostsController@edit')->name('posts.edit');
Route::put('/posts/{id}','PostsController@update')->name('posts.update');
Route::delete('/posts/{id}','PostsController@destroy')->name('posts.destroy');

 /*Route::get('/', function ($id, $author) {
    return view('auth.login');
 });*/







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
