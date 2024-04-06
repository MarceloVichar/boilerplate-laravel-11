<?php

namespace Database\Seeders;

use App\Domain\Role\Enums\RoleGroupEnum;
use App\Domain\User\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $admin = User::factory()->create([
            'name' => 'Test User Admin',
            'email' => 'admin@admin.com',
            'password' => '12345678',
            'group' => RoleGroupEnum::ADMIN
        ]);

        $admin->assignRole('admin');

        $client = User::factory()->create([
            'name' => 'Test User Client',
            'email' => 'client@client.com',
            'password' => '12345678',
            'group' => RoleGroupEnum::CLIENT
        ]);

        $client->assignRole('client');
    }
}