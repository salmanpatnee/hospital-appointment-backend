<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
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
            'user' => new UserResource($this->user), 
            'doctor' => new DoctorResource($this->doctor), 
            'name' => $this->name, 
            'email' => $this->email, 
            'phone' => $this->phone, 
            'date' => $this->date, 
            'message' => $this->message, 
            'status' => $this->status
        ];
    }
}
