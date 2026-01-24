<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuoteRequestMail;

class QuoteController extends Controller
{
    public function submitQuote(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'service_type' => 'required|string',
            'system_size' => 'nullable|string',
            'message' => 'nullable|string',
        ]);

        // Store in database if you have a model
        // QuoteRequest::create($validated);

        // Send email notification

        return back()->with('success', 'Thank you for your quote request! We will contact you within 24 hours.');
    }
}
