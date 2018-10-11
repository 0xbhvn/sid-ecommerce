@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <div class="card" style="width: 18rem;">
                @foreach($items as $item)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->product->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Quantity: {{ $item->quantity }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">Total Price: {{ $item->quantity * $item->product->price }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <br>
    </div>
@endsection
