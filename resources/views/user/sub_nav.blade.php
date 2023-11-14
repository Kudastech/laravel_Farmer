<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="/">
            <p style="font-size:26px; color:green;">Farmer</p>
        </a>

    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a style="color: black;" href="{{ url('/show_order') }}"><i class="fa fa-heat"></i> Order</a></li>
             <li><a style="color: black;" href="{{ url('show_cart') }}"><i class="fa fa-shopping-bg"></i> Cart</a></li>
        </ul>
        {{-- <div class="header__cart__price">item: <span>$150.00</span></div> --}}
    </div>
    <div class="humberger__menu__widget">
        {{-- <div class="header__top__right__language">
            <img src="user/assets/img/language.png" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Spanis</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div> --}}
        {{-- <div class="header__top__right__auth">
            <a href="login.html"><i class="fa fa-user"></i> Login</a>
        </div> --}}
        @if(Route::has('login'))
                @auth
                    <li class="nav-item d-flex">Welcome,  {{ Auth::user()->name }}
                        <form method="POST" action="{{ route('logout') }}">
                                @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"  class="btn btn-danger btn-sm ml-5 float-left">Logout</a>
                        </form>
                    </li>

                     @else
                        <div class="header__top__right__auth">
                            <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                        </div>
                @endif
         @endif
    </div>


    {{-- <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="/">Home</a></li>
            <li><a href="{{ url('shop') }}">Shop</a></li>
            <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="{{ url('/product_details') }}">Shop Details</a></li>
                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                    <li><a href="./checkout.html">Check Out</a></li>
                    <li><a href="./blog-details.html">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="./blog.html">Blog</a></li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
    </nav> --}}


    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> FarmerConnect.com</li>
            <li>Free Shipping for all Order of #900</li>
        </ul>
    </div>
</div>
