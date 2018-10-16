<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Blood;
use App\Governerate;
use App\City;
use App\Client;

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
            'client_name' => Client::find($this->client_id)->name,
            'name' => $this->name,
            'age' => $this->age,
            'blood_type' => Blood::find($this->blood_id)->type,
            'bags' => $this->bags,
            'hospital' => $this->hospital,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'phone' => $this->phone,
            'governerate' => Governerate::find($this->governerate_id)->name,
            'city' => City::find($this->city_id)->name,
            'details' => $this->details,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at
        ];
    }
}
