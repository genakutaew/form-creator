<label for="field{{ $field->id }}" class="form-label">{{ $field->label }} ({{ $field->default_value ?? (($field->params['max'] + $field->params['min']) / 2) }})</label>
<input
    type="range"
    class="form-control"
    id="field{{ $field->id }}"
    name="{{ $field->name }}"
    value="{{ $field->default_value }}"
    oninput="this.previousElementSibling.innerHTML = '{{ $field->label }}' + ' (' + this.value + ')'">
