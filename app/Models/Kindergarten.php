<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Kindergarten extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'address',
        'district_id',
        'contact_number',
        'email',
        'director_name',
        'capacity',
        'age_range',
        'status',
    ];

    /**
     * Get the district that owns the kindergarten.
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Get validation rules for the kindergarten.
     */
    public static function validationRules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'district_id' => 'required|exists:districts,id',
            'contact_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'director_name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'age_range' => 'required|string|max:50',
            'status' => 'required|boolean',
        ];
    }
    public function kindergartenRegion()
    {
        $districts = DB::table('districts')
            ->leftJoin('kindergartens', 'districts.id', '=', 'kindergartens.district_id')
            ->select('districts.*')
            ->groupBy('districts.id')
            ->get();

        $debugMessage = 'Kindergarten region data loaded successfully';
        $executionTime = round(microtime(true) * 1000) - LARAVEL_START;

        return view('districts.kindergartens', compact('districts', 'debugMessage', 'executionTime'));
    }
}

