<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        $roles = DB::table('roles')->get()->keyBy('name');
        $permissions = DB::table('permissions')->get()->keyBy('name');

        // Administrator permissions
        DB::table('permission_role')->insert([
            ['role_id' => $roles['administrator']->id, 'permission_id' => $permissions['manage_users']->id],
            ['role_id' => $roles['administrator']->id, 'permission_id' => $permissions['view_users']->id],
            ['role_id' => $roles['administrator']->id, 'permission_id' => $permissions['login_user']->id],
            ['role_id' => $roles['administrator']->id, 'permission_id' => $permissions['manage_roles_permissions']->id],
            ['role_id' => $roles['administrator']->id, 'permission_id' => $permissions['update_profile']->id],
            ['role_id' => $roles['administrator']->id, 'permission_id' => $permissions['create_contact']->id],
            ['role_id' => $roles['administrator']->id, 'permission_id' => $permissions['edit_contact']->id],
            ['role_id' => $roles['administrator']->id, 'permission_id' => $permissions['delete_contact']->id],
            ['role_id' => $roles['administrator']->id, 'permission_id' => $permissions['view_contacts']->id],
            ['role_id' => $roles['administrator']->id, 'permission_id' => $permissions['create_opportunity']->id],
            ['role_id' => $roles['administrator']->id, 'permission_id' => $permissions['edit_opportunity']->id],
            ['role_id' => $roles['administrator']->id, 'permission_id' => $permissions['delete_opportunity']->id],
            ['role_id' => $roles['administrator']->id, 'permission_id' => $permissions['view_opportunities']->id],
            ['role_id' => $roles['administrator']->id, 'permission_id' => $permissions['analyze_opportunities']->id],
            ['role_id' => $roles['administrator']->id, 'permission_id' => $permissions['create_task']->id],
            ['role_id' => $roles['administrator']->id, 'permission_id' => $permissions['edit_task']->id],
            ['role_id' => $roles['administrator']->id, 'permission_id' => $permissions['delete_task']->id],
            ['role_id' => $roles['administrator']->id, 'permission_id' => $permissions['view_tasks']->id],
            ['role_id' => $roles['administrator']->id, 'permission_id' => $permissions['create_interaction']->id],
            ['role_id' => $roles['administrator']->id, 'permission_id' => $permissions['view_interactions']->id],
        ]);

        // Manager permissions
        DB::table('permission_role')->insert([
            ['role_id' => $roles['manager']->id, 'permission_id' => $permissions['create_contact']->id],
            ['role_id' => $roles['manager']->id, 'permission_id' => $permissions['view_users']->id],
            ['role_id' => $roles['manager']->id, 'permission_id' => $permissions['edit_contact']->id],
            ['role_id' => $roles['manager']->id, 'permission_id' => $permissions['delete_contact']->id],
            ['role_id' => $roles['manager']->id, 'permission_id' => $permissions['view_contacts']->id],
            ['role_id' => $roles['manager']->id, 'permission_id' => $permissions['create_opportunity']->id],
            ['role_id' => $roles['manager']->id, 'permission_id' => $permissions['edit_opportunity']->id],
            ['role_id' => $roles['manager']->id, 'permission_id' => $permissions['delete_opportunity']->id],
            ['role_id' => $roles['manager']->id, 'permission_id' => $permissions['view_opportunities']->id],
            ['role_id' => $roles['manager']->id, 'permission_id' => $permissions['analyze_opportunities']->id],
            ['role_id' => $roles['manager']->id, 'permission_id' => $permissions['create_task']->id],
            ['role_id' => $roles['manager']->id, 'permission_id' => $permissions['edit_task']->id],
            ['role_id' => $roles['manager']->id, 'permission_id' => $permissions['delete_task']->id],
            ['role_id' => $roles['manager']->id, 'permission_id' => $permissions['view_tasks']->id],
            ['role_id' => $roles['manager']->id, 'permission_id' => $permissions['create_interaction']->id],
            ['role_id' => $roles['manager']->id, 'permission_id' => $permissions['edit_interaction']->id],
            ['role_id' => $roles['manager']->id, 'permission_id' => $permissions['delete_interaction']->id],
            ['role_id' => $roles['manager']->id, 'permission_id' => $permissions['view_interactions']->id],
        ]);

        // User permissions
        DB::table('permission_role')->insert([
            ['role_id' => $roles['user']->id, 'permission_id' => $permissions['view_contacts']->id],
            ['role_id' => $roles['user']->id, 'permission_id' => $permissions['view_opportunities']->id],
            ['role_id' => $roles['user']->id, 'permission_id' => $permissions['view_tasks']->id],
            ['role_id' => $roles['user']->id, 'permission_id' => $permissions['view_interactions']->id],
        ]);
    }
}
