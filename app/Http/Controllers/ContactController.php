<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ContactController extends Controller
{

    // protected $company;

    function __construct(protected CompanyRepository $company)
    {
        $this->company= $company;
    }

    function index(CompanyRepository $company, Request $request){

    $companies = $company->pluck();

    // $contacts = Contact::orderBy('company_id')->orderBy('id')->paginate(10);

        $contactsCollection = Contact::latest()
            ->when($request->filled('company_id'), function ($query) use ($request) {
                return $query->where('company_id', $request->query('company_id'));
            })
            ->get();

        $per_page = 10;
        $current_page = request()->query('page',1);
        $items = $contactsCollection->slice(($current_page* $per_page)- $per_page,$per_page);
        $total = $contactsCollection->count();
        $contacts = new LengthAwarePaginator($items,$total,$per_page,$current_page, [
            'path'=> request()->url(),
            'query'=> request()->query()
        ]);
    return view('contacts.index',['contacts'=>$contacts, 'companies'=>$companies]);
    }

    function create(){

        // dd(request()->fullUrl());
        $companies = $this->company->pluck();

        return view('contacts.create', compact('companies'));
    }

    function show(Request $request, $id){

    $contact = Contact::findOrFail($id);
    
    return view('contacts.show')->with('contact',$contact);
    }

    function store(Request $request){
        $request->validate([
            'first_name'=>'required|string|max:50',
            'last_name'=>'required|string|max:50',
            'email'=>'required|email',
            'phone'=>'nullable',
            'address'=>'nullable',
            'company_id'=>'required|exists:companies,id'
        ]);
        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('message','Contact added successfully');
    }
}
