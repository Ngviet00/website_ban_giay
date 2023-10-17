<div class="" style="padding-top: 20px;padding-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2 text-center colorlib-heading" style="margin-bottom: 10px;">
                <h2>Best Sellers</h2>
            </div>
        </div>
        <div class="row row-pb-md">
            @for($i = 1; $i <= 16; $i++)
                <div class="col-lg-3 mb-4 text-center">
                    <div class="product-entry border">
                        <a href="#" class="prod-img">
                            <img src="images/item-{{ $i }}.jpg" class="img-fluid" alt="Free html5 bootstrap 4 template">
                        </a>
                        <div class="desc">
                            <h2><a href="#">Women's Boots Shoes Maca</a></h2>
                            <span class="price">$139.00</span>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>
