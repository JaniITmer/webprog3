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
                        <div class="card ">
                            <li>
                                {{ $product->name }} - {{ $product->price }} Ft
                                <form action="{{ route('cart.hozzaad') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="termek_id" value="{{ $product->id }}">
                                    <input type="number" name="mennyiseg" value="1" min="1">
                                    <button type="submit">Kosárba helyezés</button>
                                </form>
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
{{ $products->links() }}
@endsection