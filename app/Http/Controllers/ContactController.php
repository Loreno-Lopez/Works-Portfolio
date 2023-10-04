<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function form()
    {
        $title = 'Contacts';

        $text = 'Work with us as a Revisor or Website Administrator';

        return view('contact', compact('title', 'text'));
    }

    public function save(Request $request)
    {
        if (empty($request->name)) {
            return redirect()->back()
            ->with(['danger' => 'It is necessary to fill in all the fields of the form.']);
        }
        if (empty($request->email)) {
            return redirect()->back()
            ->with(['danger' => 'It is necessary to fill in all the fields of the form.']);
        }
        if (empty($request->message)) {
            return redirect()->back()
            ->with(['danger' => 'It is necessary to fill in all the fields of the form.']);
        }


        $email = new ContactMail($request->name, $request->email, $request->message);

        Mail::to('admin@exemple.com')->send($email);

        return redirect()->back()
        ->with(['success' => 'We have successfully received your data.']);
    }
}
