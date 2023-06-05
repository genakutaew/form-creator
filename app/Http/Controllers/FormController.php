<?php

namespace App\Http\Controllers;

use App\Handler\FormHandler;
use App\Http\Requests\FormRequest;
use App\Http\Requests\SendFormRequest;
use App\Models\Form;
use App\Service\FormService;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;

class FormController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index_view(int $id): View
    {
        $form = Form::where(['id' => $id])->firstOrFail();
        return view('show', ['form' => $form]);
    }

    public function index(int $id, SendFormRequest $request, FormHandler $formHandler): RedirectResponse
    {
        return $formHandler->handle($request, $id);
    }

    public function create_view(): View
    {
        return view('edit', ['form' => null]);
    }

    public function create(FormRequest $request, FormService $formService): RedirectResponse
    {
        return $formService->create($request);
    }

    public function edit_view(int $id): View
    {
        $form = Form::where(['id' => $id])->with(['fields', 'handler'])->firstOrFail();
        return view('edit', ['form' => $form]);
    }

    public function edit(int $id, FormRequest $request, FormService $formService): RedirectResponse
    {
        return $formService->edit($id, $request);
    }

    public function remove(int $id): RedirectResponse
    {
        $form = Form::where(['id' => $id])->firstOrFail();
        $form->delete();
        return redirect('/')->with('success', 'Form removed');
    }
}
