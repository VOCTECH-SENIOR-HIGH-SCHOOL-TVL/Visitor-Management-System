<?php

namespace App\Http\Controllers;

use App\Models\Contact; // Make sure to import the Contact model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index(Request $request)
{
    $perPage = $request->input('per_page', 10); // Default to 10 if not specified
    $contacts = Contact::paginate($perPage);
    return view('contacts.index', compact('contacts'));
}


    
    public function create()
    {
      
        return view('contacts.create');
    }

   
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'role' => 'required|string|max:255',
    ]);

 
    $contact = new Contact();
    $contact->name = $request->name;
    $contact->role = $request->role;

   
    $contact->save();

    
    return redirect()->route('contacts.index')->with('success', 'Contact created successfully!');
}
public function show($id)
{
    $contact = Contact::findOrFail($id);
    return view('contacts.show', compact('contact'));
}

public function edit($id)
{
    $contact = Contact::findOrFail($id);
    return view('contacts.edit', compact('contact'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'role' => 'required|string|max:255',
    ]);

    $contact = Contact::findOrFail($id);
    $contact->update($request->all());
    return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
}

public function destroy($id)
{
    $contact = Contact::findOrFail($id);
    $contact->delete();
    return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
}
}