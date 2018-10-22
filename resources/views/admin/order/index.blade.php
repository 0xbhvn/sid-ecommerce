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
                    <th scope="col">Ordered</th>
                    <th scope="col">Customer Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items->sortByDesc('created_at') as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>&#8377;{{ $item->quantity * $item->product->price }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                        <td>{{ $item->user->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <br>
    </div>
@endsection
