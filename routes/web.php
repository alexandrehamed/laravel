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

Route::resource('home','HomeController');
Route::resource('article', 'ArticleController');
Route::get('user', 'HomeController@indexUser');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('article/{id}/comment', [
    'as'   => 'article.comment',
    'uses' => 'ArticleController@postComment'
]);

Route::delete('article/delete/{id}',['as' =>'article.delete','uses' =>'ArticleController@delete']);


// Image //
Route::post('imageUploadForm', 'ImageController@store' );
Route::get('imageUploadForm', 'ImageController@update' );
Route::get('imagelist', 'ImageController@show' );