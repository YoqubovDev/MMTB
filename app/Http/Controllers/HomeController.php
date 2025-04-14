<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('home');
    }

    public function schoolRegion(){
        return view('school-region');
    }

    public function main(){
        return view('main');
    }
}
