<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\PermissionMiddleware;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['guest']], function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login.get');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.get');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
});

Route::group(['middleware' => ['auth']], function() {
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Manage Users
    Route::group(['middleware' => ['permission:view_users']], function() {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
    });

    Route::group(['middleware' => ['permission:manage_users']], function() {
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
    });
    
    Route::group(['middleware' => ['permission:view_users']], function() {
        Route::get('/users/archived', [UserController::class, 'archivedUsers'])->name('users.archived');
    });

    Route::group(['middleware' => ['permission:manage_users']], function() {
        Route::post('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
        Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    });

    Route::group(['middleware' => ['permission:view_users']], function() {
        Route::get('/users/{id}', [UserController::class, 'show'])->name('users.details');
    });

    Route::group(['middleware' => ['permission:manage_users']], function() {
        Route::delete('/users/{id}', [UserController::class, 'softDelete'])->name('users.softDelete');
        Route::delete('/users/{id}/force-delete', [UserController::class, 'forceDelete'])->name('users.forceDelete');
    });

    // Manage Permissions
    Route::group(['middleware' => ['permission:manage_roles_permissions']], function() {
        Route::get('/role_permission', [RolePermissionController::class, 'index'])->name('role_permission.index');
        Route::put('/role_permission/{role}', [RolePermissionController::class, 'update'])->name('role_permission.update');
    });

    // Manage Contacts
    Route::group(['middleware' => ['permission:view_contacts']], function() {
         Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    });
    
    Route::group(['middleware' => ['permission:create_contact']], function() {
        Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
        Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
    });

    Route::group(['middleware' => ['permission:view_contacts']], function() {
        Route::get('/contacts/archived', [ContactController::class, 'archivedContacts'])->name('contacts.archived');
        Route::post('/contacts/{id}/restore', [ContactController::class, 'restore'])->name('contacts.restore');
    });

    Route::group(['middleware' => ['permission:edit_contact']], function() {
        Route::get('/contacts/edit/{id}', [ContactController::class, 'edit'])->name('contacts.edit');
        Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');
    });
    
    Route::group(['middleware' => ['permission:view_contacts']], function() {
        Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.details');
        Route::get('/contacts/{id}/interactions', [ContactController::class, 'interactions'])->name('contacts.interactions');
    });

    Route::group(['middleware' => ['permission:delete_contact']], function() {
        Route::delete('/contacts/{id}', [ContactController::class, 'softDelete'])->name('contacts.softDelete');
        Route::delete('/contacts/{id}/force-delete', [ContactController::class, 'forceDelete'])->name('contacts.forceDelete');
    });

    // Manage Opportunities
    Route::group(['middleware' => ['permission:view_opportunities']], function() {
        Route::get('/opportunities', [OpportunityController::class, 'index'])->name('opportunities.index');
    });

    Route::group(['middleware' => ['permission:create_opportunity']], function() {
        Route::get('/opportunities/create', [OpportunityController::class, 'create'])->name('opportunities.create');
        Route::post('/opportunities', [OpportunityController::class, 'store'])->name('opportunities.store');
    });

    Route::group(['middleware' => ['permission:view_opportunities']], function() {
        Route::get('/opportunities/archived', [OpportunityController::class, 'archivedOpportunities'])->name('opportunities.archived');
        Route::post('/opportunities/{id}/restore', [OpportunityController::class, 'restore'])->name('opportunities.restore');
    });

    Route::group(['middleware' => ['permission:edit_opportunity']], function() {
        Route::get('/opportunities/edit/{id}', [OpportunityController::class, 'edit'])->name('opportunities.edit');
        Route::put('/opportunities/{id}', [OpportunityController::class, 'update'])->name('opportunities.update');
    });

    Route::group(['middleware' => ['permission:view_opportunities']], function() {
        Route::get('/opportunities/{id}', [OpportunityController::class, 'show'])->name('opportunities.details');
    });

    Route::group(['middleware' => ['permission:delete_opportunity']], function() {
        Route::delete('/opportunities/{id}', [OpportunityController::class, 'softDelete'])->name('opportunities.softDelete');
        Route::delete('/opportunities/{id}/force-delete', [OpportunityController::class, 'forceDelete'])->name('opportunities.forceDelete');
    });

    // Manage Tasks
    Route::group(['middleware' => ['permission:view_tasks']], function() {
        Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    });

    Route::group(['middleware' => ['permission:create_task']], function() {
        Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
        Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    });
    
    Route::group(['middleware' => ['permission:view_tasks']], function() {
        Route::get('/tasks/archived', [TaskController::class, 'archivedTasks'])->name('tasks.archived');
        Route::post('/tasks/{id}/restore', [TaskController::class, 'restore'])->name('tasks.restore');
    });

    Route::group(['middleware' => ['permission:edit_task']], function() {
        Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
        Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
    });

    Route::group(['middleware' => ['permission:view_tasks']], function() {
        Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.details');
    });

    Route::group(['middleware' => ['permission:delete_task']], function() {
        Route::delete('/tasks/{id}', [TaskController::class, 'softDelete'])->name('tasks.softDelete');
        Route::delete('/tasks/{id}/force-delete', [TaskController::class, 'forceDelete'])->name('tasks.forceDelete');
    });

    // Manage Interactions
    Route::group(['middleware', ['permission:view_interactions']], function() {
        Route::get('/interactions', [InteractionController::class, 'index'])->name('interactions.index');
    });

    Route::group(['middleware' => ['permission:create_interaction']], function() {
        Route::get('/interactions/create', [InteractionController::class, 'create'])->name('interactions.create');
        Route::post('/interactions', [InteractionController::class, 'store'])->name('interactions.store');
    });
    
    Route::group(['middleware', ['permission:view_interactions']], function() {
        Route::get('/interactions/archived', [InteractionController::class, 'archivedInteractions'])->name('interactions.archived');
        Route::post('/interactions/{id}/restore', [InteractionController::class, 'restore'])->name('interactions.restore');
    });

    Route::group(['middleware' => ['permission:edit_interaction']], function() {
        Route::get('/interactions/edit/{id}', [InteractionController::class, 'edit'])->name('interactions.edit');
        Route::put('/interactions/{id}', [InteractionController::class, 'update'])->name('interactions.update');
    });
    
    Route::group(['middleware', ['permission:view_interactions']], function() {
        Route::get('/interactions/{id}', [InteractionController::class, 'show'])->name('interactions.details');
    });

    Route::group(['middleware' => ['permission:delete_interaction']], function() {
        Route::delete('/interactions/{id}', [InteractionController::class, 'softDelete'])->name('interactions.softDelete');
        Route::delete('/interactions/{id}/force-delete', [InteractionController::class, 'forceDelete'])->name('interactions.forceDelete');
    });
});