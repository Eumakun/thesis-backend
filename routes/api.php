<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
});
Route::group([
    'prefix' => 'dashboard'
], function () {
    Route::get('/', 'SurveyAnswerController@dashboard');
});
Route::group([
    'middleware' => 'auth:api'
  ], function() {
      Route::get('logout', 'AuthController@logout');
      Route::get('user', 'AuthController@user');
    
      Route::group([
        'prefix' => 'survey'
        ], function () {
            Route::get('/', 'SurveyAnswerController@surveys');
            Route::post('import', 'SurveyAnswerController@importAnswer');
            Route::post('create', 'SurveyAnswerController@create');
            Route::post('update/{id}', 'SurveyAnswerController@update');
            Route::post('delete/{id}', 'SurveyAnswerController@delete');
        });
      Route::group([
          'prefix' => 'users'
        ], function () {
            Route::get('/', 'AuthController@users');
            Route::post('create', 'AuthController@create');
            Route::post('update/{id}', 'AuthController@update');
            Route::post('password/{id}', 'AuthController@updatePassword');
            Route::post('delete/{id}', 'AuthController@delete');
        });
      Route::group([
            'prefix' => 'courses'
        ], function () {
            Route::get('/', 'CourseController@courses');
           Route::post('create', 'CourseController@create');
           Route::post('update/{id}', 'CourseController@update');
           Route::post('delete/{id}', 'CourseController@delete');
        });
        Route::group([
            'prefix' => 'tier'
        ], function () {
            Route::get('/', 'TierController@tier');
           Route::post('create', 'TierController@create');
           Route::post('update/{id}', 'TierController@update');
           Route::post('delete/{id}', 'TierController@delete');
            Route::post('delete/{id}', 'TierController@delete');
        });
      Route::group([
            'prefix' => 'industries'
        ], function () {
            Route::get('/', 'IndustryController@industries');
            Route::post('create', 'IndustryController@create');
            Route::post('update/{id}', 'IndustryController@update');
            Route::post('delete/{id}', 'IndustryController@delete');
        });
      Route::group([
            'prefix' => 'job_types'
        ], function () {
            Route::get('/', 'JobTypeController@jobTypes');
            Route::post('create', 'JobTypeController@create');
            Route::post('update/{id}', 'JobTypeController@update');
            Route::post('delete/{id}', 'JobTypeController@delete');
        });
      Route::group([
            'prefix' => 'schools'
        ], function () {
            Route::get('/', 'SchoolController@schools');
            Route::post('create', 'SchoolController@create');
            Route::post('update/{id}', 'SchoolController@update');
            Route::post('delete/{id}', 'SchoolController@delete');
        });
});

Route::fallback(function () {
    return response()->json([
        'message' => 'Unauthorized action.'], 404);
});
