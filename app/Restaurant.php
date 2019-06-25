<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name', 'address', 'zipCode', 'city', 'latitude', 'longitude', 'schedule', 'typeOfFood', 'phoneNumber', 'photo','description'
    ];
}
