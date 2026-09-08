<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccountCreatedMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     */
    public $userEmail;
    public $userName;
    public $password;
    public function __construct($userName,$email,$password)//какие данные в письме
    {
        $this->userName = $userName;
        $this->password = $password;
        $this->userEmail = $email;
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Account Created Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content//путь к самому письму
    {
        return new Content(
            view: 'mail.account_created',
        );
    }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
