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
                        <th scope="col">Műveletek</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kosarElemek as $elem)
                        <tr>
                            <td>{{ $elem->termek->name }}</td>
                            <td>{{ $elem->termek->price }} Ft</td>
                            <td>
                                <input type="number" value="{{ $elem->mennyiseg }}" min="1" onchange="changeQuantity({{ $elem->id }}, this.value)">
                            </td>
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
        <a href="{{ route('order.form') }}" class="btn btn-success">Tovább a rendeléshez</a>
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

        function changeQuantity(cartItemId, newQuantity) {
            axios.put('/cart/update', {
                cartItemId: cartItemId,
                newQuantity: newQuantity
            })
            .then(function(response) {
                if (response.data.success) {
                    alert("Mennyiség sikeresen frissítve.");
                    location.reload(); 
                } else {
                    alert("Hiba történt a mennyiség frissítése során: " + response.data.message);
                }
            })
            .catch(function(error) {
                alert("Hiba történt a mennyiség frissítése során.");
                console.error(error);
            });
        }
    </script>
@endsection