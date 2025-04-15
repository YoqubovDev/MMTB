<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Added;
use App\Models\Kindergarten;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DistrictController extends Controller
{
    /**
     * Display a listing of the districts.
     */
    public function index(): View
    {
        try {
            // Cache districts and statistics for 1 hour
            $districts = Cache::remember('districts.all', 3600, function () {
                return District::where('status', true)
                    ->with(['schools' => function ($query) {
                        $query->where('status', true);
                    }, 'kindergartens' => function ($query) {
                        $query->where('status', true);
                    }])
                    ->get();
            });

            // Cache statistics separately
            $statistics = Cache::remember('districts.statistics', 3600, function () {
                return [
                    'totalSchools' => Added::where('status', true)->count(),
                    'totalKindergartens' => Kindergarten::where('status', true)->count(),
                    'schoolsCapacity' => Added::where('status', true)->sum('capacity'),
                    'kindergartensCapacity' => Kindergarten::where('status', true)->sum('capacity'),
                ];
            });

            return view('districts.index', [
                'districts' => $districts,
                'totalSchools' => $statistics['totalSchools'],
                'totalKindergartens' => $statistics['totalKindergartens'],
                'totalCapacity' => $statistics['schoolsCapacity'] + $statistics['kindergartensCapacity']
            ]);
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error loading districts: ' . $e->getMessage());

            // Return view with error message
            return view('districts.index', [
                'districts' => collect(),
                'totalSchools' => 0,
                'totalKindergartens' => 0,
                'totalCapacity' => 0,
                'error' => 'Ma\'lumotlarni yuklashda xatolik yuz berdi. Iltimos, qayta urinib ko\'ring.'
            ]);
        }
    }

    /**
     * Display the specified district with its schools and kindergartens.
     */
    public function show(District $district): View
    {
        try {
            // Verify district is active
            if (!$district->status) {
                throw new ModelNotFoundException('District not found or inactive');
            }

            // Cache individual district data for 1 hour
            $districtData = Cache::remember("districts.{$district->id}", 3600, function () use ($district) {
                return $district->load([
                    'schools' => function ($query) {
                        $query->where('status', true);
                    },
                    'kindergartens' => function ($query) {
                        $query->where('status', true);
                    }
                ]);
            });

            return view('districts.show', ['district' => $districtData]);
        } catch (ModelNotFoundException $e) {
            abort(404, 'Tuman topilmadi');
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error loading district details: ' . $e->getMessage());

            // Redirect to index with error message
            return redirect()->route('districts.index')
                ->with('error', 'Tuman ma\'lumotlarini yuklashda xatolik yuz berdi. Iltimos, qayta urinib ko\'ring.');
        }
    }

    /**
     * Clear the cache for a specific district.
     */
    private function clearDistrictCache(District $district): void
    {
        Cache::forget("districts.{$district->id}");
        Cache::forget('districts.all');
        Cache::forget('districts.statistics');
    }
}

