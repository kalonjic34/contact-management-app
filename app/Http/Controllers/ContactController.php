<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    // protected $company;

    function __construct(protected CompanyRepository $company)
    {
        $this->company= $company;
    }

    function index(CompanyRepository $company, Request $request){

    $companies = $company->pluck();

    $contacts = Contact::orderBy('company_id')->orderBy('id')->paginate(10);

    return view('contacts.index',['contacts'=>$contacts, 'companies'=>$companies]);
    }

    function create(){
        return view('contacts.create');
    }

    function show(Request $request, $id){

    $contact = Contact::findOrFail($id);
    
    return view('contacts.show')->with('contact',$contact);
    }
}
