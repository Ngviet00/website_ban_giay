<nav class="nav-header" role="navigation">
    <div class="top-menu">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="" style="width: 200px">
                    </a>
                </div>
                <div class="d-flex align-items-center border-dark form-search">
                    <div>
                        <form action="" class="border-none position-relative">
                            <i class="fa fa-search position-absolute" aria-hidden="true" style="top: 10px;left: 8px"></i>
                            <input type="text" style="padding-left: 30px" placeholder="Search">
                        </form>
                    </div>
                    <div>
                        <a href="">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Account
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            Bag
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="sub-menu mt-2">
            <ul class="d-flex justify-content-center">
                <li>
                    <a href="{{ route('home') }}">home</a>
                </li>

                <li>
                    <a href="{{ route('product') }}">product</a>
                </li>

                <li>
                    <a href="{{ route('cart') }}">cart</a>
                </li>

                <li>
                    <a href="{{ route('about') }}">about</a>
                </li>

                <li>
                    <a href="{{ route('contact') }}">contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
