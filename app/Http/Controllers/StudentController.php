<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Http\Request;
use App\Question;
use App\Subject;
use App\LevelCourse;
use App\Score;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('home',['levelCourses'=>Auth::user()->level->levelCourses]);
    }

    public function getExamQuestions(Request $request, $levelCourseId) {
        $levelCourse = LevelCourse::find($levelCourseId);
        $user = Auth::user();
        $level_id = $user->level_id;

        //check if the subject has any exam to be hosted on the particular day
        $exam = $levelCourse->getStartedExam($level_id);
       
        if ($exam) {
            $hours = $exam->hours();
            $minutes = $exam->minutes();

            $seed = substr(Auth::user()->code,0,4);

            $questions = Question::where('exam_id',$exam->id)->inRandomOrder($seed)->get();

            Session::put('exam_id', $exam->id);

            return view('exam',compact('questions','user','levelCourse','hours','minutes','exam'));
        }

        return abort('404');
    }

    public function submitExam(Request $request) {
        $choices = json_decode($request->choices);
        $exam_id = Session::get('exam_id');

        //first mark all the answers
        $seed = substr(Auth::user()->code,0,4);

        $questions = Question::where('exam_id',$exam_id)->with('options')->inRandomOrder($seed)->get();

        $base_score = Exam::find($exam_id)->base_score;

        $divisor = ($base_score)/count($questions);
        //Now mark in Accordance
        $score = 0;
        foreach ($choices as $choice) {
            $corresponding_question = $questions[$choice->question - 1];

            if ($choice->choice !== null) {
                //check if the answer is correct
                if ($corresponding_question->options[$choice->choice]->isCorrect) {
                    $score += 1;
                }
            }

            else {
                continue;
            }
        }

        $scoreTable = new Score;
        $scoreTable->exam_id = $exam_id;
        $scoreTable->user_id = Auth::user()->id;
        $scoreTable->actual_score = $score;
        $scoreTable->computed_score = $score * $divisor;
        $scoreTable->save();

        return response()->json('submission successful');

    }

    public function submitSuccess() {
        return view('submit-success');
    }
}
