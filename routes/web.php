<?php



///registeredoperationsController routes
Route::get('/registeredoperations','registeredoperationsController@index')
                                    ->name('registeredoperations.index');
Route::get('/registeredoperations/create1','registeredoperationsController@create1')
                                    ->name('registeredoperations.create1');
Route::post('/registeredoperations/create2','registeredoperationsController@create2')
                                    ->name('registeredoperations.create2');
Route::post('/registeredoperations','registeredoperationsController@store')
                                    ->name('registeredoperations.store');
Route::get('/registeredoperations/{id}','registeredoperationsController@show')
                                    ->name('registeredoperations.show');
Route::get('/registeredoperations/{id}/edit','registeredoperationsController@edit')
                                    ->name('registeredoperations.edit');
Route::put('/registeredoperations/{id}','registeredoperationsController@update')
                                    ->name('registeredoperations.update');
Route::delete('/registeredoperations/{id}','registeredoperationsController@destroy')
                                    ->name('registeredoperations.destroy');





///accounts routes
Route::get('/accounts','accountsController@index')->name('accounts.index');
Route::get('/accounts/create','accountsController@create')->name('accounts.create');
Route::post('/accounts','accountsController@store')->name('accounts.store');
Route::get('/accounts/{id}','accountsController@show')->name('accounts.show');
Route::get('/accounts/{id}/edit','accountsController@edit')->name('accounts.edit');
Route::put('/accounts/{id}','accountsController@update')->name('accounts.update');
Route::delete('/accounts/{id}','accountsController@destroy')->name('accounts.destroy');



///essential operation routes
Route::get('/essentialoperations','essentialoperationsController@index')
                                    ->name('essentialoperations.index');
Route::get('/essentialoperations/create','essentialoperationsController@create')
                                    ->name('accessentialoperationsounts.create');
Route::post('/essentialoperations','essentialoperationsController@store')
                                    ->name('essentialoperations.store');
Route::get('/essentialoperations/{id}','essentialoperationsController@show')
                                    ->name('essentialoperations.show');
Route::get('/essentialoperations/{id}/edit','essentialoperationsController@edit')
                                    ->name('essentialoperations.edit');
Route::put('/essentialoperations/{id}','essentialoperationsController@update')
                                    ->name('essentialoperations.update');
Route::delete('/essentialoperations/{id}','essentialoperationsController@destroy')
                                    ->name('essentialoperations.destroy');





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
