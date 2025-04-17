<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Added;

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

    public function data(string $schoolId)
    {
        $added = Added::with('district')->findOrFail($schoolId);
        return view('data', [
            'added' => $added,
        ]);
    }



}
