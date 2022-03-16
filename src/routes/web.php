<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Result;
use App\Models\Score;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
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

//admin routes
Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function(){
    Route::get('/',function(){
        return view('admin.index2',[
            'users'=>User::all()->count(),
            'exams'=>Exam::all()->count(),
            'scores'=>Score::all()->count(),
        ]);
    });
    Route::resource('users'       , UserController::class)->middleware('super_admin.auth');
    Route::resource('categories'  , CategoryController::class);
    Route::resource('exams'       , ExamController::class);
    Route::resource('questions'   , QuestionController::class);
    Route::resource('results'     , ResultController::class);
    Route::resource('scores'      , ScoreController::class);
});;


//display results
Route::get('/results/{id}',[ResultController::class,'show']);
Route::get('/single-result/{id}',[ResultController::class,'user_single_result'])->name('single-result');
Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home',function(){return view('pages.index');} )->name('main_page');
Route::get('/exam/{id}',[ExamController::class,'show'])->name('exam-single')->middleware('auth');
Route::get('/Exams',[ExamController::class,'showAllExams'])->name('Exams')->middleware('auth');
Route::get('/profile',[ScoreController::class,'showAllUserScores'])->name('profile')->middleware('auth');
Route::post('/api/',[ResultController::class,'set_results']);
