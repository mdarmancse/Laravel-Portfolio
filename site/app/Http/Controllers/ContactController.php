<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    function ContactIndex(){

        return view('Contact');
    }
}
