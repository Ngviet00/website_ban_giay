@extends('layouts.app')

@section('title',  __('Ordered'))

@section('content')
    @php
        use Gloudemans\Shoppingcart\Facades\Cart;
        $totalMoney = 0;
    @endphp

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="{{ route('home') }}">Home</a></span> / <span>Ordered</span></p>
                </div>
            </div>
        </div>
    </div>

    <div id="">
        <div class="container">
            <div class="row">
                <h1 class="text-center">You have placed your order successfully</h1>
            </div>
        </div>
    </div>
@endsection
