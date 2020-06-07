<?php

use Illuminate\Support\Facades\Route;



//Route::get('/add', function () {
//    return view('admin.Home');
//});


Route::get('/','HomeController@HomeIndexAdmin')->middleware('logincheck');
Route::get('/visitor','VisitorController@VisitorIndex')->middleware('logincheck');

//ADMIN PANEL SERVICE MANAGEMENT

Route::get('/service','ServiceController@ServiceIndex')->middleware('logincheck');
Route::get('/getServicesData','ServiceController@getServicesData')->middleware('logincheck');
Route::get('/serviceDelete/{id}','ServiceController@serviceDelete')->middleware('logincheck');
//Route::post('/serviceDelete','ServiceController@serviceDelete2')->middleware('logincheck');
Route::post('/serviceDetails','ServiceController@serviceDetails')->middleware('logincheck');
Route::post('/serviceUpdate','ServiceController@serviceUpdate')->middleware('logincheck');
Route::post('/serviceAdd','ServiceController@serviceAdd')->middleware('logincheck');



//Admin Courses Management

Route::get('/courses', 'CoursesController@CoursesIndex')->middleware('logincheck');
Route::get('/getCoursesData', 'CoursesController@getCoursesData')->middleware('logincheck');
Route::post('/CoursesDelete', 'CoursesController@CoursesDelete')->middleware('logincheck');
Route::post('/CoursesDetails', 'CoursesController@getCoursesDetails')->middleware('logincheck');
Route::post('/CoursesUpdate', 'CoursesController@CoursesUpdate')->middleware('logincheck');
Route::post('/CoursesAdd', 'CoursesController@CoursesAdd')->middleware('logincheck');


//Projects Management


Route::get('/project', 'ProjectController@ProjectIndex')->middleware('logincheck');
Route::get('/getProjectData', 'ProjectController@getProjectData')->middleware('logincheck');
Route::post('/ProjectDetails', 'ProjectController@getProjectDetails')->middleware('logincheck');
Route::post('/ProjectDelete', 'ProjectController@ProjectDelete')->middleware('logincheck');
Route::post('/ProjectUpdate', 'ProjectController@ProjectUpdate')->middleware('logincheck');
Route::post('/ProjectAdd', 'ProjectController@ProjectAdd')->middleware('logincheck');


//Contact Management
Route::get('/messeges', 'ContactController@ContactIndex')->middleware('logincheck');
Route::get('/getContactData','ContactController@getContactData')->middleware('logincheck');
Route::post('/ContactDelete', 'ContactController@ContactDelete')->middleware('logincheck');


//Reviews Management

Route::get('/reviews', 'ReviewController@ReviewIndex')->middleware('logincheck');
Route::get('/getReviewsData', 'ReviewController@getReviewsData')->middleware('logincheck');
Route::post('/reviewDelete', 'ReviewController@reviewDelete')->middleware('logincheck');
Route::post('/reviewDetails', 'ReviewController@reviewDetails')->middleware('logincheck');
Route::post('/reviewUpdate', 'ReviewController@reviewUpdate')->middleware('logincheck');
Route::post('/reviewAdd', 'ReviewController@reviewAdd')->middleware('logincheck');

//Login

Route::get('/LoginIndex', 'LoginController@LoginIndex');
Route::get('/onLogout', 'LoginController@onLogout');
Route::post('/onLogin', 'LoginController@onLogin');
