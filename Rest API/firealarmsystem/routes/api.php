<?php

use Illuminate\Support\Facades\Route;

//Admin API
Route::get('/authadmin', 'UserController@adminAuth');
Route::get('/regadmin', 'UserController@registerAdmin');


//Floor API
Route::get('/newfloor', 'FloorController@newFloor');
Route::get('/floorbyid', 'FloorController@floorFindById');
Route::get('/allfloors', 'FloorController@floorAllFind');


//Rooms API
Route::get('/newroom', 'RoomController@newRoom');
Route::get('/roombyid', 'RoomController@roomFindById');
Route::get('/allrooms', 'RoomController@roomAllFind');


//Sensor API
Route::get('/newsensor', 'FireAlarmSensorController@newSensor');
Route::get('/sensorbyid', 'FireAlarmSensorController@sensorFindById');
Route::get('/allsensors', 'FireAlarmSensorController@sensorAllFind');


//Room Has Sensor API
Route::get('/newroomhassensor', 'RoomHasFireAlarmSensorController@saveRoomHasSensor');
Route::get('/newroomhassensorbyId', 'RoomHasFireAlarmSensorController@findRoomHasSensorById');
Route::get('/roomhassensors', 'RoomHasFireAlarmSensorController@findRoomHasSensors');
Route::get('/findalldatabyfirealarmsensor', 'RoomHasFireAlarmSensorController@findAllDataByFireAlarmSensorId');


//Fetch Controllers API
Route::get('/fetchSensors', 'ProcessController@fetchData');
