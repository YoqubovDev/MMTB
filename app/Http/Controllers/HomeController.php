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
    public function added()
    {
        $districts = District::where('status', true)->get();
        $addeds = Added::with('district')->get();

        // Add detailed debug logging
        \Log::info('Added method called');
        \Log::info('Districts count: ' . $districts->count());
        \Log::info('First district: ' . ($districts->first() ? $districts->first()->name : 'none'));
        \Log::info('View data keys: ' . implode(', ', array_keys(compact('districts', 'addeds'))));

        return view('added', compact('districts', 'addeds'));
    }
    public function data(string $schoolId)
    {
        $added = Added::with('district')->findOrFail($schoolId);
        return view('data', [
            'added' => $added,
        ]);
    }


}
