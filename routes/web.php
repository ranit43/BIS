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
});
*/
/*Route::get('/search', function () {
    return view('search');
});

Route::get('/forum', function () {
    return view('forum');
});*/


Auth::routes();
Route::get('/', 'PagesController@welcome' );
Route::get('search', 'PagesController@search' );

Route::group(['middleware' => 'auth'], function() {
	Route::get('home', 'PagesController@home');
	Route::get('forum', 'PagesController@forum' );
	Route::get('edit/{id}', 'PagesController@edit');
	Route::post('profileUpdate/{id}', [
		'as'	=>	'profileUpdate',
		'uses' 	=>	'PagesController@profileUpdate'
	]);
	Route::get('skill/create', [
		'as'    => 'skill.create',
		'uses'  => 'SkillController@create'
	]);
	Route::post('skill/store', [
		'as'    => 'skill.store',
		'uses'  => 'SkillController@store'
	]);
	Route::get('skill', [
		'as'    => 'skill.index',
		'uses'  => 'SkillController@index'
	]);

});
