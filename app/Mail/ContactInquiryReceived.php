<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactInquiryReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public Contact $contact,
        public bool $isCustomerReceipt = false
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = $this->isCustomerReceipt
            ? 'We have received your message - VXPS Australia'
            : 'New Contact Inquiry: ' . ($this->contact->subject ?: 'General Inquiry') . ' from ' . $this->contact->name;

        return new Envelope(
            subject: $subject,
            replyTo: $this->isCustomerReceipt
                ? [new Address(config('mail.from.address', 'support@vxps.com.au'), config('mail.from.name', 'VXPS Australia'))]
                : [new Address($this->contact->email, $this->contact->name)]
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-inquiry',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

