<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public const SLUG_EXCURSIONS = 'excursions';
    public const SLUG_CUSTOM_PACKAGES = 'custom_packages';
    public const SLUG_CRUISES_AND_TRANFERS = 'cruises_and_transfers';

    protected $fillable = [
        'title',
        'type',
        'description',
        'capacity'
    ];

    protected $appends = ['is_available'];

    public function getIsAvailableAttribute()
    {
        return $this->bookings->count() > $this->capacity ? false : true;
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
