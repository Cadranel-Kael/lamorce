<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class ContactController
{
    public function index()
    {
        return view('contacts.index', [
            'contacts' => Contact::all(),
        ]);
    }
}
