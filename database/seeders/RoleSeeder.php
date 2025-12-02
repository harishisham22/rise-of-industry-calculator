<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use App\Enums\Role as RoleEnum;
use App\Enums\Permission as PermissionEnum;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        foreach (RoleEnum::cases() as $role) {
            Role::findOrCreate($role->value, 'web');
        }

        Role::firstWhere('name', RoleEnum::ADMIN->value)->givePermissionTo(PermissionEnum::cases());
        Role::firstWhere('name', RoleEnum::USER->value)->givePermissionTo(
            collect(PermissionEnum::cases())
                ->filter(fn(PermissionEnum $permissionEnum) => Str::contains($permissionEnum->value, 'view') || Str::contains($permissionEnum->value, 'list'))
                ->toArray()
        );
    }
}
