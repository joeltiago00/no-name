<?php

namespace App\Http\Resources\Church;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChurchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'church_type_id' => ChurchTypeResource::make($this?->type),
            'leader' => UserResource::make($this?->leader),
            'address' => [
                'street' => $this->street,
                'number' => $this->number,
                'neighborhood' => $this->neighborhood,
                'city' => $this->city,
                'state' => $this->state,
                'country' => $this->country,
                'zipcode' => $this->zipcode,
                'complement' => $this->complement
            ],
            'user_create_id' => $this->user_create_id
        ];
    }
}
