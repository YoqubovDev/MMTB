<?php

namespace App\Observers;

use App\Models\School;
use Illuminate\Support\Facades\Cache;

class SchoolObserver
{
    /**
     * Handle the School "created" event.
     */
    public function created(School $school)
    {
        $this->clearDistrictCache($school->district_id);
    }

    /**
     * Handle the School "updated" event.
     */
    public function updated(School $school)
    {
        $this->clearDistrictCache($school->district_id);
        
        // If district_id changed, clear cache for old district too
        if ($school->wasChanged('district_id')) {
            $this->clearDistrictCache($school->getOriginal('district_id'));
        }
    }

    /**
     * Handle the School "deleted" event.
     */
    public function deleted(School $school)
    {
        $this->clearDistrictCache($school->district_id);
    }

    /**
     * Handle the School "restored" event.
     */
    public function restored(School $school)
    {
        $this->clearDistrictCache($school->district_id);
    }

    /**
     * Handle the School "force deleted" event.
     */
    public function forceDeleted(School $school)
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

