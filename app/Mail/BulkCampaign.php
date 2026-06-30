<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BulkCampaign extends Mailable
{
    use Queueable, SerializesModels;

    public $recipientName;
    public $emailSubject;
    public $emailMessage;

    /**
     * Create a new message instance.
     */
    public function __construct($recipientName, $emailSubject, $emailMessage)
    {
        $this->recipientName = $recipientName;
        $this->emailSubject = $emailSubject;
        $this->emailMessage = $emailMessage;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->emailSubject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.bulk-campaign',
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
