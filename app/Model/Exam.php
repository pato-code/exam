<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    //
    protected $fillable = ["college_name" , "time" , "date" , "spicalized" , "quesion_number"];
    public function examiner(){
        return $this->belongsTo('App\Model\User' , 'examiner_id');
    }
    public function questions(){
        return $this->hasMany('App\Model\Question');
    }
    public static function showExam($exam_id){
        $response = array();
        $exam =Exam::find($exam_id);


        $questions = array();
        //dd($exam->questions);
        foreach ($exam->questions as $question){
            $rates = array();
            foreach ($question->rates as $rate){
                $rates [] =$rate;
            }
            $question_response = (array) $question;
            $question_response += ["rates" => $rates];
            $questions []=$question_response;
        }
        //dd($rates);
        $response =$exam;

        //dd($response);

        return $response;

    }
}
