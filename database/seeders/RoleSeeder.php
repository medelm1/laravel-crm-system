<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'administrator', 'label' => 'Administrateur'],
            ['name' => 'manager', 'label' => 'Gestionnaire'],
            ['name' => 'user', 'label' => 'Utilisateur'],
        ]);
    }
}
