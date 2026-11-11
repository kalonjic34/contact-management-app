<?php

use Illuminate\Support\Facades\Route;


function get_contacts(){
    return [
    1 => ['name' => 'Sam', 'phone' => '0764443211'],
    2 => ['name' => 'James', 'phone' => '0769086655'],
    3 => ['name' => 'Matt', 'phone' => '0770098890'],
    ];
}

Route::get('/', function () {

    return view('welcome');
});


Route::get('/contact',function(){

    $contacts = get_contacts();

    return view('contacts.index',['contacts'=>$contacts]);
})->name('contacts.index');

Route::get('/contacts/create', function(){
    return view('contacts.create');
})->name('contacts.create');

Route::get('/contacts/{id}',function($id){

    $contacts = get_contacts();
    abort_if(!isset($contacts[$id]),404);
    $contact = $contacts[$id];

    return view('contacts.show')->with('contact',$contact);
})->name('contacts.show');

Route::fallback(function(){
    return 'Sorry, the page does not exist';
});