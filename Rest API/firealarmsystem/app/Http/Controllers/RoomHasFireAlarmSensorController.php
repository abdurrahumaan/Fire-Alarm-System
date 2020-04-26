<?php

namespace App\Http\Controllers;

use App\FireAlarmSensor;
use App\Floor;
use App\Room;
use App\RoomHasFireAlarmSystem;
use Illuminate\Http\Request;

class RoomHasFireAlarmSensorController extends Controller
{
    public function findRoomHasSensorById(Request $request)
    {
        $request->validate([
            'id' => ['required', 'integer'],
        ]);

        $Obj = RoomHasFireAlarmSystem::where('id', $request->id)->first();

        $responseJson = [];

        if (!empty($Obj)) {
            $responseJson = [
                "code" => 1,
                "msg" => "Success",
                "data" => $Obj
            ];
        } else {
            $responseJson = [
                "code" => 2,
                "msg" => "No data found"
            ];
        }

        return json_encode($responseJson);
    }

    public function findRoomHasSensors(Request $request)
    {

        $Obj = RoomHasFireAlarmSystem::get();

        $responseJson = [];

        if (!empty($Obj)) {
            $responseJson = [
                "code" => 1,
                "msg" => "Success",
                "data" => $Obj
            ];
        } else {
            $responseJson = [
                "code" => 2,
                "msg" => "No Data"
            ];
        }

        return json_encode($responseJson);
    }

    public function saveRoomHasSensor(Request $request)
    {
        $request->validate([
            'rid' => ['required', 'integer'],
            'fid' => ['required', 'integer'],
        ]);

        $responseJson = [];

        $checkRoom = false;
        $checkSensor = false;

        $checkRoom = Room::where('id', $request->rid)->first();
        $checkSensor = RoomHasFireAlarmSystem::where('id', $request->fid)->first();


        if (!empty($checkRoom)) {
            $checkFloor = true;
        }

        if (!empty($checkSensor)) {
            $checkUser = true;
        }

        $obj = RoomHasFireAlarmSystem::create([
            'room_id' => $request->rid,
            'fire_alarm_sensor_id' => $request->fid,
        ]);

        $responseJson = [
            "code" => 1,
            "msg" => "Success",
            "floor" => $obj
        ];

        return json_encode($responseJson);
    }

    public function findAllDataByFireAlarmSensorId(Request $request)
    {
        $request->validate([
            'fid' => ['required', 'integer'],
        ]);

        $Obj = RoomHasFireAlarmSystem::where('fire_alarm_sensor_id', $request->fid)->first();

        echo $Obj;
        exit;
        $responseJson = [];

        if (!empty($Obj)) {
            $responseJson = [
                "code" => 1,
                "msg" => "Success",
                "data" => $Obj
            ];
        } else {
            $responseJson = [
                "code" => 2,
                "msg" => "No data found"
            ];
        }

        return json_encode($responseJson);
    }
}
