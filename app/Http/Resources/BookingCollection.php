<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BookingCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'client' => $this->client->select('id', 'first_name', 'last_name', 'email')->first(),
            'product' => $this->product->select('id', 'title', 'capacity')->first(),
            'booked_on' => $this->booked_on->format('Y-m-d H:i:s'),
            'is_available' => $this->isAvailable()
        ];
    }

    private function isAvailable()
    {
        return $this->product->capacity > $this->product->bookings->count();
    }
}
