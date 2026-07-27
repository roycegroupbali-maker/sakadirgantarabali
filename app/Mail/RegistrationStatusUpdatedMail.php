<?php

namespace App\Mail;

use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistrationStatusUpdatedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public Registration $registration,
        public string $statusSebelumnya,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Update Status Pendaftaran — '.$this->registration->kode_pendaftaran.' — Saka Dirgantara Bali',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.registration-status-updated',
        );
    }
}
