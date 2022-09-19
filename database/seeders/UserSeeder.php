<?php

namespace Database\Seeders;

use App\Enums\Roles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstUser = User::factory(10)->create()->each(function (User $user) {
            $user->assignRole(Roles::VIEW_OWN->value);
            $user->assignRole(Roles::EDIT_OWN->value);
            $user->assignRole(Roles::EDIT_OTHERS->value);
            $user->assignRole(Roles::VIEW_OTHERS->value);
        })->first();

        $firstUser->update([
            "email" => "admin@example.com",
            "name" => "Admin User"
        ]);
        
        $secondUser = User::factory(90)->create()->each(function (User $user) {
            $user->assignRole(Roles::VIEW_OWN->value);
            $user->assignRole(Roles::EDIT_OWN->value);
        })->first();
        
        $secondUser->update([
            "email" => "user@example.com",
            "name" => "Standard User",
        ]);
    }
}
