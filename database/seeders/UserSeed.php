<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@petersonmacedo.com.br',
            'password' => '$2y$10$sho438dYus.dq3/kuHO/GODcXkqifBNmo6wVbrLDW8sYYcN2fZWb6'
        ]);
    }
}
