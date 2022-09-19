<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BankAccount>
 */
class BankAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "user_id" => User::inRandomOrder()->first()->id,
            "name" => fake()->name,
            "number" => substr(fake()->bankAccountNumber(), 0, 8),
            "sort_code" => str_pad(fake()->randomNumber(6), 6, "0", STR_PAD_LEFT),
            "card_number" => str_pad(fake()->creditCardNumber(), 16, "0", STR_PAD_LEFT),
            "cvv" => str_pad(fake()->randomNumber(3), 3, "0", STR_PAD_LEFT),
            "expires_at" => Carbon::make(fake()->date('Y-m-d'))->endOfMonth(),
        ];
    }
}
