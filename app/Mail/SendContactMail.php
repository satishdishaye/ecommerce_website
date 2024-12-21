<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $message;
    public $email;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $email, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        // Set the subject to a string that makes sense (you can customize this)
        return new Envelope(
            subject: 'Contact Message from ' . $this->name, // This ensures the subject is a string
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // Use the 'mail.send-contact' view file
        return new Content(
            view: 'mail.send-contact',  // This points to resources/views/emails/send-contact.blade.php
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
