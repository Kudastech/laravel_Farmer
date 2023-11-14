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
            <a href="{{ url('/add_category') }}">Add Category</a>
            <table class="table" id="form-edit">
                <h3 style="text-align:center; padding:40px;">All Category </h3>

                <thead>
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Category slug</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $datas)
                    <tr>
                        <th scope="row">{{ $datas->id }}</th>
                        <td>{{ $datas->category_name }}</td>
                        <td>{{ $datas->slug }}</td>
                        <td><a onclick="return confirm('Are you sure to delete this')" class="btn btn-danger" href="{{ url('delete_category', $datas->id) }}">Delete</a></td>
                        <td><a class="btn btn-primary" href="{{ url('edit_category', $datas->id) }}">Edit</a></td>
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
