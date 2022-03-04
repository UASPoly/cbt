<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends BaseModel
{
    
    
    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function results() {
        return $this->hasMany(Result::class);
    }

    public function hours()
    {
        return (strtotime($this->end)-strtotime($this->start))/3600;
    }

    public function minutes()
    {
        return (strtotime($this->end)-strtotime($this->start))/60;
    }

}
