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
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
        ]);

        $user = User::firstOrCreate(
            ['email' => 'haris.hisham22@gmail.com'],
            [
                'name' => 'Haris Hisham',
                'password' => 'password',
                'email_verified_at' => now(),
            ]
        );

        $user->assignRole(Role::SUPER_ADMIN->value);
    }
}
