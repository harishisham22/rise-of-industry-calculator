<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // SUPER ADMIN
        $user = User::firstOrCreate(
            ['email' => 'haris.hisham22@gmail.com'],
            [
                'name' => 'Haris Hisham',
                'password' => 'password',
                'email_verified_at' => now(),
            ]
        );

        $user->assignRole(Role::SUPER_ADMIN->value);

        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
        ]);
    }
}
