<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class BankAccountResource extends JsonResource
{
    private function redact(string $value, int $number = 4): string
    {
        if (strlen($value) <= $number) {
            return str_repeat("X", strlen($value) - 1 ) . substr($value, -1);
        }
        return str_repeat("X", strlen($value) - $number ) . substr($value, $number * -1);
    }

    private function format(string $value, int $number = 4, string $separator = " "): string
    {
        return implode($separator, str_split($value, $number));
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "name" => $this->name,
            "number" => $this->format($this->redact($this->number,3), 4),
            "sort_code" => $this->format($this->redact($this->sort_code, 2), 2, '-'),
            "card_number" => $this->format($this->redact($this->card_number), 4),
            "expires_at" => $this->expires_at->format("m/y"),
        ];
    }
}
