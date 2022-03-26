<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use App\Models\Score;
use App\Http\Requests\StoreScoreRequest;
use App\Http\Requests\UpdateScoreRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        return view('admin.score.index', [

            'scores'              =>  Score::paginate(10),
            'auth_user'            =>  Auth::user(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *

     */
    public function store($id)
    {
        $data=$this->calculate_score($id);
        Score::create([
           'user_id'=>Auth::user()->id,
           'exam_id'=>$id,
           'user_score'=>$data[0],
           'max_score'=>$data[1],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateScoreRequest  $request
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScoreRequest $request, Score $score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        //
    }
    public static function calculate_score($id){
        $user_answers=session('user_answers');


        $answers= Question::where('exam_id',$id)
                           ->get();


        $score=0;
        $max_score=0;
        for($i=0;$i<$answers->count();$i++){

            if($user_answers[$i]===$answers[$i]->answer){

               $score=$score+$answers[$i]->points;

            }
            $max_score=$max_score+$answers[$i]->points;


        }
        $factor=Exam::find($id);
        $questions= Question::where('exam_id',$id)
            ->get();

        $factor=((($questions[0]->points)*($questions->count()))/$factor->max_score);

        session(['score'=>$score/$factor,'max_score'=>$max_score/$factor]);
        return [$score/$factor,$max_score/$factor];


    }
    public function showAllUserScores(){
        return view('pages.user_profile',[
            'scores'=>Score::where('user_id',Auth::user()->id)->orderByDesc('id')->get(),
        ]);
    }
    public function examsTaken(){
       $exam_ids= Score::all('exam_id')->groupBy('exam_id');
       $exams= Exam::all(['name','id']);
       foreach ($exams as $exam){
           if(isset($exam_ids[$exam['id']])){
               $exam['count']=count($exam_ids[$exam['id']]);
           }
           else{
               $exam['count']=0;

           }
       }
       return $exams;


//       return $exam_ids;
//       return Exam::all()->whereIn('id',$exam_ids)->toJson();

    }





}
