<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use DataTables;
class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
      $data = [
				'name' => $request->name,
				'email' => $request->email,
			];
			$contact = Contact::create($data);
			return response($contact);
    }

    public function show(Contact $contact)
    {
        //
    }

    public function edit(Contact $contact)
    {
        //
    }

    public function update(Request $request, Contact $contact)
    {
        //
    }

    public function destroy(Contact $contact)
    {
        //
    }

    public function apiContact()
    {
			$contact = Contact::orderBy('id','DESC');
			return Datatables::of($contact)
					->addColumn('action',function($contact){
							return '<a class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eyle-open"></i>Show</a> |'.
											' <a onclick="editForm('.$contact->id.')" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-edit"></i>Edit</a> |'.
											' <a onclick="deleteData('.$contact->id.')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i>Delete</a>';
					})
					->make(true);
    }
    
}

