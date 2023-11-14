<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach ($product as $products)

            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                 <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="product/{{ $products->image }}">
                        <ul class="featured__item__pic__hover">
                            {{-- <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li> --}}
                            <li>
                                <form action="{{ url('/add_cart', $products->id) }}" method="post">
                                @csrf
                                {{-- <input type="number" name="quantity" min="1" > --}}
                                <div class="product__details__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" name="quantity" value="1" min="1">
                                             {{-- <a href="#" class="primary-btn d">ADD TO CARD</a> --}}

                                        </div>
                                    </div>
                                </div>
                                <button type="submit"><i class="fa fa-shopping-cart"></i></button>
                                {{-- <a href="#"><i class="fa fa-shopping-cart"></i></a> --}}
                                </form>
                            </li>
                        </ul>
                    </div>
                <a href="{{ url('/product_details', $products->id) }}">
                    <div class="featured__item__text">
                        <h6>{{ $products->title }}</h6>
                        <h5>${{ $products->price }}</h5>
                    </div>
                </a>
                 </div>
            </div>

            @endforeach
            {{-- $product = Product::paginate(10); --}}

            <span style="color:green;">{!! $product->withQueryString()->links('pagination::bootstrap-5') !!}</span>
            {{-- <span style="color:green;">{!! $product->withQueryString()->links('pagination::semantic-ui') !!}</span> --}}


        </div>
    </div>
</section>

<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Products</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".oranges">Oranges</li>
                        <li data-filter=".fresh-meat">Fresh Meat</li>
                        <li data-filter=".vegetables">Vegetables</li>
                        <li data-filter=".fastfood">Fastfood</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">

            @foreach ($product as $products)

            <div class="col-lg-2 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="product/{{ $products->image }}">
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{ url('/product_details', $products->id) }}">{{ $products->title }}</a></h6>
                        <h5>${{ $products->price }}</h5>
                    </div>
                </div>
            </div>

            @endforeach


            <span style="color:green;">{!! $product->withQueryString()->links('pagination::bootstrap-5') !!}</span>

        </div>
    </div>
</section>
