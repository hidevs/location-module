<?php

namespace Modules\Location\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subregion extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id',
        'name',
        'region_id',
        'translations',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'translations' => 'array',
    ];

    /**
     * Get the region that owns the subregion.
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    /**
     * Get the countries for the subregion.
     */
    public function countries(): HasMany
    {
        return $this->hasMany(Country::class);
    }
}
