<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\Result;
use App\Question;
use Auth;

class ExamController extends Controller
{

    public function submit (Request $request, $examId)
    {
        $exam = Exam::find($examId);
        $data = $request->all();
        $result = $exam->results()->firstOrCreate(['user_id'=>Auth::user()->id]);
        foreach ($data as $key => $value) {
            $question = Question::find($key);
            if($question){
                $score = $question->scores()->create(['result_id'=>$result->id,'choosen'=>substr($value,0,1)]);
                $score->markExam();
            }
        }
        return redirect()->route('exam.result',[$result->id]);       
    }

    public function result($resultId)
    {
        return view('student.exam.result',['result'=>Result::find($resultId)]);
    }
}
