<?php

namespace App\Http\Controllers;

use App\Floor;
use App\User;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function newFloor(Request $request)
    {
        $request->validate([
            'uid' => ['required', 'integer'],
            'no' => ['required', 'string'],
        ]);

        $userObj = User::where('id', $request->uid)->first();

        $responseJson = [];

        if (!empty($userObj)) {
            $reged_floor = Floor::create([
                'user_id' => $request->uid,
                'no' => $request->no
            ]);

            $responseJson = [
                "code" => 1,
                "msg" => "Success",
                "floor" => $reged_floor
            ];
        } else {
            $responseJson = [
                "code" => 2,
                "msg" => "User invalid"
            ];
        }

        return json_encode($responseJson);
    }

    public function floorFindById(Request $request)
    {
        $request->validate([
            'fid' => ['required', 'integer'],
        ]);

        $floorObj = Floor::where('id', $request->fid)->first();

        $responseJson = [];

        if (!empty($floorObj)) {
            $responseJson = [
                "code" => 1,
                "msg" => "Success",
                "floor"=>$floorObj
            ];
        } else {
            $responseJson = [
                "code" => 2,
                "msg" => "Not Found"
            ];
        }

        return json_encode($responseJson);
    }

    public function floorAllFind(Request $request)
    {
        $floorsObj = Floor::get();

        $responseJson = [];

        $responseJson = [
            "code" => 1,
            "msg" => "Success",
            "floors"=>$floorsObj
        ];

        return json_encode($responseJson);
    }
}
