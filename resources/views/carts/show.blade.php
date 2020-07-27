@extends('layouts.app')

@section('title', 'Cart Details')

@section('content')
    <div class="container">
        <div class="card-header">
            <h1 class="text-center">Cart Details - {{$cart->name}}</h1>
        </div>
        <div class="m-3 text-center">
            @if($cart->items->count())
            <div class="form-group">
                <a href="{{route('cart.edit', $cart->id)}}" class="btn btn-primary">Edit Cart</a>
            </div>
            @endif
            <form method="POST" action="{{route('cart.empty', $cart->id)}}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <div class="form-group">
                    <input type="submit" class="btn btn-danger empty-cart" value="Empty Cart">
                </div>
            </form>
        </div>
        <div>
            <table class="table ">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Count</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                @foreach($cart->items as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->product->name}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->count}}</td>
                        <td>{{$item->total}}</td>
                        <td>
                            <form method="POST" action="{{route('item.delete', $item->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <div class="form-group">
                                    <input type="submit" class="btn btn-danger delete-item" value="Delete">
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="text-center m-3">
                <h4>Total: {{$cart->items()->sum('total')}}</h4>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $('.empty-cart .delete-item').click(function (e) {
            e.preventDefault()
            if (confirm('Are you sure?')) {
                $(e.target).closest('form').submit();
            }
        });
    </script>
@endsection
