@extends('layouts.app')

@section('title',  __('Products'))

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="{{ route('home') }}">Home</a></span> / <span>Search Products</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="colorlib-product pt-1">
        <div class="container">
            <div class="row row-pb-md">
                @forelse($products as $product)
                    <div class="col-lg-3 mb-4 text-center">
                        <div class="product-entry border">
                            <a href="javascript:void(0)" class="prod-img">
                                <img src="{{ asset($product->image) }}" class="img-fluid" alt="Free html5 bootstrap 4 template">
                            </a>
                            <div class="desc">
                                <h2><a href="javascript:void(0)">{{ $product->name }}</a></h2>
                                <span class="price">{{ number_format($product->price) }} vnd</span>
                                <form action="{{ route('add-cart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <input type="hidden" name="image" value="{{ $product->image }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-danger">
                                        Thêm giỏ hàng
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center font-weight-bold">Not found</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
