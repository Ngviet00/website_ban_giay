@extends('layouts.app')

@section('title',  __('Products'))

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="{{ route('home') }}">Home</a></span> / <span>Men</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="breadcrumbs-two">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs-img" style="background-image: url({{ asset('images/cover-img-1.jpg') }});">
                        <h2>Men's</h2>
                    </div>
                    <div class="menu text-center">
                        <p><a href="#">New Arrivals</a> <a href="#">Best Sellers</a> <a href="#">Extended Widths</a> <a
                                href="#">Sale</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="colorlib-featured">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <div class="featured">
                        <div class="featured-img featured-img-2" style="background-image: url({{ asset('images/men.jpg') }});">
                            <h2>Casuals</h2>
                            <p><a href="#" class="btn btn-primary btn-lg">Shop now</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 text-center">
                    <div class="featured">
                        <div class="featured-img featured-img-2" style="background-image: url({{ asset('images/women.jpg') }});">
                            <h2>Dress</h2>
                            <p><a href="#" class="btn btn-primary btn-lg">Shop now</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 text-center">
                    <div class="featured">
                        <div class="featured-img featured-img-2" style="background-image: url({{ asset('images/item-11.jpg') }});">
                            <h2>Sports</h2>
                            <p><a href="#" class="btn btn-primary btn-lg">Shop now</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="colorlib-product">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
                    <h2>View All Products</h2>
                </div>
            </div>
            <div class="row row-pb-md">
                @foreach($products as $product)
                    <div class="col-lg-3 mb-4 text-center">
                        <div class="product-entry border">
                            <a href="javascript:void(0)" class="prod-img">
                                <img src="{{ asset($product->image) }}" class="img-fluid" alt="Free html5 bootstrap 4 template">
                            </a>
                            <div class="desc">
                                <h2><a href="javascript:void(0)">{{ $product->name }}</a></h2>
                                <span class="price">{{ number_format($product->price) }} vnd</span>
                                <a href="" class="btn btn-danger">
                                    Add To Cart
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('frontend.components.brand')
@endsection
