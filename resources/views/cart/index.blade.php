<h1>Votre Panier</h1>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Quantité</th>
            <th>Prix Unitaire</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cartItems as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ $item['unit_price'] }}</td>
                <td>{{ $item['total_price'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<form action="{{ route('pay.initiate') }}" method="POST">
    @csrf
    <button type="submit">Payer avec PayDunya</button>
</form>
