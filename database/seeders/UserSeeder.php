<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run()
    {
        User::create([
            "name" => "admin",
            "email" => "testadmin@gmail.com",
            "role" => "admin",
            "password" => Hash::make("12345678"),
        ]);
    }
}
