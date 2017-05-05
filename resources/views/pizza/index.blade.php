@extends('main')

@section('content')



<table class="table table-striped">

    <thead>
        <tr>
            <th>Klientu kontaktai</th>
            <th>Picos pavadinimas</th>
            <th>Padas</th>
            <th>Suris</th>
            <th>Ingridientai</th>
            <th>Kaloriju suma</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pizzas as $pizza)
    <tr>
        @foreach( $pizza['clients'] as $client )
           <td><ul>
                    {{ $client['name'] }}
                   {{ $client['phone_nr'] }}
                   {{ $client['address'] }}
               </ul></td>
        @endforeach
            <td>{{ $pizza['name'] }}</td>
            <td>{{ $pizza['pizzapad']['name'] }}</td>
            <td>{{ $pizza['cheese']['name'] }}</td>
            <td><ul>
        @foreach($pizza['ingredients'] as $ingredient)
            <li>{{ $ingredient['names'] }}</li>
        @endforeach
                </ul></td>
               <td>{{ $pizza['calories'] }}</td>
    @endforeach
    </tr>
    </tbody>
</table>


<div><h3>Pop Ingridientai</h3></div>

@foreach($ingredients as $key => $top)
    <div>{{$key}}
        {{$top}}</div>
@endforeach

@endsection


