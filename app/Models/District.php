<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class District extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'region',
        'status',
    ];

    /**
     * Get the schools for the district.
     */
    public function schools(): HasMany
    {
        return $this->hasMany(Added::class);
    }

    /**
     * Get the kindergartens for the district.
     */
    public function kindergartens()
    {
        return $this->hasMany(Kindergarten::class);
    }

    /**
     * Get validation rules for the district.
     */
    public static function validationRules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'status' => 'required|boolean',
        ];
    }
}

