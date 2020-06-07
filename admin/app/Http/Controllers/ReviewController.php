<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReviewModel;

class ReviewController extends Controller
{
    function ReviewIndex(){

        return view('Review');
    }


    function getReviewsData()
    {
        $result = json_encode(ReviewModel::orderBy('id','desc')->get());
        return $result;
    }

    function reviewDelete(Request $req){
        $id= $req->input('id');
        $result= ReviewModel::where('id','=',$id)->delete();
        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }


    function reviewDetails(Request $request){
        $id=$request->id;
        $result = ReviewModel::where('id', $id)->get();
        //$result = ServicesModel::where('id', $id)->first();//singleDataRow
        return $result;
    }

    function reviewUpdate(Request $request)
    {
        $id=$request->input('id');
        $name=$request->input('name');
        $des=$request->input('des');
        $img=$request->input('img');


        $result = ReviewModel::where('id', $id)->update(['name'=>$name,'des'=>$des,'img'=>$img]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }

    }

    function reviewAdd(Request $request)
    {

        $name=$request->input('name');
        $des=$request->input('des');
        $img=$request->input('img');


        $result = ReviewModel::insert(['name'=>$name,'des'=>$des,'img'=>$img]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }

    }




}

