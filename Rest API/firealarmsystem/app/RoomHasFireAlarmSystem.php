<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomHasFireAlarmSystem extends Model
{
    protected $fillable = [
        'room_id', 'fire_alarm_sensor_id'
    ];
}
