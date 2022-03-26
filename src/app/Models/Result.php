<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function question(){
        return $this->belongsTo(Question::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public static function search($query,$filter_search){

        $results=[];
        if($filter_search=='exam_title'){

            $exam_ids=Exam::where('name','Like','%'.$query.'%')->pluck('id')->toArray();
            $ids=Question::whereIn('exam_id',$exam_ids);
            $results=Result::whereIn('question_id',$ids->pluck('id')->toArray());

            }
        else{
            $ids=User::where('name','Like','%'.$query.'%')->pluck('id')->toArray();

            $results=Result::whereIn('user_id',$ids);



        }

        return $results;
    }
}
