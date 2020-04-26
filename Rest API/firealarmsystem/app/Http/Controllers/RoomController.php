<?php

namespace App\Http\Controllers;

use App\Floor;
use App\Room;
use App\User;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function newRoom(Request $request)
    {
        $request->validate([
            'uid' => ['required', 'integer'],
            'fid' => ['required', 'integer'],
            'no' => ['required', 'string'],
        ]);

        $checkFloor = false;
        $checkUser = false;

        $floorObj = Floor::where('id', $request->fid)->first();
        $userObj = User::where('id', $request->uid)->first();


        if (!empty($floorObj)) {
            $checkFloor = true;
        }

        if (!empty($userObj)) {
            $checkUser = true;
        }

        $responseJson = [];

        if ($checkFloor && $checkUser) {
            $reged_room = Room::create([
                'user_id' => $request->uid,
                'floor_id' => $request->fid,
                'no' => $request->no
            ]);

            $responseJson = [
                "code" => 1,
                "msg" => "Success",
                "floor" => $reged_room
            ];
        } else {
            $responseJson = [
                "code" => 2,
                "msg" => "Invalid data"
            ];
        }

        return json_encode($responseJson);
    }

    public function roomFindById(Request $request)
    {
        $request->validate([
            'rid' => ['required', 'integer'],
        ]);

        $roomObj = Room::where('id', $request->rid)->first();

        $responseJson = [];

        if (!empty($roomObj)) {
            $responseJson = [
                "code" => 1,
                "msg" => "Success",
                "room" => $roomObj
            ];
        } else {
            $responseJson = [
                "code" => 2,
                "msg" => "Not Found"
            ];
        }

        return json_encode($responseJson);
    }

    public function roomAllFind(Request $request)
    {
        $roomsObj = Room::get();

        $responseJson = [];

        $responseJson = [
            "code" => 1,
            "msg" => "Success",
            "rooms" => $roomsObj
        ];

        return json_encode($responseJson);
    }
}
