<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes; // use the trait

    protected $dates = ['deleted_at']; // mark this column as a date

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'class_id', 'code'
    ];
    protected $appends = ['fullName'];

    public function scores() {
        return $this->hasMany(Score::class);
    }

    public function class() {
        return $this->belongsTo(Classes::class);
    }

    public function getFullNameAttribute() {
        return ucfirst(strtolower($this->lastname)) . ' ' . ucfirst(strtolower($this->firstname));
    }

    public function getScore($exam_id) {
        $score = $this->scores()->where('exam_id', $exam_id)->first();
        return $score ? ['actual_score' => $score->actual_score, 'computed_score' => $score->computed_score] : null;
    }

    public function level() {
        return $this->belongsTo(Level::class);
    }

    public function updateCode()
    {
        $this->update(['code'=>$this->generateStudentCode()]);
    }

    protected function generateStudentCode() {
        $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
        $code = mt_rand(2111, 9999) . 
                $characters[rand(0, strlen($characters) - 1)] . 
                $characters[rand(0, strlen($characters) - 1)];
        $check = User::where('level_id',$this->leve_id)->where('code', $code)->first();
        //recursively check whether another student exists in that class with the same code
        if ($check) {
            return $this->generateStudentCode($this->class_id);
        } else {
            return $code;
        }
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
      */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
