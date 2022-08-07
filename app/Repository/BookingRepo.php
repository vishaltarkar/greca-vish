<?php

namespace App\Repository;

use App\Models\Booking;

class BookingRepo
{
    public function store($data)
    {
        $data['booked_on'] = now();
        return Booking::create($data);
    }

    public function getAll()
    {
        return Booking::latest()->get();
    }
}
