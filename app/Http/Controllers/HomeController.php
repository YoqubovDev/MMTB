<?php

namespace App\Http\Controllers;

use App\Models\Kindergarten;
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

    public function school(string $schoolId)
    {
        $added = Added::with('district')->findOrFail($schoolId);
        return view('data', [
            'added' => $added,
        ]);
    }
    public function kinder(string $kindergartenId)
    {
        $kindergarten = Kindergarten::with('district')->findOrFail($kindergartenId);
        return view('data', [
            'kindergartenId' => $kindergarten,
        ]);
    }



}
