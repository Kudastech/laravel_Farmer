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
            <a href="{{ url('/add_category') }}">All User</a>
            <table class="table" id="form-edit">
                <h3 style="text-align:center; padding:40px;">All User </h3>

                <thead>
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">usertype</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $users )

                    <tr>
                      <td>{{ $users->id }}</td>
                      <td>{{ $users->name }}</td>
                      <td>{{ $users->email }}</td>
                      <td>{{ $users->usertype }}</td>
                       <td>
                      @if ($users->usertype == '1' )

                          {{-- <td><a class="btn btn-primary" href="{{ url('/edit_user', $users->id) }}">Admin</a></td> --}}
                          {{-- <p>Admin</p> --}}

                               <a onclick="return confirm('Are you sure that you want to change the Admin to User')" class="btn btn-primary" href="{{ url('/edit_admin', $users->id) }}">Admin to User</a>


                          @elseif ($users->usertype == '0' )

                               <a onclick="return confirm('Are you sure that you want to change the User to Admin')" class="btn btn-primary" href="{{ url('/edit_user', $users->id) }}">User - Admin</a>


                          @endif
                      </td>

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
