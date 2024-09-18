<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([
            [
                'name' => 'Luc Durand',
                'email' => 'luc.durand@example.com',
                'phone' => '06 12 34 56 78',
                'address' => '10 rue de Paris, 75001 Paris',
                'company' => 'TechCorp'
            ],
            [
                'name' => 'Elise Moreau',
                'email' => 'elise.moreau@example.com',
                'phone' => '06 87 65 43 21',
                'address' => '20 avenue de la République, 75011 Paris',
                'company' => 'Innovatech'
            ],
            [
                'name' => 'Paul Lefevre',
                'email' => 'paul.lefevre@example.com',
                'phone' => '07 23 45 67 89',
                'address' => '15 boulevard Saint-Germain, 75005 Paris',
                'company' => 'WebSolutions'
            ],
        ]);
    }
}
