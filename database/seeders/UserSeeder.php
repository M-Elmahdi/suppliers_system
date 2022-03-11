<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Muhammed Elmahdi",
            'email' => "mo@gmail.com",
            'password' => Hash::make(12345678),
            'user_type_id' => 1
        ]);
    }
}