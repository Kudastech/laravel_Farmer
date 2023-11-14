<!DOCTYPE html>
<html>
    <base href="/public">
<style>
    #form-edit{
        padding: 50px;
        margin: auto;
        /* width: 70%; */
    }
    #form-edit h2{
        position: relative;
        bottom: 25px;
    }
</style>

@include('seller.head')
	<body>

        @include('seller.header')

        @include('seller.right_sidebar')

        @include('seller.left_sidebar')



		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
            @if(session()->has('message'))

            <div class="alert alert-success">
                <button type="button" class="close"data-dismiss="alert" aria-hidden="true">X</button>
                {{ session()->get('message') }}
            </div>

            @endif
        <form action="{{ url('/update_product_confirm', $product->id) }}" method="POST" enctype="multipart/form-data" class="tab-wizard wizard-circle wizard m-auto" id="form-edit">
            @csrf
            <h2>Update Product Section</h2>
            <section>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" value="{{ $product->title }}" placeholder="Enter Product title" required />
                        </div>

                        <div class="form-group">
                            <input type="text" name="slug" class="form-control" value="{{ $product->slug }}" placeholder="Enter Product Slug" required />
                        </div>

                        <div class="form-group">
                            <input type="text" name="description" class="form-control" value="{{ $product->description }}" placeholder="Enter Product Description" required />
                        </div>

                        <div class="form-group">
                            <input type="number" name="price" class="form-control" value="{{ $product->price }}" placeholder="Enter product price" required/>
                        </div>

                        <div class="form-group">
                            <input type="number" name="dis_price" class="form-control" value="{{ $product->discount_price }}" placeholder="Enter product Discount Price" required />
                        </div>

                        <div class="form-group">
                            <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" placeholder="Enter product Quantity" required />
                        </div>


                        <div class="form-group">
                            {{-- <label>Category</label> --}}
                            {{-- <input type="text" name="category" class="form-control" placeholder="Enter a new category" /> --}}
                            <select name="category" id="" class="form-control" required>
                                <option value="" aria-placeholder="Enter Category">Select Enter Category</option>
                                @foreach($category as $categorys)
                                <option value="{{ $categorys->category_name }}">{{ $categorys->category_name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <input type="file" name="image" class="form-control" placeholder="Enter a image" />
                        </div>

                        <div class="form-group">
                            {{-- <input type="file" name="image" class="form-control" placeholder="Enter a image" required /> --}}
                            <img src="/product/{{ $product->image }}" height="50" width="50"  alt="">
                        </div>
                        {{-- <div class="form-group">
                            <input type="text" name="category" class="form-control" placeholder="Enter a new category" />
                        </div> --}}
                        <div>
                            <div>
                                <button class="btn btn-primary" name="submit" value="Register">Update Product</button>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </form>
   {{-- @include('main_container') --}}
		</div>

		<!-- js -->
        @include('seller.script')
	</body>
</html>
