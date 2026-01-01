<?php

namespace Modules\Location\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id',
        'name',
        'iso3',
        'iso2',
        'numeric_code',
        'phonecode',
        'capital',
        'currency',
        'currency_name',
        'currency_symbol',
        'tld',
        'native',
        'emoji',
        'emojiU',
        'population',
        'gdp',
        'region',
        'region_id',
        'subregion',
        'subregion_id',
        'nationality',
        'latitude',
        'longitude',
        'area_sq_km',
        'postal_code_format',
        'postal_code_regex',
        'timezones',
        'translations',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'population' => 'integer',
        'gdp' => 'decimal:2',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'area_sq_km' => 'decimal:2',
        'timezones' => 'array',
        'translations' => 'array',
    ];

    /**
     * Get the region that owns the country.
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    /**
     * Get the subregion that owns the country.
     */
    public function subregion(): BelongsTo
    {
        return $this->belongsTo(Subregion::class);
    }

    /**
     * Get the states for the country.
     */
    public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }

    /**
     * Get the cities for the country.
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
