<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\VisitorModel;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    function VisitorIndex(){
       // $visitorData=VisitorModel::all();
        $visitorData=json_decode(VisitorModel::orderBy('id','desc')->take(4)->get());
        //dd($visitorData);
        return view('visitor',['visitorData'=>$visitorData]);
    }
}
