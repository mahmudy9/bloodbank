<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class DonationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'client_name' => $request->user()->name,
            'name' => $this->name,
            'age' => $this->age,
            'blood_type' => $this->blood->type,
            'bags' => $this->bags,
            'hospital' => $this->hospital,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'phone' => $this->phone,
            'governerate' => $this->governerate->name,
            'city' => $this->city->name,
            'details' => $this->details,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at
        ];
    }
}
