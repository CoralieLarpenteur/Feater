<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_like extends Model
{
    public function users()
        {
            return $this->belongsTo(User::class);
        }
}
