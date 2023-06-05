<?php

namespace App\Handler;

use App\Mail\FormMail;
use App\Models\FormHandler;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class RedirectHandler
{
    public function handle(Request $request, FormHandler $formHandler): RedirectResponse
    {
        $response = Http::post($formHandler->payload, array_diff_key($request->all(), ['_token' => 0]));

        return redirect('/')->with($response->status() ? 'success' : 'failed', $response->body());
    }
}
