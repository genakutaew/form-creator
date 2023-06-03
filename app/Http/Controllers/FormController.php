<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class FormController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(int $id): View
    {
        $form = Form::where(['id' => $id])->firstOrFail();
        return view('show', ['form' => $form]);
    }

    public function execute(int $id)
    {
        //todo handler
    }

    public function create(): View
    {
        //todo create
        return view('edit');
    }

    public function edit(): View
    {
        //todo edit
        return view('edit');
    }
}
