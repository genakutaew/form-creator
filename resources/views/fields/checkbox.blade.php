<div class="form-check">
    <input
        type="checkbox"
        class="form-check-input"
        id="field{{ $field->id }}"
        name="{{ $field->name }}"
        {{ $field->default_value ? 'checked' : '' }}
        {{ $field->required ? 'required' : '' }}>
    <label class="form-check-label" for="field{{ $field->id }}">{{ $field->label }}</label>
</div>
