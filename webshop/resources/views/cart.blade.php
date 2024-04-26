@extends('layouts.app')

@section('content')
    <h1>Kosár tartalma</h1>
    <table>
        <thead>
            <tr>
                <th>Termék neve</th>
                <th>Ár</th>
                <th>Mennyiség</th>
                <th>Összesen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kosarElemek as $elem)
                <tr>
                    <td>{{ $elem->termek->name }}</td>
                    <td>{{ $elem->termek->price }} Ft</td>
                    <td>{{ $elem->mennyiseg }}</td>
                    <td>{{ $elem->price * $elem->mennyiseg }} Ft</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <h2>Végösszeg: {{ $kosarElemek->sum('price') }} Ft</h2>
    </div>
@endsection