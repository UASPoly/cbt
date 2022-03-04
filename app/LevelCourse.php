<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelCourse extends BaseModel
{
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function hasExam()
    {
        $flag = false;
        foreach ($this->exams as $exam) {
            if(strtotime($exam->date) >= time()){
                $flag = true;
            }
        }
        return $flag;
    }

    public function getStartedExam()
    {
        return $this->exams->first();
    }
}
