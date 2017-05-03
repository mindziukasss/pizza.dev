

{!! Form::open(['url' => route('pizza.create')]) !!}
    {{ Form::label('name', 'Names') }}
    {{ Form::text('name') }}
    {{ Form::label('phone_nr', 'Phone number') }}
    {{ Form::text('phone_nr') }}
    {{ Form::label('address', 'Address') }}
    {{Form::text('address') }}

    {{Form::select('pizzaPad', $pizzaPad)}}
    {{Form::select('cheese', $cheese)}}

@foreach($ingredients as $key => $ingredient)
    <div>{{ Form::checkbox('ingredients[]', $key)}}
        {{$ingredient}}</div>
@endforeach


{{ Form::submit('Ok') }}

{!! Form::close() !!}

