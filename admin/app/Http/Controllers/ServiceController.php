<?php

namespace App\Http\Controllers;

use App\ServicesModel;
use App\VisitorModel;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function ServiceIndex()
    {

        return view('Services');
    }

    function getServicesData()
    {
        $result = json_encode(ServicesModel::orderBy('id','desc')->get());
        return $result;
    }

    function serviceDelete($id)
    {
        $result = ServicesModel::where('id', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }

    }

    function serviceDetails(Request $request){
        $id=$request->id;
        $result = ServicesModel::where('id', $id)->get();
        //$result = ServicesModel::where('id', $id)->first();//singleDataRow
        return $result;
    }

    function serviceUpdate(Request $request)
    {
        $id=$request->input('id');
        $name=$request->input('name');
        $des=$request->input('des');
        $img=$request->input('img');


        $result = ServicesModel::where('id', $id)->update(['service_name'=>$name,'service_des'=>$des,'service_img'=>$img]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }

    }

    function serviceAdd(Request $request)
    {

        $name=$request->input('name');
        $des=$request->input('des');
        $img=$request->input('img');


        $result = ServicesModel::insert(['service_name'=>$name,'service_des'=>$des,'service_img'=>$img]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }

    }




}
