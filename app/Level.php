<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends BaseModel
{
    public function levelCourses()
    {
        return $this->hasMany(LevelCourse::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function students()
    {
        return $this->hasMany(User::class);
    }
}
