<div><h3>Klientu kontaktai</h3></div>
@foreach($clients as $client)
    <div> {{ $client['name'] }}</div>
    <div> {{ $client['phone_nr'] }}</div>
    <div> {{ $client['address'] }}</div>
@endforeach