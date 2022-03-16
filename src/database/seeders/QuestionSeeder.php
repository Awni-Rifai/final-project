<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        question::create([
//            'title'=>'What does a markup language use to identify content?',
//            "a"=> "functions",
//            "b"=> "scripts",
//            "c"=> "tags",
//            "d"=> "commands",
//            "answer"=> "c",
//            "points"=> 10,
//            "exam_id"=>1
//        ]);
//        //---------------------------------------
//
//        question::create([
//            'title'=>'What is HTML?',
//            "a"=> "Hypertext Library",
//            "b"=> "Programming Language",
//            "c"=> "Markup Language",
//            "d"=> "Scripting Language",
//            "answer"=> "c",
//            "points"=> 10,
//            "exam_id"=>1
//        ]);
//        //--------------------------------------------
//
//        question::create([
//            'title'=>'When formatting text, can you get the same result when using different tags?',
//            "a"=> "probably",
//            "b"=> "yes",
//            "c"=> "sometimes",
//            "d"=> "no",
//            "answer"=> "c",
//            "points"=> 10,
//            "exam_id"=>1
//        ]);
//        //----------------------------------------------------
//          question::create([
//            'title'=>'What does the href attribute contain?',
//            "a"=> "the URL of the page to be transferred",
//            "b"=> "the name of the web page to be transferred",
//            "c"=> "whether the new page should be opened in the same or a new window",
//            "d"=> "none of above",
//            "answer"=> "a",
//            "points"=> 10,
//            "exam_id"=>1
//        ]);
//        question::create([
//            'title'=>'What does a markup language use to identify content?',
//            "a"=> "functions",
//            "b"=> "scripts",
//            "c"=> "tags",
//            "d"=> "commands",
//            "answer"=> "c",
//            "points"=> 10,
//            "exam_id"=>1
//        ]);
//        question::create([
//            'title'=>'What does a markup language use to identify content?',
//            "a"=> "functions",
//            "b"=> "scripts",
//            "c"=> "tags",
//            "d"=> "commands",
//            "answer"=> "c",
//            "points"=> 10,
//            "exam_id"=>1
//        ]);
//        question::create([
//            'title'=>'What does a markup language use to identify content?',
//            "a"=> "functions",
//            "b"=> "scripts",
//            "c"=> "tags",
//            "d"=> "commands",
//            "answer"=> "c",
//            "points"=> 10,
//            "exam_id"=>1
//        ]);
//        question::create([
//            'title'=>'What does a markup language use to identify content?',
//            "a"=> "functions",
//            "b"=> "scripts",
//            "c"=> "tags",
//            "d"=> "commands",
//            "answer"=> "c",
//            "points"=> 10,
//            "exam_id"=>1
//        ]);
//        question::create([
//            'title'=>'What does a markup language use to identify content?',
//            "a"=> "functions",
//            "b"=> "scripts",
//            "c"=> "tags",
//            "d"=> "commands",
//            "answer"=> "c",
//            "points"=> 10,
//            "exam_id"=>1
//        ]);
//        question::create([
//            'title'=>'What does a markup language use to identify content?',
//            "a"=> "functions",
//            "b"=> "scripts",
//            "c"=> "tags",
//            "d"=> "commands",
//            "answer"=> "c",
//            "points"=> 10,
//            "exam_id"=>1
//        ]);
//--------------------------------------------------CSS---------------------------
        question::create([
            'title' => 'How can you created rounded corners using CSS3?',
            "a" => "border[round]: 30px;",
            "b" => "corner-effect: round;",
            "c" => "border-radius: 30px;",
            "d" => "alpha-effect: round-corner;",
            "answer" => "c",
            "points" => 10,
            "exam_id" => 7
        ]);
        //---------------------------------------

        question::create([
            'title' => 'How do you add shadow to elements in CSS3?',
            "a" => "box-shadow: 10px 10px 5px grey;",
            "b" => "shadow-right: 10px shadow-bottom: 10px;",
            "c" => "shadow-color: grey;",
            "d" => "alpha-effect[shadow]: 10px 10px 5px grey; ",
            "answer" => "a",
            "points" => 10,
            "exam_id" => 7
        ]);
        //--------------------------------------------

        question::create([
            'title' => 'How to you modify a border image using CSS3?',
            "a" => "border: url(image.png);",
            "b" => "border-variable: image url(image.png);",
            "c" => " border-image: url(border.png) 30 30 round;",
            "d" => "None ",
            "answer" => "c",
            "points" => 10,
            "exam_id" => 7
        ]);
        //----------------------------------------------------
        question::create([
            "title" => "How to resize a background image using CSS3?",
            "a" => " background-size: 80px 60px;",
            "b" => "bg-dimensions: 80px 60px;",
            "c" => " background-proportion: 80px 60px;",
            "d" => " alpha-effect: bg-resize 80px 60px;",
            "answer" => "a",
            "points" => 10,
            "exam_id" => 7
        ]);
        question::create([
            "title" => "How to add text shadow using CSS3?",
            "a" => " font: shadowed 5px 5px 5px grey;",
            "b" => "font-shadow: 5px 5px 5px grey;",
            "c" => " text-shadow: 5px 5px 5px grey; ",
            "d" => " shadow: text 5px 5px 5px grey;",
            "answer" => "c",
            "points" => 10,
            "exam_id" => 7
        ]);
        question::create([
            "title" => " How to force a word wrap using CSS3?",
            "a" => "  word-wrap: break-word;",
            "b" => ". text-wrap: break-word;",
            "c" => "  text-wrap: force;",
            "d" => " text-width: set;",
            "answer" => "a",
            "points" => 10,
            "exam_id" => 7
        ]);
        question::create([
            "title" => "Which of these are valid CSS3 transformation statements. ",
            "a" => "matrix() ",
            "b" => "modify()",
            "c" => "skip()",
            "d" => " simulate()",
            "answer" => "a",
            "points" => 10,
            "exam_id" => 7
        ]);
        question::create([
            "title" => "How to create transition effects using CSS3?",
            "a" => "transition: width 2s; ",
            "b" => "transition-duration: 2s; transition-effect: width; ",
            "c" => " alpha-effect: transition (width,2s);",
            "d" => "None",
            "answer" => "a",
            "points" => 10,
            "exam_id" => 7
        ]);
        question::create([
            "title" => " How to rotate objects using CSS3? ",
            "a" => " object-rotation: 30deg; ",
            "b" => " transform: rotate(30deg);",
            "c" => "rotate-object: 30deg;",
            "d" => " transform: rotate-30deg-clockwise;",
            "answer" => "b",
            "points" => 10,
            "exam_id" => 7
        ]);
        question::create([
            "title" => "How to re-size/scale objects using CSS3?",
            "a" => "  transform: scale(2,4); ",
            "b" => " scale-object: 2,4;",
            "c" => "scale: (2,4);",
            "d" => "None",
            "answer" => "a",
            "points" => 10,
            "exam_id" => 7
        ]);
    }


}
