@extends('main')

@section('content')

<div class ="row">
	<div class="col-md-10">
		@if(isset($error))
			<h4 style="color:red">{{ $error['message'] }}</h4>
		@endif
		<div class="form">
			{!! Form::open(['route' => 'pizza.store']) !!}
			{{Form::select('clients', $clients)}}

			<h1>Order</h1>
			{{ Form::label('name', 'Sugalvok pavadinima savo pizai') }}
			{{ Form::text('name') }}

			<div>Pasirink pada{{Form::select('pizzaPad', $pizzaPad)}}</div>
			<div>Pasirink suri{{Form::select('cheese', $cheese)}}</div>
			<h3>Galima rinktis tik tris ingridientus</h3>
				@foreach($ingredients as $key => $ingredient)
				<div>{{ Form::checkbox('ingredients[]', $key)}}
					{{$ingredient}}</div>
				@endforeach



			{{ Form::submit('Create order', ['class'=>'btn btn-primary']) }}

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
