<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    public function schoolRegion(){
        return view('school-region');
    }

    public function main(){
        return view('main');
    }

   public function kindergartenRegion()
   {
       return view('kindergarten-region');
   }
}
