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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kosarElemek as $elem)
                        <tr>
                            <td>{{ $elem->termek->name }}</td>
                            <td>{{ $elem->termek->price }} Ft</td>
                            <td>{{ $elem->mennyiseg }}</td>
                            <td>{{ $elem->termek->price * $elem->mennyiseg }} Ft</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <h2>Végösszeg: {{ $kosarElemek->sum(function($elem) { return $elem->termek->price * $elem->mennyiseg; }) }} Ft</h2>
        </div>
    </div>
@endsection