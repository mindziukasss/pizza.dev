@extends('main')

@section('content')

<div class ="row">
	<div class="col-md-10">
		@if(isset($error))
			<h4 style="color:red">{{ $error['message'] }}</h4>
		@endif
		<div class="form">
			{!! Form::open(['url' => $route]) !!}
				{{Form::select('clients', $clients, $pizza['clients'])}}

				<h1>Edit order</h1>
				{{ Form::label('name', 'Sugalvok pavadinima picaipizpi') }}
				{{ Form::text('name',$pizza['name']) }}

			<div>Pasirink pada{{Form::select('pizzaPad', $pizzaPad, $pizza['pizzapad'])}}</div>
			<div>Pasirink suri{{Form::select('cheese', $cheese, $pizza['cheese'])}}</div>
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

		{{ Form::submit('Save order', ['class'=>'btn btn-primary']) }}

		{!! Form::close() !!}
	</div>
</div>
@endsection
