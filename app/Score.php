<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends BaseModel
{
    public function markExam()
    {
        $remark = 'Fail';
        if($this->choosen && $this->choosen == $this->question->ANS){
            $remark = 'Passed';
        }
        $this->update(['remark'=>$remark]);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function result()
    {
        return $this->belongsTo(Result::class);
    }

    public function marks()
    {
        if($this->remark == 'Passed'){
            return $this->result->markForEachCorrectAnswer();
        }else{
            return 0;
        }
        
    }
}
