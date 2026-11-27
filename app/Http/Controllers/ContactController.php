<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ContactController extends Controller
{

    // protected $company;

    public function __construct(protected CompanyRepository $company)
    {
        $this->company = $company;
    }

    public function index(CompanyRepository $company, Request $request){

    $companies = $company->pluck();

    // $contacts = Contact::orderBy('company_id')->orderBy('id')->paginate(10);

        $contactsCollection = Contact::query()
            ->filterByCompany('company_id')
            ->allowedSorts(['first_name', 'last_name', 'email'], 'first_name')
            ->allowedSearch('first_name', 'last_name', 'email')
            ->allowedTrash()
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

    public function create(){

        // dd(request()->fullUrl());
        $companies = $this->company->pluck();
        $contact = new Contact();

        return view('contacts.create', compact('companies', 'contact'));
    }

    public function show(Contact $contact){

    
    return view('contacts.show')->with('contact',$contact);
    }
    public function edit(Request $request, int $id){

    $companies = $this->company->pluck();

    $contact = Contact::findOrFail($id);
    
    return view('contacts.edit',compact('companies', 'contact'));
    }


    public function update(ContactRequest $request, Contact $contact){

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('message','Contact updated successfully');
    }

    public function store(ContactRequest $request){
        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('message','Contact added successfully');
    }


    public function destroy(int $id){

    $contact = Contact::findOrFail($id);
    $contact->delete();
    $redirect = request()->query('redirect');
    return ($redirect? redirect()->route($redirect): back())
    ->with('message','Contact deleted successfully')
    ->with('undoRoute',$this->get_undo_route('contacts.restore',$contact));
    
    }

    public function get_undo_route($name, $resource){
        return request()->missing('undo')? route($name,[$resource->id,'undo'=>true]):null;
    }

    public function restore(int $id){

    $contact = Contact::onlyTrashed()->findOrFail($id);
    $contact->restore();

    return back()
    ->with('message','Contact has restored successfully')
    ->with('undoRoute',$this->get_undo_route('contacts.destroy',$contact));
    
    }
    public function forceDelete(Contact $contact){

    $contact->forceDelete();

    return back()
    ->with('message','Contact has been removed permenent'); 
    
    }
}
