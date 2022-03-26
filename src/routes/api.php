<?php

use App\Http\Controllers\ResultController;
use App\Http\Controllers\ScoreController;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/scores',function(){
   return \App\Models\Score::all('created_at')->toJson();


});
Route::get('/exams-taken',[ScoreController::class,'examsTaken']);

Route::get('/{id}',function($id){
    $questions=Question::where('exam_id',$id)->get();
    return $questions  ->makeHidden(['answer','created_at',"updated_at"])->toJson();


});


