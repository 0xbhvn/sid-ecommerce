@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items->sortByDesc('created_at') as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td><form method="POST" action="/cart/update/{{ $item->id }}">
                                @csrf

                                <form method="POST" action="/cart/update/product/{{ $item->product->id }}">
                                    <input type="text" class="" value="{{ $item->quantity }}" name="quantity">
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </form>

                            </form></td>
                        <td>&#8377;{{ $item->quantity * $item->product->price }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <h3 class="card-subtitle mb-2 text-muted">Total:
        <?php
            foreach($items as $item)
            {
                $sum = $sum + ($item->product->price * $item->quantity);
            }
        ?>&#8377;{{ $sum }}
        </h3>
            <form method="POST" action="/order/create">
                @csrf

                <input type="submit" class="btn btn-primary" value="Checkout">
            </form>
    </div>
@endsection
