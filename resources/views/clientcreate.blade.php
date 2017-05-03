{!! Form::open(['url' => route('client.create')]) !!}
<div>
    <h1>Kliento duomenys:</h1>
    {{ Form::label('name', 'Clients Names') }}
    {{ Form::text('name') }}
    {{ Form::label('phone_nr', 'Phone number') }}
    {{ Form::text('phone_nr') }}
    {{ Form::label('address', 'Address') }}
    {{Form::text('address') }}
</div>

{{ Form::submit('Ok') }}

{!! Form::close() !!}


@if(isset($name))

    <div><h1>  {{ $name }} {{ $phone_nr }}</h1></div>

@endif