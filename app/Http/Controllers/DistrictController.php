<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\District;
use App\Models\Kindergarten;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
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
            $districts = Cache::remember('districts.all', 3600, function () {
                return District::where('status', true)
                    ->with([
                        'schools' => fn ($query) => $query->where('status', true),
                        'kindergartens' => fn ($query) => $query->where('status', true)
                    ])
                    ->get();
            });

            $statistics = Cache::remember('districts.statistics', 3600, function () {
                return [
                    'totalSchools' => School::where('status', true)->count(),
                    'totalKindergartens' => Kindergarten::where('status', true)->count(),
                    'schoolsCapacity' => School::where('status', true)->sum('capacity'),
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
            return view('districts.show', [
                'district' => null,
                'error' => __('errors.district_not_found')
            ])->with('error', __('errors.district_not_found'));
        } catch (\Exception $e) {
            \Log::error('Error loading district details: ' . $e->getMessage());
            return view('districts.show', [
                'district' => null,
                'error' => __('errors.district_loading_failed')
            ])->with('error', __('errors.district_loading_failed'));
        }
    }

    /**
     * Display the school region view with all districts and their schools count.
     */
    public function schoolRegion(): View
    {
        $startTime = microtime(true);
        $isDebug = app()->environment() !== 'production';
        $debugData = [];
        $memoryBefore = memory_get_usage();

        try {
            if ($isDebug) {
                DB::enableQueryLog();
                Log::info('Starting schoolRegion method execution');
                $debugData[] = "Environment: " . app()->environment();
                $debugData[] = "PHP Version: " . PHP_VERSION;
                $debugData[] = "Laravel Version: " . app()->version();

                // Check if key routes are properly registered
                $debugData[] = "Route 'added' exists: " . (Route::has('added') ? 'Yes' : 'No');
                $debugData[] = "Route 'school-region' exists: " . (Route::has('school-region') ? 'Yes' : 'No');
            }

            // Database connection check
            if ($isDebug) {
                try {
                    // Check database connection
                    $isConnected = DB::connection()->getPdo() ? true : false;
                    $debugData[] = "Database connection: " . ($isConnected ? "Successful" : "Failed");
                    $debugData[] = "Database name: " . DB::connection()->getDatabaseName();

                    // Check if districts table exists
                    $tableExists = Schema::hasTable('districts');
                    $debugData[] = "Districts table exists: " . ($tableExists ? "Yes" : "No");

                    if ($tableExists) {
                        // Get table columns
                        $columns = Schema::getColumnListing('districts');
                        $debugData[] = "Table columns: " . implode(", ", $columns);

                        // Count total records
                        $totalRecords = DB::table('districts')->count();
                        $debugData[] = "Total records in districts table: " . $totalRecords;

                        // Count active records
                        $activeRecords = DB::table('districts')->where('status', true)->count();
                        $debugData[] = "Active records (status=true): " . $activeRecords;

                        // Sample record if any exists
                        if ($totalRecords > 0) {
                            $sampleRecord = DB::table('districts')->first();
                            $debugData[] = "Sample record: " . json_encode($sampleRecord);
                        }
                    }
                } catch (\Exception $dbEx) {
                    $debugData[] = "Database check error: " . $dbEx->getMessage();
                    Log::error("Database check failed: " . $dbEx->getMessage());
                }
            }

            // Simple districts query with schools count
            $queryStartTime = microtime(true);
            $districts = District::where('status', true)
                ->withCount('schools')
                ->orderBy('name')
                ->get();
            $queryEndTime = microtime(true);

            if ($isDebug) {
                $queries = DB::getQueryLog();
                $lastQuery = end($queries);
                $debugData[] = "Query execution time: " . round(($queryEndTime - $queryStartTime) * 1000, 2) . "ms";
                $debugData[] = "SQL Query: " . ($lastQuery['query'] ?? 'No query logged');
                $debugData[] = "Query Bindings: " . json_encode($lastQuery['bindings'] ?? []);
                $debugData[] = "Districts count: " . $districts->count();

                if ($districts->isNotEmpty()) {
                    $sample = $districts->first();
                    $debugData[] = "First district: " . $sample->name;
                    $debugData[] = "First district schools count: " . $sample->schools_count;
                    $debugData[] = "First district attributes: " . json_encode($sample->getAttributes());
                } else {
                    $debugData[] = "No districts found";

                    // Check if there are any districts at all (ignoring status)
                    $allDistrictsCount = District::count();
                    $debugData[] = "Total districts in table (ignoring status): " . $allDistrictsCount;
                    if ($allDistrictsCount > 0) {
                        $debugData[] = "There are districts in the table, but none with status=true";
                    }
                }

                // Check for potential route generation issues
                if ($districts->isNotEmpty()) {
                    try {
                        $firstDistrict = $districts->first();
                        $testRoute = route('added', ['added' => $firstDistrict->id]);
                        $debugData[] = "Route generation successful: $testRoute";
                    } catch (\Exception $routeEx) {
                        $debugData[] = "Route generation error: " . $routeEx->getMessage();
                    }
                }

                // Memory usage
                $memoryAfter = memory_get_usage();
                $debugData[] = "Memory before: " . round($memoryBefore / 1024 / 1024, 2) . "MB";
                $debugData[] = "Memory after: " . round($memoryAfter / 1024 / 1024, 2) . "MB";
                $debugData[] = "Memory usage: " . round(($memoryAfter - $memoryBefore) / 1024 / 1024, 2) . "MB";
            }

            // Format debug data for view
            $debugOutput = $isDebug ? implode("\n", $debugData) : '';

            // Record total execution time
            $endTime = microtime(true);
            if ($isDebug) {
                $debugOutput .= "\nTotal execution time: " . round(($endTime - $startTime) * 1000, 2) . "ms";
                Log::info('schoolRegion method completed in ' . round(($endTime - $startTime) * 1000, 2) . 'ms');
            }


            $viewData = [
                // Ensure districts is always a collection, even if empty
                'districts' => $districts ?? collect(),
                'executionTime' => round(($endTime - $startTime) * 1000, 2)
            ];


            if ($isDebug && !empty($debugOutput)) {
                $viewData['debugMessage'] = $debugOutput;
            }


            if ($isDebug) {
                Log::info('Passing to view with keys: ' . implode(', ', array_keys($viewData)));
                Log::info('Districts count being passed: ' . ($viewData['districts']->count() ?? 0));
            }


            return view('school-region', $viewData);
        } catch (\Exception $e) {
            $endTime = microtime(true);

            if ($isDebug) {
                Log::error('Error in schoolRegion: ' . $e->getMessage());
                Log::error('Stack trace: ' . $e->getTraceAsString());

                $debugData[] = "ERROR: " . $e->getMessage();
                $debugData[] = "File: " . $e->getFile() . ":" . $e->getLine();
                $debugData[] = "Memory usage: " . round((memory_get_usage() - $memoryBefore) / 1024 / 1024, 2) . "MB";
                $debugData[] = "Total execution time: " . round(($endTime - $startTime) * 1000, 2) . "ms";

                $debugOutput = implode("\n", $debugData);
            } else {

                $debugOutput = '';
            }

            $viewData = [

                'districts' => collect(),
                'error' => 'Error: ' . $e->getMessage()
            ];

            // Add debug information only in non-production environments
            if ($isDebug && !empty($debugOutput)) {
                $viewData['debugMessage'] = $debugOutput;
            }

            // Pass data to view with explicit error handling
            return view('school-region', $viewData);
        }
    }
    public function kindergartenRegion(): View
    {
        $startTime = microtime(true);
        $isDebug = app()->environment() !== 'production';
        $debugData = [];
        $memoryBefore = memory_get_usage();

        try {
            if ($isDebug) {
                DB::enableQueryLog();
                Log::info('Starting kindergartenRegion method execution');
                $debugData[] = "Environment: " . app()->environment();
                $debugData[] = "PHP Version: " . PHP_VERSION;
                $debugData[] = "Laravel Version: " . app()->version();


                $debugData[] = "Route 'added' exists: " . (Route::has('added') ? 'Yes' : 'No');
                $debugData[] = "Route 'kindergarten-region' exists: " . (Route::has('kindergarten-region') ? 'Yes' : 'No');
            }

            // Database connection check
            if ($isDebug) {
                try {

                    $isConnected = DB::connection()->getPdo() ? true : false;
                    $debugData[] = "Database connection: " . ($isConnected ? "Successful" : "Failed");
                    $debugData[] = "Database name: " . DB::connection()->getDatabaseName();


                    $tableExists = Schema::hasTable('districts');
                    $debugData[] = "Districts table exists: " . ($tableExists ? "Yes" : "No");

                    if ($tableExists) {

                        $columns = Schema::getColumnListing('districts');
                        $debugData[] = "Table columns: " . implode(", ", $columns);


                        $totalRecords = DB::table('districts')->count();
                        $debugData[] = "Total records in districts table: " . $totalRecords;


                        $activeRecords = DB::table('districts')->where('status', true)->count();
                        $debugData[] = "Active records (status=true): " . $activeRecords;


                        if ($totalRecords > 0) {
                            $sampleRecord = DB::table('districts')->first();
                            $debugData[] = "Sample record: " . json_encode($sampleRecord);
                        }
                    }
                } catch (\Exception $dbEx) {
                    $debugData[] = "Database check error: " . $dbEx->getMessage();
                    Log::error("Database check failed: " . $dbEx->getMessage());
                }
            }


            $queryStartTime = microtime(true);
            $districts = District::where('status', true)
                ->withCount('kindergartens')
                ->orderBy('name')
                ->get();
            $queryEndTime = microtime(true);

            if ($isDebug) {
                $queries = DB::getQueryLog();
                $lastQuery = end($queries);
                $debugData[] = "Query execution time: " . round(($queryEndTime - $queryStartTime) * 1000, 2) . "ms";
                $debugData[] = "SQL Query: " . ($lastQuery['query'] ?? 'No query logged');
                $debugData[] = "Query Bindings: " . json_encode($lastQuery['bindings'] ?? []);
                $debugData[] = "Districts count: " . $districts->count();

                if ($districts->isNotEmpty()) {
                    $sample = $districts->first();
                    $debugData[] = "First district: " . $sample->name;
                    $debugData[] = "First district kindergartens count: " . $sample->kindergartens_count;
                    $debugData[] = "First district attributes: " . json_encode($sample->getAttributes());
                } else {
                    $debugData[] = "No districts found";


                    $allDistrictsCount = District::count();
                    $debugData[] = "Total districts in table (ignoring status): " . $allDistrictsCount;
                    if ($allDistrictsCount > 0) {
                        $debugData[] = "There are districts in the table, but none with status=true";
                    }
                }


                if ($districts->isNotEmpty()) {
                    try {
                        $firstDistrict = $districts->first();
                        $testRoute = route('added', ['added' => $firstDistrict->id]);
                        $debugData[] = "Route generation successful: $testRoute";
                    } catch (\Exception $routeEx) {
                        $debugData[] = "Route generation error: " . $routeEx->getMessage();
                    }
                }


                $memoryAfter = memory_get_usage();
                $debugData[] = "Memory before: " . round($memoryBefore / 1024 / 1024, 2) . "MB";
                $debugData[] = "Memory after: " . round($memoryAfter / 1024 / 1024, 2) . "MB";
                $debugData[] = "Memory usage: " . round(($memoryAfter - $memoryBefore) / 1024 / 1024, 2) . "MB";
            }

            // Format debug data for view
            $debugOutput = $isDebug ? implode("\n", $debugData) : '';

            // Record total execution time
            $endTime = microtime(true);
            if ($isDebug) {
                $debugOutput .= "\nTotal execution time: " . round(($endTime - $startTime) * 1000, 2) . "ms";
                Log::info('kindergartenRegion method completed in ' . round(($endTime - $startTime) * 1000, 2) . 'ms');
            }

            $viewData = [
                // Ensure districts is always a collection, even if empty
                'districts' => $districts ?? collect(),
                'executionTime' => round(($endTime - $startTime) * 1000, 2)
            ];

            if ($isDebug && !empty($debugOutput)) {
                $viewData['debugMessage'] = $debugOutput;
            }

            // Log the data being passed to the view
            if ($isDebug) {
                Log::info('Passing to view with keys: ' . implode(', ', array_keys($viewData)));
                Log::info('Districts count being passed: ' . ($viewData['districts']->count() ?? 0));
            }

            // Pass data to view
            return view('kindergarten-region', $viewData);
        } catch (\Exception $e) {
            $endTime = microtime(true);

            if ($isDebug) {
                Log::error('Error in kindergartenRegion: ' . $e->getMessage());
                Log::error('Stack trace: ' . $e->getTraceAsString());

                // Include debug information with the error
                $debugData[] = "ERROR: " . $e->getMessage();
                $debugData[] = "File: " . $e->getFile() . ":" . $e->getLine();
                $debugData[] = "Memory usage: " . round((memory_get_usage() - $memoryBefore) / 1024 / 1024, 2) . "MB";
                $debugData[] = "Total execution time: " . round(($endTime - $startTime) * 1000, 2) . "ms";

                $debugOutput = implode("\n", $debugData);
            } else {
                // In production, don't include detailed debug info
                $debugOutput = '';
            }
            // Prepare view data with error information
            $viewData = [
                // Always ensure districts is a collection, even when empty
                'districts' => collect(),
                'error' => 'Error: ' . $e->getMessage()
            ];

            // Add debug information only in non-production environments
            if ($isDebug && !empty($debugOutput)) {
                $viewData['debugMessage'] = $debugOutput;
            }

            // Pass data to view with explicit error handling
            return view('kindergarten-region', $viewData);
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
        Cache::forget('districts.with_kindergartens_count');
        Cache::forget('districts.with_schools_count');
    }
}
