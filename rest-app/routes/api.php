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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::post('login', 'API\PassportController@login');
Route::post('register', 'API\PassportController@register');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('get-details', 'API\PassportController@getDetails'); 

    // Project routes (CRUD)
    Route::get('projects', 'ProjectController@index');
    Route::get('project/{id}', 'ProjectController@show');
    Route::post('project', 'ProjectController@store');
    Route::put('project', 'ProjectController@store');
    Route::delete('project/{id}', 'ProjectController@destroy');

    // Task routes (CRUD)
    Route::get('tasks', 'TaskController@index');
    Route::get('task/{id}', 'TaskController@show');
    Route::post('task', 'TaskController@store');
    Route::put('task', 'TaskController@store');
    Route::delete('task/{id}', 'TaskController@destroy');

    // Task manipulation routes
    Route::put('task/adduser/{task_id}/{user_id}', 'TaskController@addUser');
    Route::delete('task/removeuser/{task_id}/{user_id}', 'TaskController@removeUser');

    // Task query routes
    Route::get('tasks/byuserid/{user_id}', 'TaskController@showByUserId');
    Route::get('tasks/byprojectid/{project_id}', 'TaskController@showByProjectId');
    Route::get('tasks/bypriority/{priority}', 'TaskController@showByPriority');
    Route::get('tasks/byduedate/{duedate}', 'TaskController@showByDueDate');
});