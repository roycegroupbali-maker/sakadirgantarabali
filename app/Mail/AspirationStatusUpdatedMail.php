<?php

namespace App\Mail;

use App\Models\Aspiration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AspirationStatusUpdatedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public Aspiration $aspiration,
        public string $statusSebelumnya,
        public ?string $catatan = null,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Update Status Laporan — Tiket '.$this->aspiration->nomor_tiket.' — Saka Dirgantara Bali',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.aspiration-status-updated',
        );
    }
}
