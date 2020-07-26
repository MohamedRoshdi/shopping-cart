@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="card-header">
            <h1 class="text-center">Shopping Cart</h1>
        </div>

        <div class="text-center m-2">
            @forelse($carts as $cart)
                <a href="{{route('cart.index', $cart->id)}}" class="btn btn-primary m-auto">
                    Go to {{$cart->name .' (' .$cart->items->count() .')' }}
                </a>
            @empty
                <div class="alert alert-warning">No Carts</div>
            @endforelse
        </div>
        <div class="row">
            <div class="col-12">
                @include('partials.errors')
            </div>
            @forelse($products as $product)
                <div class="col-4">
                    <div class="card">
                        <img src="{{$product->getImage()}}" class="card-img-top" alt="Image">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{$product->name}}</h5>
                            <p class="card-text" style="color: red">${{$product->price}}</p>
                            <p class="card-text">{{$product->productType->name}}</p>
                            @foreach($carts as $cart)
                                <a href="{{route('addToCart', [$product->id,$cart->id])}}" class="btn btn-success form-control m-1">
                                    Add to {{$cart->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-warning">No products</div>
            @endforelse
        </div>
    </div>
@endsection
