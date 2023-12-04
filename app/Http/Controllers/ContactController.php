<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('welcome', ['contacts' => $contacts]);
    }

    public function create()
    {
        return view('contacts.new');
    }

    public function contacts()
    {
        $busca = request('search');

        return view('contacts', ['busca' => $busca]);
    }
}
