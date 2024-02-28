@include('admin.header')

	
<!-- =======================
Content START -->
<section class="pt-0">
	<div class="container vstack gap-4">
		
		<!-- Booking table START -->
		<div class="row">
			<div class="col-12">
				<div class="card border rounded-3">
					<!-- Card header START -->
					<div class="card-header border-bottom">
						<div class="d-sm-flex justify-content-between align-items-center">
							<h5 class="mb-2 mb-sm-0">Suivies commandes</h5>
							<a href="" class="btn btn-sm btn-primary mb-0">AJOUTER</a>
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
										<th scope="col" class="border-0">Rèf article</th>
										<th scope="col" class="border-0">Rèf categorie</th>
										<th scope="col" class="border-0">Type</th>
										<th scope="col" class="border-0">Description</th>
										<th scope="col" class="border-0">Prix</th>
										<th scope="col" class="border-0 rounded-end text-center">Action</th>
									</tr>
								</thead>

								<!-- Table body START -->
								<tbody class="border-top-0">
									<!-- Table item -->
									@foreach ($affiche_suivie_commande as $resultat)
										<tr>
											<td> <h6 class="mb-0">{{$resultat->id}}</h6> </td>
											<td> <h6 class="mb-0"><a href="#">{{$resultat->ref_suivie_commande}}</a></h6> </td>
											<td> <h6 class="mb-0"><a href="#">{{$resultat->ref_commande}}</a></h6></td>
											<td> <h6 class="mb-0"><a href="#">{{$resultat->methode_livraison}}</a></h6></td>
											<td> <h6 class="mb-0"><a href="#">{{$resultat->statut}}</a></h6></div> </td>
											<td> <h6 class="mb-0"><a href="#">{{$resultat->created_at}}</a></h6></div> </td>
											<td> 
												<a href="{{url('admin/ModifierSuivieCommande',[$resultat->id])}}" class="btn btn-sm btn-primary mb-0">Modifier</a>
												<a href="{{url('SupprimerArticle',[$resultat->id])}}" class="btn btn-sm btn-danger mb-0">Supprimer</a>
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
