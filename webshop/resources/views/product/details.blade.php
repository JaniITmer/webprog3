@extends('layouts.app')

@section('content')
<div class="container py-4">
        <h1 class="mb-4">Termék részletei</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                @if ($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 400px;">
    @endif
                <p class="card-text">Ár: {{ $product->price }} Ft</p>
                <p class="card-text">Kategória: {{ $product->category }}</p>
                <p class="card-text">Leírás: {{ $product->description }}</p>
                <form action="{{ route('cart.hozzaad') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="termek_id" value="{{ $product->id }}">
                                    <input type="number" name="mennyiseg" value="1" min="1">
                                    <button type="submit">Kosárba helyezés</button>
                                </form>
            </div>
        </div>
    </div>
@endsection