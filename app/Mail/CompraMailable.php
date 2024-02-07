<?php

namespace App\Mail;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CompraMailable extends Mailable
{
    use Queueable, SerializesModels;
    protected $variableParaVista;
    /**
     * Create a new message instance.
     */
    public function __construct($variableParaVista)
    {
        $this->variableParaVista = $variableParaVista;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('zoologico@noreplay.com', 'Zoo Central Park'),
            subject: 'Compra de entradas',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.entradas',
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

    public function build()
    {
        return $this->view('emails.entradas')
                    ->with('content', $this->variableParaVista);
    }
}
