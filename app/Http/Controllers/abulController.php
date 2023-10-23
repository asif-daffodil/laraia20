<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class abulController extends Controller
{
    public function name(){
        return "Abul Khan";
    }

    public function age(){
        return "250";
    }

    public function student($sname = "Abul", $job = "student"){
        return "$sname is a $job";
    }

    public function maria(){
        return view("maria");
    }

    public function nahar($cname = "Bangladesh"){
        return view("bahar", ["ahar" => $cname]);
    }
}
