<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function category()
    {
       return  $this->belongsTo(Category::class);
    }
    public function questions()
    {
       return  $this->hasMany(Question::class);
    }
    public function scores(){
        return $this->hasMany(Score::class);
    }
}
