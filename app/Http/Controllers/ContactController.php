<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    function index(){
         $companies = [
    1 => ['name' => 'Company One', 'contacts' => 3],
    2 => ['name' => 'Company Two', 'contacts' => 5],

];

    $contacts = $this->get_contacts();

    return view('contacts.index',['contacts'=>$contacts, 'companies'=>$companies]);
    }

    function create(){
        return view('contacts.create');
    }

    function show($id){
        $contacts = $this->get_contacts();
    abort_if(!isset($contacts[$id]),404);
    $contact = $contacts[$id];

    return view('contacts.show')->with('contact',$contact);
    }

    protected function get_contacts(){
    return [
    1 => ['id'=>1, 'name' => 'Sam', 'phone' => '0764443211'],
    2 => ['id'=>2,'name' => 'James', 'phone' => '0769086655'],
    3 => ['id'=>3,'name' => 'Matt', 'phone' => '0770098890'],
    ];
}

    

    

}
