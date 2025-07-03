<?php

namespace App\Mail;

use App\Models\MadeToMeasureRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RequestStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The made-to-measure request instance.
     *
     * @var \App\Models\MadeToMeasureRequest
     */
    public $madeToMeasureRequest;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\MadeToMeasureRequest  $madeToMeasureRequest
     * @return void
     */
    public function __construct(MadeToMeasureRequest $madeToMeasureRequest)
    {
        $this->madeToMeasureRequest = $madeToMeasureRequest;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Made-to-Measure Request Status has been Updated',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.requests.status-updated',
            with: [
                'request' => $this->madeToMeasureRequest,
            ],
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