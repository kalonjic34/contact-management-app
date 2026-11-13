<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactNoteController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::get('/',WelcomeController::class);


Route::get('/contact',[ContactController::class,'index'])->name('contacts.index');

Route::get('/contacts',[ContactController::class,'create'])->name('contacts.create');

Route::get('/contacts/{id}',[ContactController::class,'show'])->name('contacts.show');

Route::resource('companies',CompanyController::class);

Route::resources([
    '/tags'=>TagController::class,
    '/tasks'=>TagController::class
]);

// Route::resource('/activities',ActivityController::class)->names([
//     'index'=>'activities.all',
//     'show'=>'activities.view',
// ]);

Route::resource('/activities',ActivityController::class)->parameters([
    'activities'=>'active',
]);

Route::resource('/contacts.notes',ContactNoteController::class)->shallow();
