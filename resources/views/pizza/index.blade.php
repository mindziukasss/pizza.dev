@foreach($pizzas as $pizza)
    @foreach( $pizza['clients'] as $client )
        <div><h2>Kliento duomenys</h2></div>
        <div> {{ $client['name'] }}</div>
        <div> {{ $client['phone_nr'] }}</div>
        <div> {{ $client['address'] }}</div>
    @endforeach
    <div><h3>Uzsakymas</h3></div>
   Picos pavadinimas: {{ $pizza['name'] }}
    <div>Padas:{{ $pizza['pizzapad']['name'] }}</div>
    <div>Pasirinktas suris:{{ $pizza['cheese']['name'] }}</div>
    @foreach($pizza['ingredients'] as $ingredient)
        <div>Pasirnkti ingriedientai:</div>
        <div> {{ $ingredient['names'] }}</div>
    @endforeach
@endforeach