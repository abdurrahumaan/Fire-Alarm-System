<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FireAlarmSensor extends Model
{
    protected $fillable = [
        'user_id','smoke','co2','name','detail'
    ];
}
