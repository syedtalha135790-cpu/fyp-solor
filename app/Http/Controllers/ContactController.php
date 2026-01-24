<?php

namespace App\Http\Controllers;

use App\Models\contactform;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        return view('frontend.contact');
    }
    public function submit(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'phone'   => 'nullable|string|max:20',
        ]);

        contactform::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'phone'   => $request->phone,
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully');
    }
}
