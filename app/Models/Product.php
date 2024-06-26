<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'brand_id',
        'description',
        'file_path',
        'subcategory_id',
    ];

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function favourite(): HasMany
    {
        return $this->hasMany(Favourite::class);
    }

    /**
     * @return HasMany
     */
    public function sizechart(): BelongsToMany
    {
        return $this->belongsToMany(SizeChart::class);
    }
}
