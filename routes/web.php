<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    return view('welcome');
});


Route::get('/contact',[ContactController::class,'index'])->name('contacts.index');

Route::get('/contacts/create',[ContactController::class,'create'])->name('contacts.create');

Route::get('/contacts/{id}',[ContactController::class,'show'])->name('contacts.show');

Route::fallback(function(){
    return 'Sorry, the page does not exist';
});