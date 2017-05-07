@extends('main')

@section('content')
    
	
<div class ="row">
	<div class="col-md-10">
		<table class="table table-striped">

			<thead>
				<tr>
					<th>Picos pavadinimas</th>
					<th>Padas</th>
					<th>Suris</th>
					<th>Ingridientai</th>
					<th>Kaloriju skc.</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<td>{{ $pizza['name'] }}</td>
				<td>{{ $pizza['pizzapad']['name'] }}</td>
				<td>{{ $pizza['cheese']['name'] }}</td>
				<td><ul>
					@foreach($pizza['ingredients'] as $ingredient)
						<li>{{ $ingredient['names'] }}</li>
					@endforeach
					</ul></td>
				<td>{{ $pizza['calories'] }} kal.</td>

                <td><a href="{{ $pizza['id']}}/edit" class="btn btn-primary">Edit</a></td>
                <td>
					{!! Form::open(['route' => ['pizza.destroy', $pizza->id], 'method' => 'DELETE']) !!}
					{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tbody>
		</table>
	</div>
</div>

@endsection