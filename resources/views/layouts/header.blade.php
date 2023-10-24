@php
    use Gloudemans\Shoppingcart\Facades\Cart;
@endphp

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
                        <form action="{{ route('search') }}" method="get" class="border-none position-relative">
                            <i class="fa fa-search position-absolute" aria-hidden="true" style="top: 10px;left: 8px"></i>
                            <input type="text" style="padding-left: 30px" name="keyword" value="{{ request()->get('keyword') ? request()->get('keyword')  : '' }}" placeholder="Search">
                        </form>
                    </div>
                    <div>
                        @if(auth()->check())
                            <div>
                                {{ auth()->user()->name }}
                                <a class="text-primary" style="text-decoration: underline" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('(Logout)') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @else
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <a href="{{ route('login') }}">
                                Login
                            </a>
                            |
                            <a href="{{ route('register') }}">
                                Register
                            </a>
                        @endif
                    </div>
                    <div>
                        <a href="{{ route('cart') }}">
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            Bag
                            @if(Cart::count() > 0)
                                <span class="text-primary">({{ Cart::count() }})</span>
                            @endif
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
                    <a href="{{ route('about') }}">about</a>
                </li>

                <li>
                    <a href="{{ route('contact') }}">contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
