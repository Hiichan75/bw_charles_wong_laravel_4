<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReceived;
use App\Mail\ContactReply;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        $contact = Contact::create($request->all());

        // Send email notification to admins
        Mail::to('admin@ehb.be')->send(new ContactReceived($contact));

        return redirect()->back()->with('success', 'Your message has been sent!');
    }

    public function index()
    {
        $contacts = Contact::all();
        return view('contact.index', compact('contacts'));
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string|max:2000',
        ]);

        $contact = Contact::findOrFail($id);

        // Send reply email to the original sender
        Mail::to($contact->email)->send(new ContactReply($request->reply));

        return redirect()->back()->with('success', 'Reply sent successfully!');
    }
}
