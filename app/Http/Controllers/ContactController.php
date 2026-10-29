<?php

namespace App\Http\Controllers;

use App\Mail\ContactInquiryReceived;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Store a new contact inquiry in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:3000',
        ]);

        $validated['status'] = 'unread';

        $contact = Contact::create($validated);

        // Send Email Notifications
        try {
            $adminEmail = config('mail.from.address', 'dking7763@gmail.com');

            // 1. Send inquiry notification to admin
            Mail::to($adminEmail)->send(new ContactInquiryReceived($contact, isCustomerReceipt: false));

            // 2. Send receipt confirmation copy to the customer
            Mail::to($contact->email)->send(new ContactInquiryReceived($contact, isCustomerReceipt: true));
        } catch (\Throwable $e) {
            // Keep customer experience smooth even if SMTP service is temporarily unavailable
            Log::warning('Contact inquiry email failed to send: ' . $e->getMessage(), [
                'contact_id' => $contact->id,
                'email' => $contact->email,
            ]);
        }

        return redirect()->route('contact')->with('success', 'Thank you! Your message has been sent successfully. Our support team will get in touch with you shortly.');
    }
}

