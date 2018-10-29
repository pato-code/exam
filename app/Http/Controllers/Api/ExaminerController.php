<?php

namespace App\Http\Controllers\Api;

use App\Model\Exam;
use App\Model\Question;
use App\Model\QuestionRate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;

class ExaminerController extends Controller
{
    //
    /*
     *  Add Exam
     *  college_name
     *  time
     *  date
     *  spicalized
     *  quesion_number
     */
    public function addExam(Request $request){
        $token=JWTAuth::parseToken();
        $user=$token->authenticate();
        $exam =new Exam();
        $exam->examiner()->associate($user);

        $exam->fill($request->json()->all());
        $exam->save();

        return response()->json($exam,200);

    }
    /*
     *  addExamQuestion
     *  Use new way as just test send
     *  {
     *      exam_id
     *      questions : [
     *          text
     *          rates[
     *              rate
     *          ]
     *      ]
     *  }
     */
    public function addExamQuestions(Request $request){
        $response = array();
        $token=JWTAuth::parseToken();
        $user=$token->authenticate();
        $exam_id = $request->json()->get('exam_id');
        $exam = Exam::find($exam_id);
        if ($exam != null) {


            if ($exam->examiner->id === $user->id) {
                $questions = $request->json()->get('questions');
                foreach ($questions as $question) {
                    $q = new Question();
                    $q->exam()->associate($exam);
                    $q->fill($question);
                    $q->save();
                    $rates = $question["rates"];
                    foreach ($rates as $rate) {
                        $ra = new QuestionRate();
                        $ra->fill($rate);
                        $q->rates()->save($ra);
                    }

                }
                $exam_response = Exam::showExam($exam->id);
                return response()->json($exam_response, 200);
            } else {
                return response()->json([
                    "error" => true,
                    "message" => "User Not Authorized to Add Questions"
                ], 200);
            }
        }
    }
    public function showExam(Request $request){
        $exam_id = $request->json()->get('exam_id');
        $exam_response = Exam::showExam($exam_id);
        return response()->json($exam_response, 200);
    }
}
