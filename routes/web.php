<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/questionnaires/create', 'QuetionnaireController@create');
Route::post('/questionnaires' , 'QuetionnaireController@store');
Route::get('/questionnaires/{questionnaire}' , 'QuetionnaireController@show');

Route::get('/questionnaires/{questionnaire}/questions/create' , 'QuestionController@create');
Route::post('/questionnaires/{questionnaire}/questions' , 'QuestionController@store');
Route::delete('/questionnaires/{questionnaire}/questions/{question}' , 'QuestionController@destroy');

Route::get('/surveys/{questionnaire}-{slug}' , 'SurveyController@show');
Route::post('/surveys/{questionnaire}-{slug}' , 'SurveyController@store');
