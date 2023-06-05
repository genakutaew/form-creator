@extends('layouts.app')
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="row g-3 needs-validation" method="post" id="form" data-form="{{ $form }}" novalidate>
                @csrf
                <div class="col-12">
                    <label for="field-name" class="form-label">Form name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="field-name"
                        name="form[name]"
                        placeholder="Form name"
                        value="{{ $form->name ?? '' }}"
                        required>
                </div>
                <div class="col-12">
                    <label for="field-submit-text" class="form-label">Submit text</label>
                    <input
                        type="text"
                        class="form-control"
                        id="field-submit-text"
                        name="form[submit_text]"
                        value="{{ $form->submit_text ?? '' }}"
                        placeholder="Submit text">
                </div>
                <div class="row g-3 mt-0" id="form_fields">
                </div>
            </form>
        </div>
    </div>
@endsection
