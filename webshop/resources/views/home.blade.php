@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Főoldal') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Sikeres bejelentkezés!') }}

                    <h1>Üdvözöljük a webshopunkban!</h1>
                    <h3>Rendezés: 
                        <a href="{{ route('home', ['rendezes' => 'nev_novekvo']) }}">Név növekvő</a> |
                        <a href="{{ route('home', ['rendezes' => 'nev_csokkeno']) }}">Név csökkenő</a> |
                        <a href="{{ route('home', ['rendezes' => 'ar_novekvo']) }}">Ár növekvő</a> |
                        <a href="{{ route('home', ['rendezes' => 'ar_csokkeno']) }}">Ár csökkenő</a>
                    </h3>
                    
                    <h2>Termékek:</h2>
                    <ul>
                        @foreach($products as $product)
                        <div class="card mb-3">
                            <li class="list-unstyled">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <a href="{{ route('product.details', ['id' => $product->id]) }}" class="product-link">
                                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded-start" alt="{{ $product->name }}">
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <a href="{{ route('product.details', ['id' => $product->id]) }}" class="product-link">
                                                <h5 class="card-title">{{ $product->name }}</h5>
                                            </a>
                                            <p class="card-text">{{ $product->price }} Ft</p>
                                            <form action="{{ route('cart.hozzaad') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="termek_id" value="{{ $product->id }}">
                                                <div class="input-group mb-3">
                                                    <input type="number" name="mennyiseg" class="form-control" value="1" min="1">
                                                    <button class="btn btn-primary" type="submit">Kosárba helyezés</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div>
                        @endforeach
                        @if(session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .product-link {
        color: inherit !important; 
        text-decoration: none !important; 
    }

    .product-link h5 {
        color: inherit !important; 
    }

    .product-link:hover {
        text-decoration: none !important; 
    }
</style>
@endsection