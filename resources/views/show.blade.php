@extends('layouts.app')
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <h2>{{ $form->name }}</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="row g-3 needs-validation" method="post" novalidate>
                @csrf
                @foreach($form->fields as $field)
                    <div class="col-12">
                        @include('fields/' . $field->selector . ($field->selector_type ? ('_' . $field->selector_type) : ''), ['field' => $field])
                    </div>
                @endforeach
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">{{ $form->submit_text ?? 'Submit' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
