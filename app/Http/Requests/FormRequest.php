<?php

namespace App\Http\Requests;

use App\Models\FormField;
use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

class FormRequest extends BaseFormRequest
{
    public function rules(): array
    {
        $result = [
            'form.name' => 'required',
            'handler.type' => 'required',
            'handler.payload' => 'required',
        ];
        $fields = $this->all()['fields'] ?? null;
        if ($fields) {
            foreach ($fields as $field) {
                if ($field['required']) {
                    $result['form.field.*.' . $field['name']] = 'required';
                }
            }
        }
        return $result;
    }
}
