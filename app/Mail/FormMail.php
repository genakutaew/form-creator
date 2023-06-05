<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FormMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $email;
    public array $params;

    public function __construct(string $email, array $params)
    {
        $this->email = $email;
        $this->params = array_diff_key($params, ['_token' => 0]);
    }

    public function build(): self
    {
        return $this->markdown('emails.form');
    }
}
