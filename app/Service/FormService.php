<?php

namespace App\Service;

use App\Models\Form;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FormService
{
    public function create(Request $request): RedirectResponse
    {
        $params = $request->all();
        $form = Form::create($params['form']);
        if (isset($params['fields'])) {
            foreach ($params['fields'] as $field) {
                if (isset($field['params'])) {
                    $field['params'] = json_decode($field['params']);
                }
                $form->fields()->create($field);
            }
        }
        $form->handler()->create($params['handler']);
        $form->save();
        return redirect('/')->with('success', 'Form created');
    }

    public function edit(int $formId, Request $request): RedirectResponse
    {
        $params = $request->all();
        $form = Form::where(['id' => $formId])->firstOrFail();

        $this->updateFields($params, $form);
        $form->fill($params['form']);

        $form->handler->fill($params['handler'])->save();
        $form->save();
        return redirect('/')->with('success', 'Form edited');
    }

    private function updateFields($params, $form): void
    {
        $databaseIds = array_map(function ($field) {
            return (int)$field['id'];
        }, $form->fields->toArray());
        $requestIds = array_map(function ($field) {
            return (int)$field['id'];
        }, $params['fields'] ?? []);

        $addedFields = array_diff($requestIds, $databaseIds);
        $removeFields = array_diff($databaseIds, $requestIds);
        $editFields = array_intersect($requestIds, $databaseIds);

        foreach ($addedFields as $addedField) {
            $form->fields()->create($params['fields'][$addedField])->save();
        }

        foreach ($removeFields as $removeField) {
            $form->fields()->find($removeField)->delete();
        }

        foreach ($editFields as $editField) {
            if (isset($params['fields'][$editField]['params'])) {
                $params['fields'][$editField]['params'] = json_decode($params['fields'][$editField]['params']);
            }
            $form->fields()->find($editField)->fill($params['fields'][$editField])->save();
        }
    }
}
