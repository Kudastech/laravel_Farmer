<!DOCTYPE html>
<html>
<style>
    #form-edit{
        padding: 50px;
        margin: auto;
        /* width: 70%; */
    }
    #form-edit h3{
        position: relative;
        bottom: 25px;
        text-align: center;
    }
</style>

@include('admin.head')
	<body>

        @include('admin.header')

        @include('admin.right_sidebar')


        @include('admin.left_sidebar')


		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
            {{-- @csrf --}}
            @if(session()->has('message'))

            <div class="alert alert-danger">
                <button type="button" class="close"data-dismiss="alert" aria-hidden="true">X</button>
                {{ session()->get('message') }}
            </div>

            @endif
            <a href="{{ url('/add_category') }}">All Product</a>
            <table class="table" id="form-edit">
                <h3 style="text-align:center; padding:40px;">All Product</h3>

                <thead>
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">Product Title</th>
                        <th scope="col">Product slug</th>
                        <th scope="col">Description</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount Price</th>
                        <th scope="col">Product Image</th>
                        <th style="text-align: center;" rowspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $products)
                    <tr>
                        <th scope="row">{{ $products->id }}</th>
                        <td>{{ $products->title }}</td>
                        <td>{{ $products->slug }}</td>
                        <td>{{ $products->description }}</td>
                        <td>{{ $products->quantity }}</td>
                        <td>{{ $products->category }}</td>
                        <td>{{ $products->price }}</td>
                        <td>{{ $products->discount_price }}</td>
                        <td><img src="/product/{{ $products->image }}" width="40" height="10" alt=""></td>
                        <td><a onclick="return confirm('Are you sure to delete this')" class="btn btn-danger" href="{{ url('delete_product', $products->id) }}">Delete</a></td>
                        <td><a  class="btn btn-primary" href="{{ url('update_product', $products->id) }}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- @include('main_container') --}}
		</div>

		<!-- js -->
        @include('admin.script')
	</body>
</html>
