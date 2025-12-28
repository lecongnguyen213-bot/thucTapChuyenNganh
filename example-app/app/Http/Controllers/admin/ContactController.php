<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contacts.contact', compact('contacts'));
    }

    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'nullable|string|max:191',
            'message' => 'required|string',
        ]);

        $contact->update($data);

        return redirect()->route('admin.contacts.index')->with('success', 'Contact updated successfully.');
    }
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Contact deleted successfully.');
    }

}
