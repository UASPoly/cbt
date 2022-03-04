<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends BaseModel
{
    //
    public function admin() {
        return $this->hasOne(Admin::class);
        }
}
