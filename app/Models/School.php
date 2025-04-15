<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class School extends Model
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
        'principal_name',
        'capacity',
        'status',
    ];

    /**
     * Get the district that owns the school.
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Get validation rules for the school.
     */
    public static function validationRules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'district_id' => 'required|exists:districts,id',
            'contact_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'principal_name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|boolean',
        ];
    }
}

