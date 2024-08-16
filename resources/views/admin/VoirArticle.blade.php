@include('admin.header')

<!-- =======================
Content START -->
<section class="pt-0">
	<div class="container vstack gap-4">
        
        <!-- Page main content START -->
		<div class="page-content-wrapper p-xxl-4">

			<!-- Booking detail START -->
			<div class="row g-4 g-xl-5">
				<!-- Image -->
				<div class="col-xxl-6">
					<div class="row g-2 g-sm-4">
						<div class="col-6">
							<a data-glightbox data-gallery="gallery" href="{{ asset('img/shop/catalog/'.$affiche_article->image_article) }}">
								<div class="card card-element-hover card-overlay-hover overflow-hidden">
									<!-- Image -->
									<img src="{{ asset('img/shop/catalog/'.$affiche_article->image_article) }}" class="rounded-3" alt="">
									<!-- Full screen button -->
									<div class="hover-element w-100 h-100">
										<i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
									</div>
								</div>
							</a>
						</div>
						<div class="col-6">
							<a data-glightbox data-gallery="gallery" href="{{ asset('img/shop/catalog/'.$affiche_article->image2_article) }}">
								<div class="card card-element-hover card-overlay-hover overflow-hidden">
									<!-- Image -->
									<img src="{{ asset('img/shop/catalog/'.$affiche_article->image2_article) }}" class="rounded-3" alt="">
									<!-- Full screen button -->
									<div class="hover-element w-100 h-100">
										<i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
									</div>
								</div>
							</a>
						</div>
						<div class="col-6">
							<a data-glightbox data-gallery="gallery" href="{{ asset('img/shop/catalog/'.$affiche_article->image3_article) }}">
								<div class="card card-element-hover card-overlay-hover overflow-hidden">
									<!-- Image -->
									<img src="{{ asset('img/shop/catalog/'.$affiche_article->image3_article) }}" class="rounded-3" alt="dfazed">
									<!-- Full screen button -->
									<div class="hover-element w-100 h-100">
										<i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
									</div>
								</div>
							</a>
						</div>
						
					</div>
				</div>

				<!-- Content -->
				<div class="col-xxl-6">
					<h4>{{$affiche_article->libelle_article }}</h4><br><br><br>
					{{-- <p class="fw-bold"><i class="bi bi-geo-alt me-2"></i>5855 W Century Blvd, Los Angeles - 90045 </p> --}}

					{{-- <p class="mb-4">Tolerably behavior may admit daughters offending her ask own. Praise effect wishes to change way and any wanted. Lively use looked latter regard had. Does he part last</p> --}}

					<!-- Feature -->
					<div class="row g-4">
						<div class="col-sm-6 col-md-4">
							<div class="d-flex align-items-center">
								<div class="icon-lg bg-primary bg-opacity-10 text-primary rounded-2"><i class="bi bi-info-circle fa-fw me-2"></i></div>
								<div class="ms-2">
									<small>Détail</small>
									<h6 class="mb-0 mt-1">{{$affiche_article->detail_id }}</h6>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-4">
							<div class="d-flex align-items-center">
								<div class="icon-lg bg-primary bg-opacity-10 text-primary rounded-2"><i class="bi bi-tags fa-fw me-2"></i></div>
								<div class="ms-2">
									<small>Catégorie</small>
									<h6 class="mb-0 mt-1">{{$affiche_article->libelle_categorie }}</h6>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-4">
							<div class="d-flex align-items-center">
								<div class="icon-lg bg-primary bg-opacity-10 text-primary rounded-2"><i class="bi bi-award fa-fw me-2"></i></div>
								<div class="ms-2">
									<small>Marque</small>
									<h6 class="mb-0 mt-1">{{$affiche_article->libelle_marque }}</h6>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-4">
							<div class="d-flex align-items-center">
								<div class="icon-lg bg-primary bg-opacity-10 text-primary rounded-2"><i class="bi bi-building fa-fw me-2"></i></div>
								<div class="ms-2">
									<small>Fournisseur</small>
									<h6 class="mb-0 mt-1">{{$affiche_article->libelle_fournisseur }}</h6>
								</div>
							</div>
						</div>
					</div>

					<!-- Booking info -->
					<div class="bg-light border border-secondary border-opacity-25 p-3 rounded d-inline-block mt-4">
						<h6 class="small">Current Reservation:</h6>
						<!-- Avatar -->
						<div class="d-sm-flex align-items-center">
							<!-- Avatar -->
							<div class="avatar avatar-xs flex-shrink-0">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="avatar">
							</div>
							<!-- Info -->
							<h6 class="mb-0 ms-2">Lori Stevens</h6>
						</div>
						<!-- Info -->
						<div class="hstack gap-4 gap-md-5 flex-wrap mt-2">
							<div>
								<small>Check-in:</small>
								<h6 class="fw-normal mb-0">18 Dec 2022 9:00AM</h6>
							</div>
							<div>
								<small>Check-out:</small>
								<h6 class="fw-normal mb-0">22 Dec 2022 8:00PM</h6>
							</div>
							<div>
								<small>Total Amount:</small>
								<h6 class="text-success mb-0">$1528</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Booking detail END -->

		</div>
		<!-- Page main content END -->

    </div> 
</section>
<!-- **************** MAIN CONTENT END **************** -->
@include('admin.fooster')