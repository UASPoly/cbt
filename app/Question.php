<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends BaseModel
{
    public function exam() {
        return $this->belongsTo(Exam::class);
    }

    public function scores(Type $var = null)
    {
        return $this->hasMany(Score::class);
    }
}


