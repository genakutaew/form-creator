<label for="field{{ $field->id }}" class="form-label">{{ $field->label }}</label>
<input
    type="time"
    class="form-control"
    id="field{{ $field->id }}"
    name="{{ $field->name }}"
    value="{{ $field->default_value }}"
    {{ $field->required ? 'required' : '' }}>
