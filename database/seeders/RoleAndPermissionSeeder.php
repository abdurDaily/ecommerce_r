<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createPost = Permission::create(['name' => 'create post']);
        $editPost = Permission::create(['name' => 'edit post']);
        $deletePost = Permission::create(['name' => 'delete post']);

        // Create Roles and Assign Permissions
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo([$createPost, $editPost, $deletePost]);

        $editor = Role::create(['name' => 'editor']);
        $editor->givePermissionTo([$createPost, $editPost]);

        $user = Role::create(['name' => 'user']);
        $user->givePermissionTo($createPost);

        $user=  User::find(2);
        $user->assignRole('admin');



    }
}
