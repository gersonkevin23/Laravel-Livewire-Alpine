<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $editor = Role::create(['name' => 'Editor']);
        $admin = Role::create(['name' => 'Super Admin']);
        $member = Role::create(['name' => 'Member']);
        $edit_post = Permission::create(['name' => 'edit posts']);
        $add_post = Permission::create(['name' => 'add posts']);
        $view_post = Permission::create(['name' => 'view posts']);
        $delete_post = Permission::create(['name' => 'delete posts']);
        $editor->givePermissionTo($edit_post);
        $editor->givePermissionTo($add_post);
        $editor->givePermissionTo($view_post);
        $editor->givePermissionTo($delete_post);
        $member->givePermissionTo($view_post);

        $user = User::first();
        if (!$user) {
            $user = User::create([
                'id' => 1,
                'email' => 'admin@test.com',
                'password' => bcrypt('12345678'),
                'status' => 'Pro',
                'name' => 'Super Admin',
            ]);
        }
        $user->assignRole('Super Admin');

    }
}
