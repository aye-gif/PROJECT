@include('admin.header')

<!-- =======================
Menu item END -->
	
<!-- =======================
Content START -->
<section class="pt-0">
	<div class="container vstack gap-4">
		<!-- Title START -->
		<div class="row">
			<div class="col-12">
				<h1 class="fs-4 mb-0"><i class="bi bi-house-door fa-fw me-1"></i>Dashboard</h1>
			</div>
		</div>	
		<!-- Title END -->

		<!-- Counter START -->
		<div class="row g-4">
			<!-- Counter item -->
			<div class="col-sm-6 col-xl-3">
				<div class="card card-body border">
					<div class="d-flex align-items-center">
						<!-- Icon -->
						<div class="icon-xl bg-success rounded-3 text-white">
							<i class="bi bi-journals"></i>
						</div>
						<!-- Content -->
						<div class="ms-3">
							<h4>{{count($affiche_comandes)}}</h4>
							<span>Total Commandes</span>
						</div>
					</div>
				</div>
			</div>

			<!-- Counter item -->
			<div class="col-sm-6 col-xl-3">
				<div class="card card-body border">
					<div class="d-flex align-items-center">
						<!-- Icon -->
						<div class="icon-xl bg-info rounded-3 text-white">
							<i class="bi bi-graph-up-arrow"></i>
						</div>
						<!-- Content -->
						<div class="ms-3">
							<h4>{{count($affiche_fournisseur)}}</h4>
							<span>Fournisseurs</span>
						</div>
					</div>
				</div>
			</div>

			<!-- Counter item -->
			<div class="col-sm-6 col-xl-3">
				<div class="card card-body border">
					<div class="d-flex align-items-center">
						<!-- Icon -->
						<div class="icon-xl bg-warning rounded-3 text-white">
							<i class="bi bi-bar-chart-line-fill"></i>
						</div>
						<!-- Content -->
						<div class="ms-3">
							<h4>{{count($affiche_client)}}</h4>
							<span>Clients</span>
						</div>
					</div>
				</div>
			</div>

			<!-- Counter item -->
			<div class="col-sm-6 col-xl-3">
				<div class="card card-body border">
					<div class="d-flex align-items-center">
						<!-- Icon -->
						<div class="icon-xl bg-primary rounded-3 text-white">
							<i class="bi bi-star"></i>
						</div>
						<!-- Content -->
						<div class="ms-3">
							<h4>{{count($affiche_favorie)}}</h4>
							<span>Ajouts Favories</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Counter END -->


		<!-- Booking table START -->
		<div class="row">
			<div class="col-12">
				<div class="card border rounded-3">
					<!-- Card header START -->
					<div class="card-header border-bottom">
						<div class="d-sm-flex justify-content-between align-items-center">
							<h5 class="mb-2 mb-sm-0">Liste des commandes</h5>	
						</div>
					</div>
					<!-- Card header END -->

					<!-- Card body START -->
					<div class="card-body">
						<!-- Search and select START -->
						<div class="row g-3 align-items-center justify-content-between mb-3">
							<!-- Search -->
							<div class="col-md-8">
								<form class="rounded position-relative">
									<input class="form-control pe-5" type="search" placeholder="Search" aria-label="Search">
									<button class="btn border-0 px-3 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6"></i></button>
								</form>
							</div>

							<!-- Select option -->
							<div class="col-md-3">
								<!-- Short by filter -->
								<form>
									<select class="form-select js-choice" aria-label=".form-select-sm">
										<option value="">Sort by</option>
										<option>Free</option>
										<option>Newest</option>
										<option>Oldest</option>
									</select>
								</form>
							</div>
						</div>
						<!-- Search and select END -->

						<!-- Hotel room list START -->
						<div class="table-responsive border-0">
							<table class="table align-middle p-4 mb-0 table-hover table-shrink">
								<!-- Table head -->
								<thead class="table-light">
									<tr>
										<th scope="col" class="border-0 rounded-start">#</th>
										<th scope="col" class="border-0">Nom client</th>
										<th scope="col" class="border-0">Télephone</th>
										<th scope="col" class="border-0">Date</th>
										<th scope="col" class="border-0">livraison</th>
										<th scope="col" class="border-0">Paiement</th>
										<th scope="col" class="border-0 rounded-end text-center">Action</th>
									</tr>
								</thead>

								<!-- Table body START -->
								<tbody class="border-top-0">
									<!-- Table item -->
									@foreach ($affiche_comandes as $resultat)
										<tr>
											<td> <h6 class="mb-0">{{$resultat->id}}</h6> </td>
											<td> <h6 class="mb-0"><a href="{{url('admin/VoirClient',[$resultat->ref_info_adresse])}}">{{$resultat->nom_client}} {{$resultat->prenom_client}}</a></h6> </td>
											<td> {{$resultat->telephone}}</td>
											<td>{{$resultat->created_at}}</td>
											<td> <div class="badge text-bg-success">{{$resultat->mode_livraison}}</div> </td>
											<td> <div class="badge bg-success bg-opacity-10 text-success">{{$resultat->methode_paiement}}</div> </td>
											<td class="text-center"> 
												<a href="{{url('admin/',[$resultat->id])}}" class="btn btn-sm btn-light mb-0">Voir</a>
												<a href="{{url('admin/VoirCommande/',[$resultat->id])}}" class="btn btn-sm btn-light mb-0">Facture</a>   
											</td>
										</tr>
									@endforeach

								</tbody>
								<!-- Table body END -->
							</table>
						</div>
						<!-- Hotel room list END -->
					</div>
					<!-- Card body END -->

					<!-- Card footer START -->
					<div class="card-footer pt-0">
						<!-- Pagination and content -->
						<div class="d-sm-flex justify-content-sm-between align-items-sm-center">
							<!-- Content -->
							<p class="mb-sm-0 text-center text-sm-start">Showing 1 to 8 of 20 entries</p>
							<!-- Pagination -->
							<nav class="mb-sm-0 d-flex justify-content-center" aria-label="navigation">
								<ul class="pagination pagination-sm pagination-primary-soft mb-0">
									<li class="page-item disabled">
										<a class="page-link" href="#" tabindex="-1">Prev</a>
									</li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item active"><a class="page-link" href="#">2</a></li>
									<li class="page-item disabled"><a class="page-link" href="#">..</a></li>
									<li class="page-item"><a class="page-link" href="#">15</a></li>
									<li class="page-item">
										<a class="page-link" href="#">Next</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					<!-- Card footer END -->
				</div>
			</div>
		</div>	
		<!-- Booking table END -->
	</div>
</section>
<!-- =======================
Content END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->
@include('admin.fooster')
