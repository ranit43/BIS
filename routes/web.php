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
//Route::get('searchResult/{skill}', [
Route::post('searchResult', [
	'as'   =>  'searchResult',
	'uses' => 'PagesController@searchResult'
	]);

Route::group(['middleware' => 'auth'], function() {

	Route::get('home', [
		'as'	=>	'home',
		'uses' 	=>	'PagesController@home'
	]);

	Route::get('edit/{id}', [
		'as'	=>	'edit',
		'uses' 	=>	'PagesController@edit'
	]);

	Route::get('forum', [
		'as'	=>	'forum',
		'uses' 	=>	'PagesController@forum'
	]);

	Route::post('profileUpdate/{id}', [
		'as'	=>	'profileUpdate',
		'uses' 	=>	'PagesController@profileUpdate'
	]);
	/* ------------  SKill Routes --------------- */
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
	Route::get('skill/{id}/edit', [
		'as'    => 'skill.edit',
		'uses'  => 'SkillController@edit'
	]);
	Route::put('skill/{id}', [
		'as'    => 'skill.update',
		'uses'  => 'SkillController@update'
	]);
	Route::get('skill/{id}',['as' => 'skill.delete', 'uses' => 'SkillController@destroy']);

	/*--------------- Forum Controller----------*/
	Route::get('forum/create', [
		'as'    => 'forum.create',
		'uses'  => 'ForumController@create'
	]);
	Route::post('forum/store', [
		'as'    => 'forum.store',
		'uses'  => 'ForumController@store'
	]);
	Route::get('forum', [
		'as'    => 'forum.index',
		'uses'  => 'ForumController@index'
	]);
	Route::get('forum/{id}/edit', [
		'as'    => 'forum.edit',
		'uses'  => 'ForumController@edit'
	]);
	Route::put('forum/{id}', [
		'as'    => 'forum.update',
		'uses'  => 'ForumController@update'
	]);
	Route::get('forum/{id}',['as' => 'forum.delete', 'uses' => 'ForumController@destroy']);

	Route::get('forum/{id}/show_post', [
        'as'    => 'forum.show_post',
        'uses'  => 'ForumController@show_post'
    ]);

});


/* // sevices CRUD
    Route::get('language',['as' => 'language.index', 'uses' => 'LanguageController@index']);
    Route::get('language/create',['as' => 'language.create', 'uses' => 'LanguageController@create']);
    Route::post('language',['as' => 'language.store', 'uses' => 'LanguageController@store']);
    Route::get('language/{id}/edit',['as' => 'language.edit', 'uses' => 'LanguageController@edit']);
    Route::get('language/{id}/show',['as' => 'language.show', 'uses' => 'LanguageController@show']);
    Route::put('language/{id}',['as' => 'language.update', 'uses' => 'LanguageController@update']);
    Route::delete('language/{id}',['as' => 'language.delete', 'uses' => 'LanguageController@destroy']);

*/