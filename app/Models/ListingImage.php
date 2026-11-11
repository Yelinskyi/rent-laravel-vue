<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListingImage extends Model
{
    protected $connection = 'mysql';
    protected $table = 'listing_images';

    protected $fillable = ['file_name'];

    protected $appends = ['src'];

    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }

    public function src(): Attribute
    {
        return Attribute::make(
            get: fn() => asset("storage/$this->file_name")
        );
    }

}
