@extends('layouts.app')

@section('title',  __('Checkout'))

@section('content')
    @php
        use Gloudemans\Shoppingcart\Facades\Cart;
        $totalMoney = 0;
    @endphp

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="{{ route('home') }}">Home</a></span> / <span>Checkout</span></p>
                </div>
            </div>
        </div>
    </div>

    <div id="">
        <div class="container">
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                        <span class="badge badge-secondary badge-pill">{{ Cart::count() }}</span>
                    </h4>
                    <ul class="list-group mb-3 sticky-top">
                        @foreach(Cart::content() as $cart)
                            @php
                                $totalMoney += $cart->options->total_money;
                            @endphp
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">{{ $cart->name }}</h6>
                                    <small class="text-muted">{{ $cart->qty }} x {{ number_format($cart->price) }}</small>
                                </div>
                                <span class="text-muted">{{ number_format($cart->options->total_money) }} vnd</span>
                            </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (vnd)</span>
                            <strong>{{ number_format($totalMoney) }} vnd</strong>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8 order-md-1">
                    <form class="needs-validation" novalidate="">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" value="">
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="username" value="{{ auth()->user()->name }}" placeholder="Username" required="">
                                <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email <span class="text-muted">(Optional)</span></label>
                            <input type="email" value="{{ auth()->user()->email }}" class="form-control" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label> <br>
                            <textarea name="address" id="address" cols="90" rows="3" class="p-1"></textarea>
                        </div>
                        <h4 class="mb-3">Payment</h4>
                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                                <label class="custom-control-label" for="credit">Payment on delivery</label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
