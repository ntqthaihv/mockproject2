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
//Route::resource('login', 'loginController');
//Route::resource('class', 'NtqClassController');
//Route::resource('content', 'ClassContentController');


//http://localhost/learning_social_network/public/api/auth/login
Route::group([
    'middleware' => 'cors',
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('payload','AuthController@payload');
    Route::get('list','AuthController@listUser');

});

//http://localhost/learning_social_network/public/api/content/list  'middleware' => 'jwt'
Route::group(['middleware' => 'cors', 'prefix'=>'content'],function(){
    Route::get('/list', 'ClassContentController@index');
    Route::get('/{id}','ClassContentController@show');
    Route::post('/post','ClassContentController@store');
    Route::post('/post/{id}','ClassContentController@update');
    Route::get('/delete/{id}','ClassContentController@destroy');
});

Route::group(['middleware' => 'cors','prefix'=>'ntqclass'],function(){
    Route::get('/list', 'NtqClassController@index');
    Route::get('/{id}','NtqClassController@show');
    Route::post('/post','NtqClassController@store');
    Route::get('/delete/{id}','NtqClassController@destroy');
});

//Route::resource('member', 'ClassMemberController')->middleware('cors');

Route::group(['middleware' => 'cors', 'prefix'=>'member'],function(){
    Route::get('/list', 'ClassMemberController@index');
    Route::get('/{id}','ClassMemberController@show');
    Route::post('/post','ClassMemberController@store');
    Route::get('/post/{id}','ClassMemberController@update');
    Route::post('/delete/{id}','ClassMemberController@destroy');
});
Route::group(['middleware' => 'cors', 'prefix'=>'attendance'],function(){
    Route::get('/list/{content}', 'ClassAttendanceController@index');
    Route::get('/show/{id}','ClassAttendanceController@show');
    Route::post('/create/{content}','ClassAttendanceController@store');
    Route::get('/create/{content}','ClassAttendanceController@store');
    Route::post('/post/{id}','ClassAttendanceController@update');
    Route::get('/delete/{id}','ClassAttendanceController@destroy');
});

//Route::resource('event', 'ClassMemberController')->middleware('cors');

Route::group(['middleware' => 'cors', 'prefix'=>'event'],function(){
    Route::get('/list', 'ClassEventController@index');
    Route::get('/{id}','ClassEventController@show');
    Route::post('/post','ClassEventController@store');
    Route::post('/post/{id}','ClassEventController@update');
    Route::post('/delete/{id}','ClassEventController@destroy');
});

Route::group(['middleware' => 'cors', 'prefix'=>'attendance'],function(){
    Route::get('/list/{id}', 'ClassAttendanceController@index');
    Route::get('/{id}','ClassAttendanceController@show');
    Route::post('/post/{id}','ClassAttendanceController@store');
    //Route::post('/post/{id}','ClassAttendanceController@update');
    Route::post('/delete/{id}','ClassAttendanceController@destroy');
});