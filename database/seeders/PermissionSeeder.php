<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        DB::table('permissions')->insert([
            // User Management
            ['name' => 'manage_users', 'label' => 'Gérer les utilisateurs'],
            ['name' => 'view_users', 'label' => 'Visualiser les utilisateurs'],
            ['name' => 'login_user', 'label' => 'Authentifier un utilisateur'],
            ['name' => 'manage_roles_permissions', 'label' => 'Gérer les rôles et permissions'],
            ['name' => 'update_profile', 'label' => 'Mettre à jour le profil utilisateur'],

            // Contact Management
            ['name' => 'create_contact', 'label' => 'Ajouter un contact'],
            ['name' => 'edit_contact', 'label' => 'Modifier un contact'],
            ['name' => 'delete_contact', 'label' => 'Supprimer un contact'],
            ['name' => 'view_contacts', 'label' => 'Visualiser les contacts'],

            // Opportunity Management
            ['name' => 'create_opportunity', 'label' => 'Créer une opportunité'],
            ['name' => 'edit_opportunity', 'label' => 'Mettre à jour une opportunité'],
            ['name' => 'delete_opportunity', 'label' => 'Supprimer une opportunité'],
            ['name' => 'view_opportunities', 'label' => 'Visualiser les opportunités'],
            ['name' => 'analyze_opportunities', 'label' => 'Analyser les opportunités'],

            // Task Management
            ['name' => 'create_task', 'label' => 'Créer une tâche'],
            ['name' => 'edit_task', 'label' => 'Mettre à jour une tâche'],
            ['name' => 'delete_task', 'label' => 'Supprimer une tâche'],
            ['name' => 'view_tasks', 'label' => 'Visualiser les tâches'],

            // Interaction Management
            ['name' => 'create_interaction', 'label' => 'Enregistrer une interaction'],
            ['name' => 'edit_interaction', 'label' => 'Mettre à jour une interaction'],
            ['name' => 'delete_interaction', 'label' => 'Supprimer une interaction'],
            ['name' => 'view_interactions', 'label' => 'Visualiser les interactions'],
        ]);
    }
}
