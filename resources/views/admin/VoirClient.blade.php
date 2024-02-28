@include('admin.header')

<!-- =======================
Cab list START -->
<section class="pt-0">
	<div class="container" data-sticky-container>
		<div class="row">

			<!-- Left sidebar START -->
			<aside class="col-xl-4 col-xxl-3">
				<div data-sticky data-margin-top="80" data-sticky-for="1199">
					<!-- Responsive offcanvas body START -->
					<div class="offcanvas-xl offcanvas-end" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
						<div class="offcanvas-header">
							<h5 class="offcanvas-title" id="offcanvasSidebarLabel">Advance Filters</h5>
							<button  type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
						</div>
						<!-- Offcanvas body -->
						<div class="offcanvas-body flex-column p-3 p-xl-0">
							<form class="rounded-3 shadow">
								<!-- Passenger capacity START -->
								<div class="card card-body rounded-0 rounded-top p-4">
									<!-- Title -->
									<h6 class="mb-2">Passenger capacity</h6>
									<!-- Checkbox -->
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="popolarType1">
										<label class="form-check-label" for="popolarType1">4 passenger seats</label>
									</div>
									<!-- Checkbox -->
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="popolarType2">
										<label class="form-check-label" for="popolarType2">6 passenger seats</label>
									</div>
								</div>
								<!-- Passenger capacity END -->

								<hr class="my-0"> <!-- Divider -->

								<!-- Price START -->
								<div class="card card-body rounded-0 p-4">
									<!-- Title -->
									<h6 class="mb-2">Price</h6>
									<!-- Price group -->
									<div class="position-relative">
										<div class="noui-wrapper mb-2">
											<div class="d-flex justify-content-between">
												<input type="text" class="text-body input-with-range-min">
												<input type="text" class="text-body input-with-range-max">
											</div>
											<div class="noui-slider-range mt-2" data-range-min='500' data-range-max='2000' data-range-selected-min='700' data-range-selected-max='1500'></div>
										</div>
									</div>
								</div>
								<!-- Price END -->

								<!-- Car model END -->
							</form><!-- Form End -->
						</div>

						<!-- Buttons -->
						<div class="d-flex justify-content-between p-2 p-xl-0 mt-xl-4">
							<button class="btn btn-link p-0 mb-0">Clear all</button>
							<button class="btn btn-primary mb-0">Filter Result</button>
						</div>
					</div>
					<!-- Responsive offcanvas body END -->
				</div> 	
			</aside>

			<!-- Main content START -->
			<div class="col-xl-8 col-xxl-9">
				<div class="vstack gap-4">

					<!-- Cab item START -->
					<div class="card border p-4">
						<!-- Card body START -->
						<div class="card-body p-0">
							<div class="row g-2 g-sm-4 mb-4">
								<!-- Card image -->
								<div class="col-md-4 col-xl-3">
									<div class="bg-light rounded-3 px-4 py-5">
										<img src="../../assetts/images/category/cab/seadan.jpg" alt="">
									</div>
								</div>

								<!-- Card title and rating -->
								<div class="col-sm-6 col-md-4 col-xl-6">
									<h4 class="card-title mb-2"><a href="cab-detail.html" class="stretched-link">{{$affiche_detail_client->nom}} {{$affiche_detail_client->prenoms}}</a></h4>
									
									<!-- Rating Star -->
									<ul class="list-inline mb-0">
										<li class="list-inline-item h6 fw-normal me-1 mb-0"></li>
										<li class="list-inline-item me-0"><i class="fa-solid fa-star text-warning"></i></li>
										<li class="list-inline-item me-0"><i class="fa-solid fa-star text-warning"></i></li>
										<li class="list-inline-item me-0"><i class="fa-solid fa-star text-warning"></i></li>
										<li class="list-inline-item me-0"><i class="fa-solid fa-star text-warning"></i></li>
										<li class="list-inline-item"><i class="fa-solid fa-star-half-alt text-warning"></i></li>
									</ul>
								</div>

							</div> <!-- Row END -->
						</div>
						<!-- Card body END -->

						<!-- Card footer START -->
						<div class="card-footer border-top p-0 pt-3">
							<div class="row">
								<!-- List -->
								<div class="col-md-6">
									<ul class="list-group list-group-borderless mb-0">
										<li class="list-group-item d-flex pb-0 mb-0">
											<span class="h6 fw-normal mb-0"><i class="bi bi-check-circle me-2"></i>600Kms included. After that $15/Kms</span>
										</li>
										<li class="list-group-item d-flex pb-0 mb-0">
											<span class="h6 fw-normal mb-0"><i class="bi bi-check-circle me-2"></i>2 luggage bags </span>
										</li>
										<li class="list-group-item d-flex pb-0 mb-0">
											<span class="h6 fw-normal mb-0"><i class="bi bi-check-circle me-2"></i>Diesel Car</span>
										</li>
									</ul>
								</div>

							</div>
						</div>
						<!-- card footer END -->
					</div>
					<!-- Cab item END -->
				</div>
			</div>
			<!-- Main content END -->

		</div> <!-- Row END -->

	</div>
</section>

@include('admin.fooster')
