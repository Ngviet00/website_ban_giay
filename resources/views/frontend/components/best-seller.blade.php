<div class="" style="padding-top: 20px;padding-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2 text-center colorlib-heading" style="margin-bottom: 10px;">
                <h2>Best Sellers</h2>
            </div>
        </div>
        <div class="row row-pb-md">
            @foreach($products as $key => $product)
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
                                    Add To Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
