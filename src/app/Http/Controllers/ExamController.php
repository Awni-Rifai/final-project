<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class ExamController extends Controller
{
    public function index()
    {

        return view('admin.exams.index', [

            'categories'     =>  Category::all(),

            'exams'          =>  Exam::all(),

            'auth_user'      =>  Auth::user(),
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

            'name'             =>   'required|max:255|min:3',

            'image'              =>   'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'duration'         =>   'required|numeric',

            'category_id'      =>    'required|exists:categories,id',

            'max_score'        => [
                                        'required',

                                        'numeric',

                                        function ($attribute, $value, $fail) {
                                            if ($value % 5 !== 0) {
                                                $fail($attribute.' must be 5 divisible.');
                                                // your message
                                            }
                                        },
                                    ],


        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName=$image->getClientOriginalName();
            $imagesResize=Image::make($image->getRealPath());
            $imagesResize->resize(800,600);
            $imagesResize->save(public_path('admin_styles/images/exams/'.$fileName));




        }


        Exam::create([

            "name"        =>          $request->name,
            "image"       =>          $fileName?? "avatar-01.jpg",
            'duration'    =>          $request->duration,
            'max_score'   =>          $request->max_score,
            'category_id' =>          $request->category_id,

        ]);



        return redirect()->route('admin.exams.index');
    }


    /**
     * Display the specified resource.
     *

     */
    public function show($id)
    {
        return view('pages.exam-single-page',[
            'exam'=>Exam::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *

     */
    public function edit($id)
    {

        return view('admin.exams.edit', [

            'categories'        => Category::all(),
            'exam'              => Exam::find($id),
            'auth_user'         => Auth::user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *

     */
    public function update(Request $request, $id)
    {
        $exam = Exam::find($id);

        //validation
        //validation
        $request->validate([

            'name'             =>   'required|max:255|min:3',

            'duration'         =>   'required|numeric',

            'category_id'      =>    'required|exists:categories,id',

            'max_score'        => [
                                    'required',

                                    'numeric',

                                    function ($attribute, $value, $fail) {
                                        if ($value % 5 !== 0) {
                                            $fail($attribute.' must be 5 divisible.');
                                            // your message
                                        }
                                    },
                                ],


        ]);


        if ($request->hasFile('image')) {

            //validate the image
            $request->validate([

                'image'              =>   'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $fileName=$image->getClientOriginalName();
            $imagesResize=Image::make($image->getRealPath());
            $imagesResize->resize(800,600);
            $imagesResize->save(public_path('admin_styles/images/exams/'.$fileName));
            $exam->image  = $fileName;

        }


        $exam->name              = $request->name;
        $exam->max_score         = $request->max_score;
        $exam->duration          = $request->duration;
        $exam->category_id       = $request->category_id;

        $exam->update();


        return redirect()->route('admin.exams.index');


    }

    /**
     * Remove the specified resource from storage.
     *

     */
    public function destroy($id)
    {
        $exam = Exam::find($id);

        //check if the category is already deleted
        if($exam)$exam -> delete();

        return redirect()->route('admin.exams.index');
    }
    public function showAllExams(){
        return view('pages.Exams',[
            'exams'=>Exam::all(),
            'categories'=>Category::get('name'),
        ]);
    }

}
