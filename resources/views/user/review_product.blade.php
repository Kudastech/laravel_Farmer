
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Review Products</h2>
                </div>
                <div class="featured__controls">
                    {{-- <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".oranges">Oranges</li>
                        <li data-filter=".fresh-meat">Fresh Meat</li>
                        <li data-filter=".vegetables">Vegetables</li>
                        <li data-filter=".fastfood">Fastfood</li>
                    </ul> --}}
                </div>
            </div>
        </div>
        <div class="row featured__filter">

            @foreach ($rproduct as $rproducts)

            <div class="col-lg-2 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="product/{{ $rproducts->image }}">
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{ url('/product_details', $rproducts->id) }}">{{ $rproducts->title }}</a></h6>
                        <h5>#{{ $rproducts->price }}</h5>
                    </div>
                </div>
            </div>

            @endforeach


            {{-- <span style="color:green;">{!! $product->withQueryString()->links('pagination::bootstrap-5') !!}</span> --}}

        </div>
    </div>
</section>
