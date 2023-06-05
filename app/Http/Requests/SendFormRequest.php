<?php

namespace App\Http\Requests;

use App\Models\FormField;
use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

class SendFormRequest extends BaseFormRequest
{
    public function rules(): array
    {
        $id = $this->route('id');
        $formFields = FormField::where(['form_id' => $id])->get();
        $result = [];
        foreach ($formFields as $formField) {
            if ($formField->required) {
                $result[$formField->name] = 'required';
            }
        }
        return $result;
    }
}
