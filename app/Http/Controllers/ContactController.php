<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('welcome');
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
