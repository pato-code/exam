<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable=["text"];
    public function exam(){
        return $this->belongsTo('App\Model\Exam','exam_id');
    }
    public function rates(){
        return $this->hasMany('App\Model\QuestionRate');
    }
}
