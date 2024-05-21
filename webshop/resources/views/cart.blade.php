@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1 class="mb-4">Kosár tartalma</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Termék neve</th>
                        <th scope="col">Ár</th>
                        <th scope="col">Mennyiség</th>
                        <th scope="col">Összesen</th>
                        <th scope="col">Művelet</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($kosarElemek as $elem)
    <tr>
        <td>{{ $elem->termek->name }}</td>
        <td>{{ $elem->termek->price }} Ft</td>
        <td>{{ $elem->mennyiseg }}</td>
        <td>{{ $elem->termek->price * $elem->mennyiseg }} Ft</td>
        <td>
            <button type="button" onclick="deleteItem({{ $elem->id }})" class="btn btn-danger">Törlés</button>
        </td>
    </tr>
@endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <h2>Végösszeg: {{ $kosarElemek->sum(function($elem) { return $elem->termek->price * $elem->mennyiseg; }) }} Ft</h2>
        </div>
        <button type="button" class="btn btn-success">Tovább a rendeléshez</button>
    </div>

    <script>
        function deleteItem(cartItemId) {
    if (confirm("Biztosan törölni szeretné ezt a terméket?")) {
        axios.delete('/cart/delete', {
            data: {
                cartItemId: cartItemId
            },
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(function(response) {
            if (response.data.success) {
                alert("Termék sikeresen törölve.");
                location.reload(); 
            } else {
                alert("Hiba történt a törlés során: " + response.data.message);
            }
        })
        .catch(function(error) {
            alert("Hiba történt a törlés során.");
            console.error(error);
        });
    }
}
    </script>
@endsection