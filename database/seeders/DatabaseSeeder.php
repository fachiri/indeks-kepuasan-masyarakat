<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin IKM',
            'email' => 'admin@ikm.test',
            'password' => Hash::make('pass1234'),
            'avatar' => 'https://www.gravatar.com/avatar/'.hash('sha256', strtolower(trim('admin@ikm.test')))
        ]);
    }
}
