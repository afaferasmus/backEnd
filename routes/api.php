<?php

use App\Http\Controllers\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionImgController;
use App\Http\Controllers\NewsController;

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

Route::resource('admin/questionimg', QuestionImgController::class)->except('edit','create');
Route::get('news/{lang}', [NewsController::class,'getNews']);
Route::get('quizimg/{lang}', [QuestionImgController::class,'showQuizLang']);
Route::get('quizimg', [QuestionImgController::class,'showQuiz']);
Route::get('admin/videoinfo/{id}', [VideoController::class,'videoInfo']);
Route::get('video', [VideoController::class,'index']);