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
							<h5 class="mb-2 mb-sm-0">Liste des articles</h5>
							<a href="{{url('admin/AjouterArticle')}}" class="btn btn-sm btn-primary mb-0">AJOUTER</a>
						</div>
					</div>
					<!-- Card header END -->

					<!-- Card body START -->
					<div class="card-body">
						<!-- Search and select START -->
						<div class="row g-3 align-items-center justify-content-between mb-3">
							
						</div>
						<!-- Search and select END -->

						<!-- Hotel room list START -->
						<div class="table-responsive border-0">
							<table class="table align-middle p-4 mb-0 table-hover table-shrink">
								<!-- Table head -->
								<thead class="table-dark">
									<tr>
										<th scope="col" class="border-0 rounded-start">#</th>
										<th scope="col" class="border-0 text-center">Rèf article</th>
										<th scope="col" class="border-0 text-center">Rèf categorie</th>
										<th scope="col" class="border-0 text-center">Type</th>
										<th scope="col" class="border-0 text-center">Description</th>
										<th scope="col" class="border-0 text-center">Prix</th>
										<th scope="col" class="border-0 rounded-end text-center">Action</th>
									</tr>
								</thead>

								<!-- Table body START -->
								<tbody class="border-top-0">
									<!-- Table item -->
									@foreach ($affiche_article as $resultat)
										<tr>
											<td> <h6 class="mb-0 text-center">{{$resultat->id}}</h6> </td>
											<td> <h6 class="mb-0 text-center"><a href="#">{{$resultat->ref_article}}</a></h6> </td>
											<td> <h6 class="mb-0 text-center"><a href="#">{{$resultat->libelle_categorie}}</a></h6></td>
											<td> <h6 class="mb-0 text-center"><a href="#">{{$resultat->type_article}}</a></h6></td>
											<td> <h6 class="mb-0 text-center"><a href="#">{{$resultat->libelle_article}}</a></h6></div> </td>
											<td> <h6 class="mb-0 text-center"><a href="#">{{$resultat->prix}}</a></h6></div> </td>
											<td class="text-center"> 
												<a href="{{url('/admin/VoirArticle',[$resultat->id])}}" class="btn btn-sm btn-light mb-0">Voir</a> 
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
