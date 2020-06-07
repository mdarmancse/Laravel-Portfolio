<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectModel;

class ProjectsController extends Controller
{
    function ProjectsIndex(){
        $ProjectData=json_decode(ProjectModel::orderBy('id','desc')->limit(6)->get());
        return view('Projects',['ProjectData'=>$ProjectData]);
    }
}
