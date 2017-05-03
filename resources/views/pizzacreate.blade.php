

{!! Form::open(['url' => route('pizza.create')]) !!}

<div>

    {{Form::select('clients', $clients)}}

    <h1>Uzsakymas </h1>
    <h2>Sugalvok picos pavadinima:</h2>
    {{ Form::label('name', 'Pizza Name') }}
    {{ Form::text('name') }}

    {{Form::select('pizzaPad', $pizzaPad)}}
    {{Form::select('cheese', $cheese)}}

@foreach($ingredients as $key => $ingredient)
    <div>{{ Form::checkbox('ingredients[]', $key)}}
        {{$ingredient}}</div>
@endforeach

</div>

{{ Form::submit('Ok') }}

{!! Form::close() !!}

@if(isset($name))

    <div><h1>Picos pavadinimas: {{ $name }} </h1></div>

@endif