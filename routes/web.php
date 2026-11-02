<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

function get_contacts(){
    return[

    1 => ['name' => 'Sam', 'phone' => '0765553344'],
    2 => ['name' => 'James', 'phone' => '0619905463'],
    3 => ['name' => 'Will', 'phone' => '0762439646'],
    ];
}

Route::get('/contacts', function(){
    $contacts = get_contacts();
    return view('contacts.index', compact('contacts'));
})->name('contacts.index');

Route::get('/contacts/create',function(){
    return view('contacts.create');
})->name('contacts.create');

Route::get('/contacts/{id}',function($id){
    $contacts = get_contacts();
    $contact = $contacts[$id];

    return view('contacts.show')->with('contact', $contact);
})->name('contacts.show');


Route::fallback(function(){
    return "<h1>Sorry, the page does not exist</h1>";
});