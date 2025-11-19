<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Misbahudin Zaki',
            'username' => 'misbahudin.zaki',
            'email' => 'misbahudinzaki07@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => "BU",
            'branch_id' => 1,
        ]);
    }
}
