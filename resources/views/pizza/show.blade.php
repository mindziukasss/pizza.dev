Picos pavadinimas: {{ $pizza['name'] }}
<div>Padas:{{ $pizza['pizzapad']['name'] }}</div>
<div>Pasirinktas suris:{{ $pizza['cheese']['name'] }}</div>
<div>Pasirnkti ingriedientai:</div>
@foreach($pizza['ingredients'] as $ingredient)
    <div> {{ $ingredient['names'] }}</div>
@endforeach
<div>{{ $pizza['calories'] }} kal.</div>

<a href="{{ $pizza['id']}}/edit">Edit order!</a>