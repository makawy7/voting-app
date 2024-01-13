<?php

namespace App\Mail;

use App\Models\Idea;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Address;

class IdeaStatusUpdatedMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $idea;
    /**
     * Create a new message instance.
     */
    public function __construct(Idea $idea)
    {
        $this->idea = $idea;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('abdallah@gmail.com', 'Abdallah'),
            subject: 'Idea Status Updated Mailable',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.idea-statuts-updated',
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
