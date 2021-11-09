<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    use MediaUploadingTrait;
    
    public function index()
    {
        $id='1';

        $contact = Contact::where('id',$id)->first();

        return view('admin.contact.index', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $contact->update($request->all());

        return redirect()->route('admin.contact.index');
    }
    
}
