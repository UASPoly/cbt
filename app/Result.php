<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends BaseModel
{
    public function totalScore()
    {
        $currentScore = 0;
        foreach($this->scores as $score){
            if($score->remark == 'Passed'){
                $currentScore = $currentScore += $this->markForEachCorrectAnswer();
            }
        }
        return $currentScore;
    }
    public function scores()
    {
        return $this->hasMany(Score::class);
    }
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function markForEachCorrectAnswer()
    {
        return 100/count($this->exam->questions);
    }
}
