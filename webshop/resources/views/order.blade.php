@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1 class="mb-4">Rendelés leadása</h1>
        <form method="POST" action="{{ route('order.submit') }}">
            @csrf
            <div class="form-group">
                <label for="first_name">Keresztnév</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Vezetéknév</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefonszám</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="country">Ország</label>
                <input type="text" class="form-control" id="country" name="country" required>
            </div>
            <div class="form-group">
                <label for="address">Cím</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <button type="submit" class="btn btn-success">Rendelés leadása</button>
        </form>
    </div>
@endsection