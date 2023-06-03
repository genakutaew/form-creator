<label for="field{{ $field->id }}" class="form-label">{{ $field->label }}</label>
<select
    class="form-select"
    id="field{{ $field->id }}"
    {{ $field->required ? 'required' : '' }}>
    @foreach($field->params['options'] as $option)
        <option
            value="{{ $option['value'] }}"
            {{ $field->default_value == $option['value'] ? 'selected' : '' }}
        >{{ $option['text'] }}</option>
    @endforeach
</select>
