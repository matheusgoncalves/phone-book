<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $search = request('search');

        if($search) {
            $contacts = Contact::where([
                ['name', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $contacts = Contact::all();
        }

        return view('contacts', ['contacts' => $contacts, 'search' => $search]);
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
        $contact->address = $request->address;

        $contact->save();

        return redirect('/');
    }

    public function show($id)
    {
        $contacts = Contact::all();

        $contact = Contact::findOrFail($id);

        return view('contacts.show', ['contact' => $contact, 'contacts' => $contacts]);
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();

        return redirect('/')->with('msg', 'Contato excluído com sucesso!');
    }

    public function edit($id)
    {
        $contacts = Contact::all();

        $contact = Contact::findOrFail($id);

        return view('contacts.edit', ['contact' => $contact, 'contacts' => $contacts]);
    }

    public function update(Request $request, $id)
{
    $contact = Contact::findOrFail($id);

    $contact->name = $request->name;
    $contact->cellnumber = $request->cellnumber;
    $contact->email = $request->email;
    $contact->note = $request->note;
    $contact->address = $request->address;

    $contact->save();

    return redirect('/')->with('msg', 'Contato editado com sucesso!');
}

}
