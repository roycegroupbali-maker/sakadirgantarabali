<?php

namespace App\Mail;

use App\Models\Aspiration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewAspirationNotificationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public Aspiration $aspiration)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Laporan Aspirasi Baru — Tiket '.$this->aspiration->nomor_tiket,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.admin.new-aspiration',
        );
    }
}
