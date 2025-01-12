<h1>Votre Panier</h1>
<table>
    <thead>
        <tr>
            <th>Article</th>
            <th>Quantité</th>
            <th>Prix</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($paniers as $panier)
            <tr>
                <td>{{ $panier->article->title }}</td>
                <td>{{ $panier->quantity }}</td>
                <td>{{ $panier->article->price }} FCFA</td>
                <td>{{ $panier->article->price * $panier->quantity }} FCFA</td>
            </tr>
        @endforeach
    </tbody>
</table>

<form action="{{ route('panier.paiement') }}" method="POST">
    @csrf
    <button type="submit">Passer à la caisse</button>
</form>
