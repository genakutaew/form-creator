<label for="field{{ $field->id }}" class="form-label">{{ $field->label }}</label>
<input
    type="number"
    class="form-control"
    id="field{{ $field->id }}"
    name="{{ $field->name }}"
    value="{{ $field->default_value }}"
    placeholder="{{ $field->params['placeholder'] }}"
    min="{{ $field->params['min'] }}"
    max="{{ $field->params['max'] }}"
    {{ $field->required ? 'required' : '' }}>
