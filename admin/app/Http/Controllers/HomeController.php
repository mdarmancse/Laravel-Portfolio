<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\ServicesModel;
use App\VisitorModel;
use App\CoursesModel;
use App\ProjectModel;
use App\ReviewModel;
use App\ContactModel;

class HomeController extends Controller
{
       //ADMIN
    function HomeIndexAdmin(){

       $TotalVisitors= VisitorModel::count();
        $TotalServices= ServicesModel::count();
        $TotalCourses= CoursesModel::count();
        $TotalProjects= ProjectModel::count();
        $TotalReviews= ReviewModel::count();
        $TotalContact= ContactModel::count();

        return view('Home',[

            'TotalVisitors'=>$TotalVisitors,
            'TotalServices'=>$TotalServices,
            'TotalCourses'=>$TotalCourses,
            'TotalProjects'=>$TotalProjects,
            'TotalReviews'=>$TotalReviews,
            'TotalContact'=>$TotalContact


        ]);
    }

}
