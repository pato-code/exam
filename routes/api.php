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

Route::post("/login" , "LoginController@login");
Route::group(["middleware" => ["examiner","json"]],function() {
   Route::post("/add_exam" , "ExaminerController@addExam");
   Route::post("/add_exam_questions" , "ExaminerController@addExamQuestions");
   Route::post("/show_exam" , "ExaminerController@showExam");
});
