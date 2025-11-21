<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'testuser@gmail.com'], // unique key
            [
                'name' => 'Test User',
                'username' => 'user.testing',
                'password' => bcrypt('12345678'),
                'role' => 'BU',
            ]
        );
    }
}
