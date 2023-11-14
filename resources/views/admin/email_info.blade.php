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

@include('admin.head')
	<body>

        @include('admin.header')

        @include('admin.right_sidebar')


        @include('admin.left_sidebar')


		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
            {{-- @if(session()->has('message'))

            <div class="alert alert-success">
                <button type="button" class="close"data-dismiss="alert" aria-hidden="true">X</button>
                {{ session()->get('message') }}
            </div>

            @endif --}}
        <form action="{{ url('send_user_email', $order->id) }}" method="POST" class="tab-wizard wizard-circle wizard m-auto" id="form-edit">
            @csrf
           <h2 style="text-align: center;"> Send Email to: {{ $order->email }}</h2>
            <section>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email Greeting</label>
                            <input type="text" name="greeting" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Email First Line</label>
                            <input type="text" name="firstline" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Email Body</label>
                            <input type="text" name="body" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Email Button Name</label>
                            <input type="text" name="button" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Email Url</label>
                            <input type="text" name="url" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Email Last line</label>
                            <input type="text" name="lastline" class="form-control" />
                        </div>
                        <div>
                            <div>
                                <button class="btn btn-primary" name="submit" value="Register">Send Email</button>
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
