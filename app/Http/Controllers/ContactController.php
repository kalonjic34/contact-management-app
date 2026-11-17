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


            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->query('search');

                return $query->where(function ($query) use ($search) {
                    $query->where('first_name', 'LIKE', "%{$search}%")
                        ->orWhere('last_name', 'LIKE', "%{$search}%")
                        ->orWhere('email', 'LIKE', "%{$search}%");
                });
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
        $contact = new Contact();

        return view('contacts.create', compact('companies', 'contact'));
    }

    function show(Request $request, $id){

    $contact = Contact::findOrFail($id);
    
    return view('contacts.show')->with('contact',$contact);
    }
    function edit(Request $request, $id){

    $companies = $this->company->pluck();

    $contact = Contact::findOrFail($id);
    
    return view('contacts.edit',compact('companies', 'contact'));
    }

    function update(Request $request, $id){
            $contact = Contact::findOrFail($id);

        $request->validate([
            'first_name'=>'required|string|max:50',
            'last_name'=>'required|string|max:50',
            'email'=>'required|email',
            'phone'=>'nullable',
            'address'=>'nullable',
            'company_id'=>'required|exists:companies,id'
        ]);
        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('message','Contact updated successfully');
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

    function destroy($id){

    $contact = Contact::findOrFail($id);
    $contact->delete();

    return back()->with('message','Contact deleted successfully');

    
    }
}
