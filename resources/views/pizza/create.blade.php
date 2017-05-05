@if(isset($error))
    <h4 style="color:red">{{ $error['message'] }}</h4>
@endif

{!! Form::open(['route' => 'pizza.store']) !!}
<div>

    {{Form::select('clients', $clients)}}

    <h1>Uzsakymas </h1>
    <h2>Sugalvok picos pavadinima:</h2>
    {{ Form::label('name', 'Sugalvok pavadinima picaipizpi') }}
    {{ Form::text('name') }}

    {{Form::select('pizzaPad', $pizzaPad)}}
    {{Form::select('cheese', $cheese)}}
<h3>Galima rinktis tik tris ingridientus</h3>
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
