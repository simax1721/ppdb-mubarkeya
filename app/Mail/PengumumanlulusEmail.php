<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PengumumanlulusEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $siswa; // Misalnya kita ingin mengirimkan data siswa

    /**
     * Create a new message instance.
     */
    public function __construct($siswa)
    {
        $this->siswa = $siswa;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pengumuman Kelulusan',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.pengumumanlulus', // Ganti dengan view yang sesuai
            with: [
                'siswa' => $this->siswa,
            ]
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
