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
        User::factory(10)->create()->each(function (User $user) {
            $user->addRole(Roles::VIEW_OWN->value);
            $user->addRole(Roles::EDIT_OWN->value);
            $user->addRole(Roles::EDIT_OTHERS->value);
            $user->addRole(Roles::VIEW_OTHERS->value);
        });
        User::factory(90)->create()->each(function (User $user) {
            $user->addRole(Roles::VIEW_OWN->value);
            $user->addRole(Roles::EDIT_OWN->value);
        });
    }
}
