<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->from($this->data['email'])
                    ->to('NapoluonJR@gmail.com')
                    ->subject('Nouveau message de contact')
                    ->markdown('emails.contact')
                    ->with([
                        'contactMessage' => (object) $this->data, // pour correspondre à ton Blade
                    ]);
    }
}
