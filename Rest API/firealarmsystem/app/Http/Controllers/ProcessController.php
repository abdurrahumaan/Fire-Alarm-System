<?php

namespace App\Http\Controllers;

use App\FireAlarmSensor;
use App\Floor;
use App\Room;
use App\RoomHasFireAlarmSystem;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function fetchData(Request $request)
    {
        $sensorsmapping=RoomHasFireAlarmSystem::get();

        $index=0;

        foreach ($sensorsmapping as $mapRecord) {
            $sensorData=FireAlarmSensor::where('id', $mapRecord->fire_alarm_sensor_id)->first();
            $roomData=Room::where('id', $mapRecord->room_id)->first();
            $floorData=Floor::where('id', $roomData->floor_id)->first();

            $index++;

            $records[]=[
                "index"=>$index,
                "floor"=>$floorData->no,
                "sensor"=>$sensorData->id." ".$sensorData->name,
                "smoke"=>$sensorData->smoke,
                "co2"=>$sensorData->co2,
                "room"=>$roomData->no,
                "statusval"=>($sensorData->smoke>=5 || $sensorData->co2>=5)?1:0,
                "status"=>($sensorData->smoke>=5 || $sensorData->co2>=5)?"red":"green",
            ];
        }

        return json_encode($records);
    }
}
