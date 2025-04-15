<?php

namespace App\Observers;

use App\Models\Kindergarten;
use Illuminate\Support\Facades\Cache;

class KindergartenObserver
{
    /**
     * Handle the Kindergarten "created" event.
     */
    public function created(Kindergarten $kindergarten)
    {
        $this->clearDistrictCache($kindergarten->district_id);
    }

    /**
     * Handle the Kindergarten "updated" event.
     */
    public function updated(Kindergarten $kindergarten)
    {
        $this->clearDistrictCache($kindergarten->district_id);
        
        // If district_id changed, clear cache for old district too
        if ($kindergarten->wasChanged('district_id')) {
            $this->clearDistrictCache($kindergarten->getOriginal('district_id'));
        }
    }

    /**
     * Handle the Kindergarten "deleted" event.
     */
    public function deleted(Kindergarten $kindergarten)
    {
        $this->clearDistrictCache($kindergarten->district_id);
    }

    /**
     * Handle the Kindergarten "restored" event.
     */
    public function restored(Kindergarten $kindergarten)
    {
        $this->clearDistrictCache($kindergarten->district_id);
    }

    /**
     * Handle the Kindergarten "force deleted" event.
     */
    public function forceDeleted(Kindergarten $kindergarten)
    {
        $this->clearDistrictCache($kindergarten->district_id);
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

