<?php

namespace App\Observers;

use App\Models\Added;
use Illuminate\Support\Facades\Cache;

class SchoolObserver
{
    /**
     * Handle the Added "created" event.
     */
    public function created(Added $school)
    {
        $this->clearDistrictCache($school->district_id);
    }

    /**
     * Handle the Added "updated" event.
     */
    public function updated(Added $school)
    {
        $this->clearDistrictCache($school->district_id);

        // If district_id changed, clear cache for old district too
        if ($school->wasChanged('district_id')) {
            $this->clearDistrictCache($school->getOriginal('district_id'));
        }
    }

    /**
     * Handle the Added "deleted" event.
     */
    public function deleted(Added $school)
    {
        $this->clearDistrictCache($school->district_id);
    }

    /**
     * Handle the Added "restored" event.
     */
    public function restored(Added $school)
    {
        $this->clearDistrictCache($school->district_id);
    }

    /**
     * Handle the Added "force deleted" event.
     */
    public function forceDeleted(Added $school)
    {
        $this->clearDistrictCache($school->district_id);
    }

    /**
     * Clear the cache for the given district.
     */
    private function clearDistrictCache($districtId)
    {
        Cache::forget("districts.{$districtId}");
        Cache::forget('districts.all');
        Cache::forget('districts.statistics');
    }
}

