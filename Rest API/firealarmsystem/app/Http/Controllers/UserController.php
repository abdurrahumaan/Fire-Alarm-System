<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function adminAuth(Request $request)
    {
        $request->validate([
            'un' => ['required', 'string'],
            'pw' => ['required', 'string'],
        ]);

        $userObj = User::where('username', $request->un)->first();

        $responseJson = [];

        if (!empty($userObj)) {

            if (Hash::check($request->pw, $userObj->password) && $userObj->usertype == "1") {
                $responseJson = [
                    "code" => 1,
                    "msg" => "Welcome",
                    "user" => $userObj
                ];
            } else {
                $responseJson = [
                    "code" => 2,
                    "msg" => "Incorrect password or access denied",
                ];
            }
        } else {
            $responseJson = [
                "code" => 2,
                "msg" => "No username or password found. please recheck"
            ];
        }

        return json_encode($responseJson);
    }

    public function registerAdmin(Request $request)
    {
        $request->validate([
            'un' => ['required', 'string'],
            'pw' => ['required', 'string'],
            'email' => ['required', 'string'],
            'mno' => ['required', 'string'],
        ]);

        $userObj=User::create([
            'username'=>$request->un,
            'password'=>Hash::make($request->pw),
            'email'=>$request->email,
            'mobileno'=>$request->mno,
            'usertype'=>1,
        ]);

        $responseJson = [
            "code" => 1,
            "msg" => "Welcome",
            "user" => $userObj
        ];

        return json_encode($responseJson);
    }
}
