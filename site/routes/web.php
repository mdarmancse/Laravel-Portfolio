<?php

use Illuminate\Support\Facades\Route;
Route::get('/','HomeController@HomeIndex');
Route::post('/contactIndex','HomeController@contactIndex');


Route::get('/CoursesIndex','CoursesController@CoursesIndex');
Route::get('/ProjectsIndex','ProjectsController@ProjectsIndex');

Route::get('/PrivacyIndex','PrivacyController@PrivacyIndex');
Route::get('/TermsIndex','TermsController@TermsIndex');
Route::get('/ContactIndex','ContactController@ContactIndex');
