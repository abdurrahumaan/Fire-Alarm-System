<?php

namespace App\Http\Controllers;

use App\FireAlarmSensor;
use App\User;
use Illuminate\Http\Request;

class FireAlarmSensorController extends Controller
{
    public function newSensor(Request $request)
    {
        $request->validate([
            'uid' => ['required', 'integer'],
            'param1' => ['required', 'string'],
            'param2' => ['required', 'string'],
            'name' => ['required', 'string'],
            'detail' => ['required', 'string'],
        ]);


        $userObj = User::where('id', $request->uid)->first();

        $responseJson = [];

        if (!empty($userObj)) {
            $reged_sensor = FireAlarmSensor::create([
                "name" => $request->name,
                "detail" => $request->detail,
                "user_id" => $request->uid,
                "smoke" => $request->param1,
                "co2" => $request->param2,
            ]);

            $responseJson = [
                "code" => 1,
                "msg" => "Success",
                "floor" => $reged_sensor
            ];
        } else {
            $responseJson = [
                "code" => 2,
                "msg" => "User invalid"
            ];
        }

        return json_encode($responseJson);
    }

    public function sensorFindById(Request $request)
    {
        $request->validate([
            'id' => ['required', 'integer'],
        ]);

        $data = FireAlarmSensor::where('id', $request->id)->first();

        $responseJson = [];

        if (!empty($data)) {
            $responseJson = [
                "code" => 1,
                "msg" => "Success",
                "floor"=>$data
            ];
        } else {
            $responseJson = [
                "code" => 2,
                "msg" => "Not Found"
            ];
        }

        return json_encode($responseJson);
    }

    public function sensorAllFind(Request $request)
    {
        $Obj = FireAlarmSensor::get();

        $responseJson = [];

        $responseJson = [
            "code" => 1,
            "msg" => "Success",
            "floors"=>$Obj
        ];

        return json_encode($responseJson);
    }
}
