<?php

namespace App\Handler;

use App\Mail\FormMail;
use App\Models\FormHandler;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailHandler
{
    public function handle(Request $request, FormHandler $formHandler): RedirectResponse
    {
        $emails = explode(',', $formHandler->payload);

        foreach ($emails as $email) {
            Mail::to($email)->send(new FormMail($email, $request->all()));
        }

        return redirect('/')->with('success', 'Email successfully sent');
    }
}
