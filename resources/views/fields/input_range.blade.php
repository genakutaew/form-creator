<label for="field{{ $field->id }}" class="form-label">{{ $field->label }} ({{ $field->default_value ?? (($field->params['max'] + $field->params['min']) / 2) }})</label>
<input
    type="range"
    class="form-control"
    id="field{{ $field->id }}"
    name="{{ $field->name }}"
    value="{{ $field->default_value }}"
    min="{{$field->params['min']}}"
    max="{{$field->params['max']}}"
    step="{{$field->params['step']}}"
    oninput="this.previousElementSibling.innerHTML = '{{ $field->name }}' + ' (' + this.value + ')'">
