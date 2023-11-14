<!DOCTYPE html>
<html lang="zxx">

@include('user.head')



<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
@include('user.sub_nav')
    <!-- Humberger End -->

    <!-- Header Section Begin -->
 @include('user.header')
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Products Title</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Payment Status</th>
                                    <th>Delivery Status</th>
                                    <th>Image</th>
                                    <th>Cancel Order</th>
                                </tr>
                            </thead>
                            <tbody>
                            {{-- <?php// $totalprice = 0; ?>--}}
                                @foreach ($order as $orders)
                                    <tr>
                                        <td>
                                           <h5>{{ $orders->product_title }}</h5>
                                        </td>
                                        <td>
                                            <h5>{{ $orders->quantity }}</h5>
                                        </td>
                                        <td>
                                            <h5>${{ $orders->price }}</h5>
                                        </td>
                                        <td >
                                           <h5>{{ $orders->payment_status }}</h5>
                                        </td>
                                        <td>
                                           <h5>{{ $orders->delivery_status }}</h5>
                                        </td>
                                        <td>
                                            <img width="50" src="product/{{ $orders->image }}" alt="">
                                            {{-- <h3>Top</h3> --}}
                                        </td>
                                        <td >
                                            @if($orders->delivery_status == 'processing....')
                                            <a class="btn btn-danger" onclick="return confirm('Are you sure to cancel this order?')"
                                                href="{{ url('cancel_order', $orders->id) }}">Cancel</a>
                                                @else
                                                <p>Delivered</p>
                                            @endif

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
