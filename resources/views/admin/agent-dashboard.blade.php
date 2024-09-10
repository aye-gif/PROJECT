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
				<h1 class="fs-4 mb-0"><i class="bi bi-house-door fa-fw me-1"></i>Tableau de bord</h1>
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
							<i class="bi bi-cart"></i>
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
							<i class="bi bi-truck"></i>
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
							<i class="bi bi-people"></i>
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
							<h5 class="mb-2 mb-sm-0">Liste des transactions journaliers</h5>	
						</div>
					</div>
					<!-- Card header END -->

					<!-- Card body START -->
					<div class="card-body">
						
						<!-- Hotel room list START -->
						<div class="table-responsive border-0">
							<table class="table align-middle p-4 mb-0 table-hover table-shrink">
								<!-- Table head -->
								<!-- Table body START -->
								<thead class="table-dark mb-2">
									<tr>
										<th scope="col" class="border-0 rounded-start">#</th>
										<th scope="col" class="border-0 text-center">Montant à payer</th>
										<th scope="col" class="border-0 text-center">Date</th>
										<th scope="col" class="border-0 text-center">Statut</th>
										<th scope="col" class="border-0 rounded-end text-center">Action</th>
									</tr>
								</thead>
									@foreach ($affiche_transactions as $resultat)
										<!-- Décodage du JSON en tableau PHP -->
										<!-- Table data -->
										<!-- Table data -->
										
										@php
											$records = json_decode($resultat->contenue, true);
										@endphp
										<tr>
											<td colspan="5" class="p-0">
												<div class="row row-cols-xl-7 align-items-lg-center border-bottom g-4">
													<div class="bg-light px-2 py-4 text-center">
														<h6 class="mb-0">Client : {{ $resultat->nom }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	     Télephone : {{ $resultat->telephone }}</h6>
													</div>
												</div>
											</td>
										</tr>
										<!-- Vérification si le JSON a été correctement décodé et contient des données -->
										@if($records && is_array($records))
											<tbody class="border-top-0">
												@foreach ($records as $resultat2)
													@if($resultat2['date'] === $affiche_date)
														<tr>
															<td><h6 class="mb-0 text-center">{{ $resultat2['id'] }}</h6></td>
															<td><h6 class="mb-0 text-center"><a href="">{{ $resultat2['montant_a_paye'] }}</a></h6></td>
															<td class="text-center">{{ \Carbon\Carbon::parse($resultat2['date'])->format('d-m-Y') }}</td>
															<td class="text-center"><div class="badge text-center text-bg-{{ $resultat2['statut'] == 0 ? 'warning' : 'success'}}"> {{ $resultat2['statut'] == 0 ? 'Non payé' : 'Payé' }}</div></td>
															<td class="text-center">
																<a href="{{url('/admin/infoTransaction',$resultat->commande_id)}}" class="btn btn-sm btn-light mb-0">Voir</a>
															</td>
														</tr>
													@endif
												@endforeach
											</tbody>
										@endif
									@endforeach
								
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

