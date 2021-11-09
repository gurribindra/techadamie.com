<?php

namespace App\Http\Controllers;

use App\User;
use App\Menu;
use App\Enquiries;
use App\Contact;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ContactUsController extends Controller
{
    public function index()
    {
        $breadcrumb = "Contact Us";

        $id='1';

        $contacts = Contact::where('id',$id)->first();

        $menus = Menu::where('parent_id','0')->orderBy('id','asc')->get();

        return view('contact', compact('breadcrumb','menus','contacts'));
    }

    public function store(Request $request)
    {
        $sub1 = $request->input('gd1_sub');
        $sub2 = $request->input('gd2_sub');
        $sub3 = $request->input('gd3_sub');
        $sub4 = $request->input('gd4_sub');
        $gd1_sub = (empty($sub1)) ? ' ' :  implode(",",  $sub1);
        $gd2_sub = (empty($sub2)) ? ' ' :  implode(",",  $sub2);
        $gd3_sub = (empty($sub3)) ? ' ' :  implode(",",  $sub3);
        $gd4_sub = (empty($sub4)) ? ' ' :  implode(",",  $sub4);
        
        $contact = array(
        'first_name' => $request->input('first_name'),
        'last_name'  => $request->input('last_name'),
        'phone_number' => $request->input('phone_number'),
        'email' => $request->input('email'),
        'gd1_grade' => $request->input('gd1_grade'),
        'gd1_sub' =>  $gd1_sub,
        'gd2_grade' => $request->input('gd2_grade'),
        'gd2_sub' => $gd2_sub,
        'gd3_grade' => $request->input('gd3_grade'),
        'gd3_sub' => $gd3_sub,
        'gd4_grade' => $request->input('gd4_grade'),
        'gd4_sub' => $gd4_sub,
        'time_zone' => $request->input('time_zone'),
        'declare_term' => $request->input('declare_term'),
        'type' => $request->input('type'),
        );

        Enquiries::create($contact);

        Mail::send('enquiries.mail', $contact, function($message) {
            $message->to('formenquiry@infrasols.com', 'Techadamie')->subject
               ('New Contact - Techadamie');
            $message->from('formenquiry@infrasols.com','Techadamie'); 
         });

        return redirect()->route('home');
    }

}
