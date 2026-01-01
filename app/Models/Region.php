<?php

namespace Modules\Location\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id',
        'name',
        'translations',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'translations' => 'array',
    ];

    /**
     * Get the subregions for the region.
     */
    public function subregions(): HasMany
    {
        return $this->hasMany(Subregion::class);
    }

    /**
     * Get the countries for the region.
     */
    public function countries(): HasMany
    {
        return $this->hasMany(Country::class);
    }
}
