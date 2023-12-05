<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('contacts', ['contacts' => $contacts]);
    }

    public function create()
    {
        $contacts = Contact::all();

        return view('contacts.new', ['contacts' => $contacts]);
    }

    public function contacts()
{
    $busca = request('search');

    $contacts = Contact::all();

    return view('contacts', ['busca' => $busca, 'contacts' => $contacts]);
}

    public function store(Request $request)
    {
        $contact = new Contact();

        $contact->name = $request->name;
        $contact->cellnumber = $request->cellnumber;
        $contact->email = $request->email;
        $contact->note = $request->note;

        $contact->save();

        return redirect('/');
    }

    public function show($id)
    {
        $contacts = Contact::all();

        $contact = Contact::findOrFail($id);

        return view('contacts.show', ['contact' => $contact, 'contacts' => $contacts]);
    }
}
