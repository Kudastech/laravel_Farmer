<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Latest Products</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach ($lproduct as $lproducts)

            <div class="col-lg-2 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="product/{{ $lproducts->image }}">
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{ url('/product_details', $lproducts->id) }}">{{ $lproducts->title }}</a></h6>
                        <h5>#{{ $lproducts->price }}</h5>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>
