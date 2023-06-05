<?php

namespace App\Handler;

use App\Models\Form;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FormHandler
{
    const HANDLERS = [
        'email' => EmailHandler::class,
        'redirect' => RedirectHandler::class
    ];

    public function handle(Request $request, int $formId): RedirectResponse
    {
        $form = Form::where(['id' => $formId])->firstOrFail();
        $handler = self::HANDLERS[$form->handler->type];
        $handler = new $handler();
        return $handler->handle($request, $form->handler);
    }
}
