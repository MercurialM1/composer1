<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use App\Models\Contact;
use Illuminate\Support\Str;
use App\Models\User;
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
      return redirect()->route('contact')->with('success', 'Message sent successfully');
    }
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('admin.contactus.index');
    }
    public function createUser(string $id){
        $contact = Contact::findOrFail($id);
        if ($contact->user_id) { // проверка существует ли пользователь
          return redirect()->route('admin.contactus.index')->with('fail', 'Аккаунт уже создан ');
        }
        else {//создание пользователя
            $password = Str::random(10);
            $user = User::create([
                'name' => $contact->name,
                'email' => $contact->email,
                'password' => Hash::make($password),//какже это просто в ларе
            ]);
            $contact->user_id = $user->id;
            $contact->status = 'approved';
            $contact->save();

            Mail::raw("Логин: {$contact->email}, пароль: {$password}", function ($message) use ($contact) {//отправка письма
                $message->to($contact->email)->subject('Тема');
            });
            return redirect()->route('admin.contactus.index')->with('success', 'Аккаунт создан');
        }
    }
}
