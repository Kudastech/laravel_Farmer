
<!DOCTYPE html>
<html>
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

@include('admin.head')
	<body>

        @include('admin.header')

        @include('admin.right_sidebar')

        @include('admin.left_sidebar')





		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
            @if(session()->has('message'))

            <div class="alert alert-success">
                <button type="button" class="close"data-dismiss="alert" aria-hidden="true">X</button>
                {{ session()->get('message') }}
            </div>

            @endif
        <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data" class="tab-wizard wizard-circle wizard m-auto" id="form-edit">
            @csrf
            <h2>Add Product Section</h2>
            <section>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Enter Product title" required />
                        </div>

                        <div class="form-group">
                            <input type="text" name="slug" class="form-control" placeholder="Enter Product Slug" required />
                        </div>

                        <div class="form-group">
                            <input type="text" name="description" class="form-control" placeholder="Enter Product Description" required />
                        </div>

                        <div class="form-group">
                            <input type="number" name="price" class="form-control" placeholder="Enter product price" required/>
                        </div>

                        <div class="form-group">
                            <input type="number" name="dis_price" class="form-control" placeholder="Enter product Discount Price" required />
                        </div>

                        <div class="form-group">
                            <input type="number" name="quantity" class="form-control" placeholder="Enter product Quantity" required />
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
                            <input type="file" name="image" class="form-control" placeholder="Enter a image" required />
                        </div>
                        {{-- <div class="form-group">
                            <input type="text" name="category" class="form-control" placeholder="Enter a new category" />
                        </div> --}}
                        <div>
                            <div>
                                <button class="btn btn-primary" name="submit" value="Register">Add Product</button>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </form>
   {{-- @include('main_container') --}}
		</div>

		<!-- js -->
        @include('admin.script')
	</body>
</html>
