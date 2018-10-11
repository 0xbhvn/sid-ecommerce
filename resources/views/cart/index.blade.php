@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <div class="card" style="width: 18rem;">
                @foreach($items as $item)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->product->name }}</h5>
                            <form method="POST" action="/cart/update/{{ $item->id }}">
                                @csrf

                                <form method="POST" action="/cart/update/product/{{ $item->product->id }}">
                                    <input type="text" value="{{ $item->quantity }}" name="quantity">
                                    <input type="submit" value="Update">
                                </form>

                            </form>
                            <br>
                            <h6 class="card-subtitle mb-2 text-muted">Total Price: {{ $item->quantity * $item->product->price }}</h6>
                            <a href="/cart/delete/{{ $item->id }}" class="card-link">Delete</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <br>
        <h6 class="card-subtitle mb-2 text-muted">Total Price:
        <?php
            foreach($items as $item)
            {
                $sum = $sum + ($item->product->price * $item->quantity);
            }
        ?>
        {{ $sum }}
        </h6>
            <form method="POST" action="/order/create">
                @csrf

                <input type="submit" value="Checkout">
            </form>
    </div>
@endsection
