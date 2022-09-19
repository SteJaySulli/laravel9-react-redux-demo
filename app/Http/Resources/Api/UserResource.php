<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "roles" => $this->roles->map(fn ($role) => $role->name),
            "accounts" => $this->bankAccounts->count() > 0 ? BankAccountResource::collection($this->bankAccounts) : null,
        ];
    }
}
