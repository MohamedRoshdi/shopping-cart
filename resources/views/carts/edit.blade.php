@extends('layouts.app')

@section('title', 'Cart Details')

@section('content')
    <div class="container">
        <div class="card-header">
            <h1 class="text-center">Edit Cart - {{$cart->name}}</h1>
        </div>
        <div>
            @include('partials.errors')

            @if($cart->items->count())
                <form method="post" action="{{route('cart.update', $cart->id)}}">
                    @method('PATCH')
                    @csrf
                    <table class="table">
                        @foreach($cart->items as $item)
                            <tr>
                                <td>
                                    <label>{{$item->product->name}}</label>
                                </td>
                                <td>
                                    <input type="number" name="items[{{$item->id}}]" value="{{$item->count}}"
                                           class="form-control">
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="text-center">
                        <input type="submit" value="Update" class="btn btn-success">
                    </div>
                </form>
            @else
                <div class="alert alert-danger">No Items To Edit</div>
            @endif
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
