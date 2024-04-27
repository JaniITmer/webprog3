@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p>Ár: {{ $product->price }} Ft</p>
                <!-- További részletek megjelenítése (pl. kategória, stb.) -->
            </div>
        </div>
    </div>
@endsection