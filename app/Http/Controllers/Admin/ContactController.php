<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\contact;

class ContactController extends Controller
{
    public function index(): View
    {
    $contact = Contact::all();
    return view('admin.contact.index', compact('contact'));
        }
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:15',
                'email' => 'required|string|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
            ]);
        }
}

