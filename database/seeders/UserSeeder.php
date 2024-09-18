<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Insert default admin user
        $adminRole = DB::table('roles')->where('name', 'administrator')->first();

        DB::table('users')->insert([
            'name' => 'Marie Dupont',
            'email' => 'marie.dupont@example.com',
            'password' => Hash::make('123456789'), // Default password
        ]);

        $user = DB::table('users')->where('email', 'marie.dupont@example.com')->first();

        DB::table('role_user')->insert([
            'user_id' => $user->id,
            'role_id' => $adminRole->id,
        ]);

        // Insert default manager user
        $managerRole = DB::table('roles')->where('name', 'manager')->first();

        DB::table('users')->insert([
            'name' => 'Jean Martin',
            'email' => 'jean.martin@example.com',
            'password' => Hash::make('123456789'), // Default password
        ]);

        $user = DB::table('users')->where('email', 'jean.martin@example.com')->first();

        DB::table('role_user')->insert([
            'user_id' => $user->id,
            'role_id' => $managerRole->id,
        ]);

        // Insert default regular user
        $regularUserRole = DB::table('roles')->where('name', 'user')->first();

        DB::table('users')->insert([
            'name' => 'Sophie Bernard',
            'email' => 'sophie.bernard@example.com',
            'password' => Hash::make('123456789'), // Default password
        ]);

        $user = DB::table('users')->where('email', 'sophie.bernard@example.com')->first();

        DB::table('role_user')->insert([
            'user_id' => $user->id,
            'role_id' => $regularUserRole->id,
        ]);
    }
}

