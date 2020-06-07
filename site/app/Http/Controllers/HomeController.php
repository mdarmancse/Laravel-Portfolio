<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\VisitorModel;
use App\ServicesModel;
use App\CoursesModel;
use App\ProjectModel;
use App\ContactModel;
use App\ReviewModel;

class HomeController extends Controller
{
    function HomeIndex(){

        $UserIP=$_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate= date("Y-m-d h:i:sa");
        VisitorModel::insert(['ip_address'=> $UserIP,'visit_time'=> $timeDate]);
        $ServicesData=json_decode(ServicesModel::orderBy('id','desc')->limit(8)->get());
        $CoursesData=json_decode(CoursesModel::orderBy('id','desc')->limit(6)->get());
        $ProjectData=json_decode(ProjectModel::orderBy('id','desc')->limit(6)->get());
        $ReviewData=json_decode(ReviewModel::orderBy('id','desc')->limit(6)->get());

        return view('Home',[
            'ServicesData'=>$ServicesData,
            'CoursesData'=>$CoursesData,
            'ProjectData'=>$ProjectData,
            'ReviewData'=>$ReviewData
        ]);

    }

    function contactIndex(Request $request){

        $name=$request->input('contact_name');
        $mobile=$request->input('contact_mobile');
        $email=$request->input('contact_email');
        $msg=$request->input('conatact_msg');

        $result=ContactModel::insert([
            'contact_name'=>$name,
            'contact_mobile'=>$mobile,
            'contact_email'=>$email,
            'conatact_msg'=>$msg

        ]);

        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }
}
