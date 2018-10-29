<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class QuestionRate extends Model
{
    //
    protected $fillable=["rate"];
    public function question(){
        return $this->belongsTo('App\Model\Question','question_id');
    }
}
