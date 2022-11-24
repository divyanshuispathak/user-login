<?php

namespace App\Http\Controllers;


use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DeviceController extends Controller
{
    function list($id = null){
        return $id ? Device::find($id) : Device::all();
    }

    function add(Request $request){
        $device = new Device;
        $device->name = $request->name;
        $device->member_id = $request->member_id;
        $result = $device->save();
        if($result){
        return ['Result' => 'Data has been saved.'];
    }else{
        return ['result' => 'operation failed'];
    }
    }

    function update(Request $request){
        $device = Device::find($request->id);
        $device->name = $request->name;
        $device->member_id = $request->member_id;
        $result = $device->save();
        if($result){
        return ["result" => "Data is updated"];
    }else{
        return ["result" => "Operation failed"];
    }
    }

    function search($name){
        return Device::where("name", "like", "%". $name . "%")->get();
    }

    function delete($id){
        $device = Device::find($id);
        $result = $device->delete();
        if($result){
            return ["result" => "Record has been deleted"];
        }else{
            return ["result" => "Operation Failed"];
        }
    }

    function testData(Request $request){
        $rules = array(
            "member_id" => "required|min:2|max:4"
        );
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            return response()->json($validator->errors(), 401);
        }else
        {
            $device = new Device;
        $device->name = $request->name;
        $device->member_id = $request->member_id;
        $result = $device->save();
        if($result){
        return ['Result' => 'Data has been saved.'];
    }else{
        return ['result' => 'operation failed'];
    }
        }
    }
}
