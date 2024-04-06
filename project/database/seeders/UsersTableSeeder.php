<?php

namespace Database\Seeders;

use App\Domain\User\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'Test User Admin',
            'email' => 'admin@admin.com',
            'password' => '12345678'
        ]);
    }
}
