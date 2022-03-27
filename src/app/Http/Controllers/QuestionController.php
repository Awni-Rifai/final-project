<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Exam;
use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index()
    {

        return view('admin.questions.index', [

            'exams'              =>  Exam::all(),

            'questions'          =>  Question::orderByDesc('created_at')->paginate(5),

            'auth_user'          =>  Auth::user(),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([

            'title'             =>   'required|max:255|min:3',

            'a'                 =>   'required|max:255|min:3',

            'b'                 =>   'required|max:255|min:3',

            'c'                 =>   'required|max:255|min:3',

            'd'                 =>   'required|max:255|min:3',

            'answer'            =>   'required|max:2',

            'exam_id'           =>   'required|exists:exams,id',

            'points'             =>   'required|numeric'



        ]);



        Question::create([

            "title"        =>          $request->title,

            "a"            =>          $request->a,

            "b"            =>          $request->b,

            "c"            =>          $request->c,

            "d"            =>          $request->d,

            "answer"       =>          $request->answer,

            "points"       =>          $request->points,

            'exam_id'      =>          $request->exam_id,

        ]);



        return redirect()->route('admin.questions.index');
    }


    /**
     * Display the specified resource.
     *

     */
    public function show($id)
    {
        return view('admin.questions.show',[
           'question'=>Question::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *

     */
    public function edit($id)
    {

        return view('admin.questions.edit', [

            'exams'                 => Exam::all(),
            'question'              => Question::find($id),
            'auth_user'             => Auth::user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *

     */
    public function update(Request $request, $id)
    {
        $question = Question::find($id);

        //validation
        //validation
        $request->validate([

            'title'             =>   'required|max:255|min:3',

            'a'                 =>   'required|max:255|min:3',

            'b'                 =>   'required|max:255|min:3',

            'c'                 =>   'required|max:255|min:3',

            'd'                 =>   'required|max:255|min:3',

            'answer'            =>   'required|max:2',

            'exam_id'           =>   'required|exists:exams,id',

            'points'            =>   'required|numeric'



        ]);


        $question->title              = $request->title;
        $question->a                  = $request->a;
        $question->b                  = $request->b;
        $question->c                  = $request->c;
        $question->d                  = $request->d;
        $question->answer             = $request->answer;
        $question->points             = $request->points;
        $question->exam_id            = $request->exam_id;

        $question->update();


        return redirect()->route('admin.questions.index');


    }

    /**
     * Remove the specified resource from storage.
     *

     */
    public function destroy($id)
    {
        $question = question::find($id);

        //check if the category is already deleted
        if($question)$question -> delete();

        return redirect()->route('admin.questions.index');
    }
}
