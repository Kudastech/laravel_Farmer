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
            {{-- @if(session()->has('message'))

            <div class="alert alert-danger">
                <button type="button" class="close"data-dismiss="alert" aria-hidden="true">X</button>
                {{ session()->get('message') }}
            </div>
            @endif --}}
            {{-- <a href="{{ url('/add_category') }}">Add Category</a> --}}

            <div>
                <form action="{{ url('search') }}" method="GET" style="display: flex; padding:20px;">
                    @csrf
                    <div>
                        <input class="form-control" type="search" name="search" placeholder="Search for order" id="">
                    </div>
                    <div>
                        <input class="btn btn-primary" type="submit" name="" value="search" id="">
                    </div>

                </form>
            </div>
            <table class="table" id="form-edit">
                <h3 style="text-align:center; padding:40px;">All Orders </h3>

                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">phone</th>
                        <th scope="col">Product title</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Delivery Status</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Print PDF</th>
                        <th scope="col">Send Email</th>
                        {{-- <th style="text-align: center;" rowspan="2">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse($order as $orders)
                    <tr>
                        <th scope="row">{{ $orders->name }}</th>
                        <td>{{ $orders->email }}</td>
                        <td>{{ $orders->address }}</td>
                        <td>{{ $orders->phone }}</td>
                        <td>{{ $orders->product_title }}</td>
                        <td>{{ $orders->quantity }}</td>
                        <td>{{ $orders->price }}</td>
                        <td>{{ $orders->payment_status }}</td>
                        <td>{{ $orders->delivery_status }}</td>
                        <td><img width="50" src="/product/{{ $orders->image }}" alt=""></td>
                        <td>

                            @if($orders->delivery_status == "processing....")

                            <a onclick="return confirm('Are you sure that you want this product to be Delivered')" class="btn btn-success" href="{{ url('delivered', $orders->id) }}">Delivered</a>

                            @else

                            <p class="">Delivered</p>

                            @endif


                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ url('print_pdf', $orders->id) }}">Print PDF</a>
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{ url('send_email', $orders->id) }}">Send Email</a>
                        </td>

                        <td colspan="16">
                            @empty
                             <p>   No Data Found </p>
                        </td>

                    </tr>

                    <tr>

                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- @include('main_container') --}}
		</div>

		<!-- js -->
        @include('admin.script')
	</body>
</html>
