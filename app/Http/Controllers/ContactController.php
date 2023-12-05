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
        return view('contacts.new');
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

        $contact->save();

        return redirect('/');
    }


}
