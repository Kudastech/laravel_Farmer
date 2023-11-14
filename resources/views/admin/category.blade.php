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
        <form action="{{ url('/add_category') }}" method="POST" class="tab-wizard wizard-circle wizard m-auto" id="form-edit">
            @csrf
            <h2>Add Category Section</h2>
            <section>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- <label>Category</label> --}}
                            <input type="text" name="category" class="form-control" placeholder="Enter a new category" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="slug" class="form-control" placeholder="Enter Category Slug" />
                        </div>
                        <div>
                            <div>
                                <button class="btn btn-primary" name="submit" value="Register">Add Category</button>
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
