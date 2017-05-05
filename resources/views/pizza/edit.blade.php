@if(isset($error))
    <h4 style="color:red">{{ $error['message'] }}</h4>
@endif

{!! Form::open(['url' => $route]) !!}



<div>

    {{Form::select('clients', $clients, $pizza['clients'])}}

    <h1>Uzsakymas </h1>
    <h2>Sugalvok picos pavadinima:</h2>
    {{ Form::label('name', 'Sugalvok pavadinima picaipizpi') }}
    {{ Form::text('name',$pizza['name']) }}

    {{Form::select('pizzaPad', $pizzaPad, $pizza['pizzapad'])}}
    {{Form::select('cheese', $cheese, $pizza['cheese'])}}
    <h3>Galima rinktis tik tris ingridientus</h3>
    @foreach($ingredients as $key => $ingredient)
        @if(in_array($key,$pizzaIngredients) )
            <div>
                {{ Form::checkbox('ingredients[]',$key,true)}}
                 {{ Form::label($ingredient, $ingredient) }}
            </div>
            @else
            <div>
                {{ Form::checkbox('ingredients[]', $key)}}{{$ingredient}}
            </div>

        @endif
    @endforeach

</div>

{{ Form::submit('Ok') }}

{!! Form::close() !!}
