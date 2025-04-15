<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Added;
use App\Models\Kindergarten;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;

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
                    ->with([
                        'schools' => fn ($query) => $query->where('status', true),
                        'kindergartens' => fn ($query) => $query->where('status', true)
                    ])
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
                'totalCapacity' => $statistics['schoolsCapacity'] + $statistics['kindergartensCapacity'],
            ]);
        } catch (\Exception $e) {
            \Log::error('Error loading districts: ' . $e->getMessage());

            return view('districts.index', [
                'districts' => collect(),
                'totalSchools' => 0,
                'totalKindergartens' => 0,
                'totalCapacity' => 0,
                'error' => __('errors.loading_failed'),
            ]);
        }
    }

    /**
     * Display the specified district with its schools and kindergartens.
     */
    public function show(District $district): View
    {
        try {
            if (!$district->status) {
                throw new ModelNotFoundException('District not found or inactive');
            }

            $districtData = Cache::remember("districts.{$district->id}", 3600, function () use ($district) {
                return $district->load([
                    'schools' => fn ($query) => $query->where('status', true),
                    'kindergartens' => fn ($query) => $query->where('status', true),
                ]);
            });
            return view('districts.show', ['district' => $districtData]);
        } catch (ModelNotFoundException $e) {
            \Log::warning('District not found: ' . $district->id);
            abort(404, __('errors.district_not_found'));
        } catch (\Exception $e) {
            \Log::error('Error loading district details: ' . $e->getMessage());
            return redirect()->route('districts.index')
                ->with('error', __('errors.district_loading_failed'));
        }
    }

    /**
     * Display the school region view with all districts.
     */
    public function schoolRegion(): View
    {
        $districts = District::where('status', true)->get();

        return view('school-region', compact('districts'));
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
