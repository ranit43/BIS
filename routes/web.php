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

//Route::get('show_user_profile/{id}', 'PagesController@show_user_profile');

Route::get('show_user_profile/{id}', [
    'as' => 'show_user_profile',
    'uses' => 'PagesController@show_user_profile'
]);

Route::get('welcome_search', [
    'as' => 'welcome_search',
    'uses' => 'PagesController@welcome_search'
]);

//Route::get('searchResult/{skill}', [
Route::post('searchResult', [
	'as'   =>  'searchResult',
	'uses' => 'PagesController@searchResult'
	]);

Route::get('userslist', [
    'as'   =>  'userslist',
    'uses' => 'PagesController@userslist'
    ]);

Route::get('about_us', [
    'as'   =>  'about_us',
    'uses' => 'PagesController@about_us'
    ]);

Route::get('post', [
    'as'    => 'post.index',
    'uses'  => 'PostController@index'
]);


Route::group(['middleware' => 'auth'], function() {



	Route::get('notifications', [
		'as'	=>	'notifications',
		'uses' 	=>	'PagesController@notifications'
	]);

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

//	---------- User admin controls

    Route::get('user', [
        'as'   =>  'user.index',
        'uses' => 'UserController@index'
    ]);

    Route::get('user/usertable', [
        'as' => 'user.usertable',
        'uses' => 'UserController@usertable'
    ]);

	Route::get('user.user_edit/{id}', [
		'as'	=>	'user.user_edit',
		'uses' 	=>	'UserController@user_edit'
	]);

	Route::post('user.user_update/{id}', [
		'as'	=>	'user.user_update',
		'uses' 	=>	'UserController@user_update'
	]);

    Route::get('user/{id}', [
        'as' => 'user.delete',
        'uses' => 'UserController@destroy'
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
	Route::get('post/create', [
		'as'    => 'post.create',
		'uses'  => 'PostController@create'
	]);
	Route::post('post/store', [
		'as'    => 'post.store',
		'uses'  => 'PostController@store'
	]);

//	Route::get('post', [
//		'as'    => 'post.index',
//		'uses'  => 'PostController@index'
//	]);

	Route::get('post/{id}/edit', [
		'as'    => 'post.edit',
		'uses'  => 'PostController@edit'
	]);
	Route::put('post/{id}', [
		'as'    => 'post.update',
		'uses'  => 'PostController@update'
	]);
	Route::get('post/{id}',['as' => 'post.delete', 'uses' => 'PostController@destroy']);

	Route::get('post/{id}/show_post', [
        'as'    => 'post.show_post',
        'uses'  => 'PostController@show_post'
    ]);


	/* ----------- Comment Controller ---------------   */

    Route::get('comment', [
        'as'    => 'comment.index',
        'uses'  => 'CommentController@index'
    ]);

    Route::post('comment/store', [
        'as'    => 'comment.store',
        'uses'  => 'CommentController@store'
    ]);

    Route::get('comment/{id}/edit', [
        'as'    => 'comment.edit',
        'uses'  => 'CommentController@edit'
    ]);

    Route::put('comment/{id}', [
        'as'    => 'comment.update',
        'uses'  => 'CommentController@update'
    ]);

    Route::get('comment/{id}',['as' => 'comment.delete', 'uses' => 'CommentController@destroy']);

    /*Route::get('comment/{id}/show_post', [
        'as'    => 'comment.show_post',
        'uses'  => 'ForumController@show_post'
    ]);*/

    //---------------- Volunteering SKill -----------------
    Route::get('volunteeringskill/create', [
        'as'    => 'volunteeringskill.create',
        'uses'  => 'VolunteeringSkillController@create'
    ]);
    Route::post('volunteeringskill/store', [
        'as'    => 'volunteeringskill.store',
        'uses'  => 'VolunteeringSkillController@store'
    ]);
    Route::get('volunteeringskill', [
        'as'    => 'volunteeringskill.index',
        'uses'  => 'VolunteeringSkillController@index'
    ]);
    Route::get('volunteeringskill/{id}/edit', [
        'as'    => 'volunteeringskill.edit',
        'uses'  => 'VolunteeringSkillController@edit'
    ]);
    Route::put('volunteeringskill/{id}', [
        'as'    => 'volunteeringskill.update',
        'uses'  => 'VolunteeringSkillController@update'
    ]);
    Route::get('volunteeringskill/{id}',['as' => 'volunteeringskill.delete', 'uses' => 'VolunteeringSkillController@destroy']);

    /* ----------- Achievement Controller ---------------   */
    Route::get('achievement/create', [
        'as'    => 'achievement.create',
        'uses'  => 'AchievementController@create'
    ]);

    Route::get('achievement', [
        'as'    => 'achievement.index',
        'uses'  => 'AchievementController@index'
    ]);

    Route::post('achievement/store', [
        'as'    => 'achievement.store',
        'uses'  => 'AchievementController@store'
    ]);

    Route::get('achievement/{id}/edit', [
        'as'    => 'achievement.edit',
        'uses'  => 'AchievementController@edit'
    ]);

    Route::put('achievement/{id}', [
        'as'    => 'achievement.update',
        'uses'  => 'AchievementController@update'
    ]);

    Route::get('achievement/{id}',['as' => 'achievement.delete', 'uses' => 'AchievementController@destroy']);

    /* ----------- Project Controller ---------------   */
    Route::get('project/create', [
        'as'    => 'project.create',
        'uses'  => 'ProjectController@create'
    ]);

    Route::get('project', [
        'as'    => 'project.index',
        'uses'  => 'ProjectController@index'
    ]);

    Route::post('project/store', [
        'as'    => 'project.store',
        'uses'  => 'ProjectController@store'
    ]);

    Route::get('project/{id}/edit', [
        'as'    => 'project.edit',
        'uses'  => 'ProjectController@edit'
    ]);

    Route::put('project/{id}', [
        'as'    => 'project.update',
        'uses'  => 'ProjectController@update'
    ]);

    Route::get('project/{id}',['as' => 'project.delete', 'uses' => 'ProjectController@destroy']);

    /* ----------- Project Controller ---------------   */
    Route::get('paper/create', [
        'as'    => 'paper.create',
        'uses'  => 'PaperController@create'
    ]);

    Route::get('paper', [
        'as'    => 'paper.index',
        'uses'  => 'PaperController@index'
    ]);

    Route::post('paper/store', [
        'as'    => 'paper.store',
        'uses'  => 'PaperController@store'
    ]);

    Route::get('paper/{id}/edit', [
        'as'    => 'paper.edit',
        'uses'  => 'PaperController@edit'
    ]);

    Route::put('paper/{id}', [
        'as'    => 'paper.update',
        'uses'  => 'PaperController@update'
    ]);

    Route::get('paper/{id}',['as' => 'paper.delete', 'uses' => 'PaperController@destroy']);

});

/*Route::filter('after', function($response)
{
// No caching for pages
    $response->header("Pragma", "no-cache");
    $response->header("Cache-Control", "no-store, no-cache, must-revalidate, max-age=0");
});*/


/* // sevices CRUD
    Route::get('language',['as' => 'language.index', 'uses' => 'LanguageController@index']);
    Route::get('language/create',['as' => 'language.create', 'uses' => 'LanguageController@create']);
    Route::post('language',['as' => 'language.store', 'uses' => 'LanguageController@store']);
    Route::get('language/{id}/edit',['as' => 'language.edit', 'uses' => 'LanguageController@edit']);
    Route::get('language/{id}/show',['as' => 'language.show', 'uses' => 'LanguageController@show']);
    Route::put('language/{id}',['as' => 'language.update', 'uses' => 'LanguageController@update']);
    Route::delete('language/{id}',['as' => 'language.delete', 'uses' => 'LanguageController@destroy']);

*/