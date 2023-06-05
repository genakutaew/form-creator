@component('mail::message')
    Hello {{$email}} <br><br>
    @foreach($params as $key => $param)
        {{ $key . ': ' . $param }}<br>
    @endforeach
@endcomponent
