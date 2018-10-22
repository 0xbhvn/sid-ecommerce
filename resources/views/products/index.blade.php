@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="card col-sm-4" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <img class="card-img-top" src="/images/{{ $product->id }}-1.jpg" alt="Card image cap">
                        <p class="card-text">&#8377;{{ $product->price }}</p>
                        <a href="/cart/add/product/{{ $product->id }}/" class="btn btn-primary">Add to cart</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
