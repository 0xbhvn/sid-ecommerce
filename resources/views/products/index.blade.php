@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <div class="card" style="width: 18rem;">
                @foreach($products as $product)
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->price }}</p>
                        <a href="/cart/add/product/{{ $product->id }}/" class="btn btn-primary">Add to cart</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
