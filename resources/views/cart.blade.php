@extends('layouts.app')

@section('title',  __('Cart'))

@section('content')
    @php
        use Gloudemans\Shoppingcart\Facades\Cart;
        $totalMoney = 0;
    @endphp

    <div class="breadcrumbs">
        <div class="container">
            @if(session()->has('success'))
                <div class="bg-success text-white p-3">
                    {{ session()->get('success') }}
                </div>
            @endif

            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="{{ route('home') }}">Home</a></span> / <span>Shopping Cart</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('update-cart') }}" method="post">
        @csrf
        <div class="">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="product-name d-flex">
                            <div class="one-forth text-left px-4">
                                <span>Product Details</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Price</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Quantity</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Total</span>
                            </div>
                            <div class="one-eight text-center px-4">
                                <span>Remove</span>
                            </div>
                        </div>
                        @forelse($carts as $cart)
                            @php
                                $totalMoney += $cart->options->total_money;
                            @endphp
                            <div class="product-cart d-flex">
                                <div class="one-forth">
                                    <div class="product-img"
                                         style="background-image: url({{ asset($cart->options->image) }});">
                                    </div>
                                    <div class="display-tc">
                                        <h3>{{ $cart->name }}</h3>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <span class="price">{{ number_format($cart->price) }} vnd</span>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <input type="hidden" name="prices[]" value="{{ $cart->price }}">
                                    <input type="hidden" name="images[]" value="{{ $cart->options->image }}">
                                    <input type="hidden" name="ids[]" value="{{ $cart->id }}">
                                    <div class="display-tc">
                                        <input type="text" id="quantity" name="quantity[]"
                                               class="form-control input-number text-center" value="{{ $cart->qty }}"
                                               min="1" max="100">
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <span class="price">{{ number_format($cart->options->total_money) }}</span>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <a href="{{ route('delete-cart', $cart->rowId) }}" class="closed"></a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">Not Item In Your Cart, <a class="text-primary"
                                                                             href="{{ route('home') }}">Click here</a>
                            </p>
                        @endforelse
                    </div>
                </div>
                @if(count($carts) >0 )
                    <div class="row row-pb-lg">
                        <div class="col-md-12">
                            <div class="total-wrap">
                                <div class="row">
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-8 text-center">
                                        <div class="total">
                                            <div class="sub">
                                                <p><span>Quantity:</span> <span>{{ Cart::count() }}</span></p>
                                                <p><span>Total:</span> <span>{{ number_format($totalMoney) }} vnd</span>
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-evenly">
                                                <a href="{{ route('clear-cart') }}" class="btn btn-secondary">
                                                    Clear Cart
                                                </a>
                                                <button type="submit" class="btn btn-primary">
                                                    Update Cart
                                                </button>
                                                <a href="{{ route('check-out') }}" class="btn btn-danger">
                                                    Checkout
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </form>
@endsection
