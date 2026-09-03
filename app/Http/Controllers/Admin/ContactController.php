<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(): View
    {
    $contact = Contact::all();
    return view('admin.contact.index', compact('contact'));
        }
        public function create()
        {
            return view('pages.contact');
        }
   public function store(Request $request)
   {
       $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255',
           'subject' => 'required|string|max:255',
           'message' => 'required|string|max:2000',
           'phone' => 'required|string|max:15',
           'department' => 'required|string|max:255',
       ]);
       $contact = Contact::create([
           'name' => $request->name,
           'email' => $request->email,
           'subject' => $request->subject,
           'message' => $request->message,
           'phone' => $request->phone,
           'department' => $request->department,
       ]);
       redirect('pages.contact.index')->with('success', 'Message sent successfully');
    }
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('admin.contactus.index');
    }
}



