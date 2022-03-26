<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use App\Models\Result;
use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *e
     */
    public function index(Request $request)
    {
        $search_query=$request->search;
        $filter_search=$request->type;
        $results=collect([]);
        $searchError='';


        if($search_query){
            $results=Result::search($search_query,$filter_search);
            if($results->count()==0){
                $searchError="There is no results for your search";
            }

        }
        ;

        $results=$results->count()==0?Result::paginate(10):$results->paginate(10);


        return view('admin.results.index', [

            'results'              =>  $results,
            'auth_user'            =>  Auth::user(),
            'error'                =>$searchError,
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
     *
     */
    public function store($user_answer,$question_id)
    {
        Result::create([
            'user_answer'  =>$user_answer,
            'question_id'  =>$question_id,
            'user_id'      => Auth::user()->id,
        ]);


    }

    /**
     * Display the specified resource.
     *

     */
    public function show($id)

    {
        $questions= Question::where('exam_id',$id)
            ->get();


        $score_controller=new ScoreController();
        $score_controller->store($id);
        $user_answers=session('user_answers');
        $user_score=session('score');
        $max_score=session('max_score');
        //return $questions[0]->answer;
        $factor=Exam::find($id);

        $factor=((($questions[0]->points)*($questions->count()))/$factor->max_score);
        $user_score=$user_score/$factor;
        $max_score=$max_score/$factor;


        return view('pages.result',[
            'questions'=>$questions,
            'user_answers'=> $user_answers,
            'user_score'=>$user_score,
            'max_score'=>$max_score,

        ]);



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResultRequest  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResultRequest $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy($id)
    {
        $result = result::find($id);

        //check if the category is already deleted
        if($result)$result -> delete();

        return redirect()->route('admin.results.index');
    }
    public function store_user_answers($answers){
        session(['user_answers'=>$answers]);

    }

    public function set_results(Request $request){
        $user_answers=$request->answers;
        $this->store_user_answers($user_answers);
        $question_ids=$request->ids;
        for( $i=0;$i<count($user_answers);$i++){
            $this->store($user_answers[$i],$question_ids[$i]);
        }
        return new \Illuminate\Http\JsonResponse([
            'request'=>'succeeded',

        ]);


    }

    public function user_single_result(Request $request){
        $id=$request->id;
        $skip=$request->skip;
        $user_score=$request->user_score;
        $max_score=$request->max_score;
        $questions=question::where('exam_id',$id)->get();
        $ids=$questions->pluck('id');
        //user answer for the same exam
        $skip=$skip*$questions->count();

        $user_answers=Result::where('user_id',Auth::user()->id)
                            ->whereIn('question_id',$ids)
                            ->orderByDesc('id')
                            ->skip($skip)
                            ->take(10)
                            ->pluck('user_answer');
                        ;



        return view('pages.result',[
            'questions'=>$questions,
            'user_answers'=> $user_answers,
            'user_score'=>$user_score,
            'max_score'=>$max_score,

        ]);




    }

}

