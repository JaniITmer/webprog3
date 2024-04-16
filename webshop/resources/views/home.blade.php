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
    <h3>Rendezés:   Szerint</h3>
    <h2>Termékek:</h2>
    <ul>
        @foreach($products as $product)
        <div class="card ">
            <lo>{{ $product->name}} </lo>
            <lo>{{ $product->category }} </lo>
            <lo>{{ $product->description}}</lo>
            <lo>{{ $product->price }}</lo>
</div>
        @endforeach
    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
