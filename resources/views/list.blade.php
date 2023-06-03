@extends('layouts.app')
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col text-end">
                    <a href="{{ url("/create") }}" class="btn btn-primary">Add new form</a>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($forms as $form)
                    <tr>
                        <th scope="row">{{ $form->id }}</th>
                        <td><a href="/show/1">{{ $form->name }}</a></td>
                        <td><a href="/edit/1">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
