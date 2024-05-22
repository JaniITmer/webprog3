@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Termékek</h1>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            @if ($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 400px;">
    @endif
                            <p class="card-text">{{ $product->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('product.details', $product->id) }}" class="btn btn-sm btn-outline-secondary btn btn-info">Részletek</a>
                                    <form action="{{ route('cart.hozzaad') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="termek_id" value="{{ $product->id }}">
                                        <input type="number" name="mennyiseg" value="1" min="1">
                                        <button type="submit" class="btn btn-sm btn-success">Kosárba helyezés</button>
                                    </form>
                                </div>
                                <small class="text-muted">{{ $product->price }} Ft</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection