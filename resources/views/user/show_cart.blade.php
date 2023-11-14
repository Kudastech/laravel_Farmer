<!DOCTYPE html>
<html lang="zxx">

@include('user.head')



<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    @include('user.sub_nav')
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    @include('user.header')
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <!-- Hero Section End -->

    <section class="breadcrumb-section set-bg" data-setbg="user/assets/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>

                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $totalprice = 0; ?>
                                @foreach ($cart as $carts)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img width="50" src="product/{{ $carts->image }}" alt="">
                                            <h5>{{ $carts->product_title }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            ${{ $carts->price }}
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                {{-- <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div> --}}
                                                {{ $carts->quantity }}
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            #{{ $carts->price }}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a onclick="return confirm('Are you sure to remove this product?')"
                                                href="{{ url('remove_cart', $carts->id) }}"> <span
                                                    class="icon_close"></span></a>

                                        </td>
                                    </tr>
                                    <?php $totalprice = $totalprice + $carts->price; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Summary</h5>
                        <ul>
                            {{-- <li>Vegetable’s Package <span>$75.99</span></li>
                            <li>Fresh Vegetable <span>$151.99</span></li>
                            <li>Organic Bananas <span>$53.99</span></li> --}}
                            {{-- <li>Subtotal <span>$454.98</span></li> --}}
                            <li>Total <span>#{{ $totalprice }}</span></li>
                        </ul>
                            <a href="{{ url('checkout') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                        {{-- <div class="d-flex justify-between">
                            <a href="checkout.html" class="btn btn-danger ml-4">Cash on Delivery</a>
                            <a href="checkout.html" class="btn btn-danger ml-5">Pay With Card</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section Begin -->
    @include('user.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->

    @include('user.script')


</body>

</html>
