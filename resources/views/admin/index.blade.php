<!DOCTYPE html>
<html>


@include('admin.head')
	<body>

        @include('admin.header')

        @include('admin.right_sidebar')


        @include('admin.left_sidebar')

		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="xs-pd-20-10 pd-ltr-20">
				{{-- <div class="title pb-20">
					<h2 class="h3 mb-0">Hospital Overview</h2>
				</div> --}}

				<div class="row pb-10">
					<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark">{{ $total_product }}</div>
									<div class="font-14 text-secondary weight-500">
										Total Products
									</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#00eccf">
										{{-- <i class="icon-copy dw dw-calendar1"></i> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark">{{ $total_order }}</div>
									<div class="font-14 text-secondary weight-500">
										Total Orders
									</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#ff5b5b">
										{{-- <span class="icon-copy ti-heart"></span> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark">{{ $total_user }}</div>
									<div class="font-14 text-secondary weight-500">
										Total Customers
									</div>
								</div>
								<div class="widget-icon">
									<div class="icon">
										<i
											{{-- class="icon-copy fa fa-stethoscope"
											aria-hidden="true" --}}
										></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark">${{ $total_revenue }}</div>
									<div class="font-14 text-secondary weight-500">Total Revenue</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#09cc06">
										{{-- <i class="icon-copy fa fa-money" aria-hidden="true"></i> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark">{{ $total_delivered }}</div>
									<div class="font-14 text-secondary weight-500">Order Delivered</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#09cc06">
										{{-- <i class="icon-copy fa fa-money" aria-hidden="true"></i> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark">{{ $total_processing }}</div>
									<div class="font-14 text-secondary weight-500">Order Processing</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#09cc06">
										{{-- <i class="icon-copy fa fa-money" aria-hidden="true"></i> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>



		</div>

		<!-- js -->
        @include('admin.script')
	</body>
</html>
