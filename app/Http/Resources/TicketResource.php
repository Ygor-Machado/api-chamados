<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            'departament' => $this->departament->name,
            'user_name' => $this->user->name,
            'title' => $this->title,
            'observation' => $this->observation,
            'email' => $this->user->email,
            'status' => $this->status,
            'solution' => $this->solution,
            'note' => $this->note,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
