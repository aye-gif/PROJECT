@include('admin.header')



<!-- =======================
Content START -->
<section class="pt-0">
	<div class="container vstack gap-4">	

    <!-- Page main content START -->
    <div class="page-content-wrapper p-xxl-4">

        <!-- Title -->
        <div class="row">
            <div class="col-12 mb-4 mb-sm-5">
                <h1 class="h3 mb-0">Transactions</h1>
            </div>
        </div>

        <div class="row g-4">
            <!-- Profile setting -->
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header border-bottom">
                        <h5 class="card-header-title">Date transaction</h5>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" action="{{url('/admin/Search/transaction' )}}" method="POST">
					        @csrf
                            <!-- Birthday -->
                            <div class="row g-3 mb-4">
                                <div class="col-lg-2">

                                </div>
                                <div class="col-lg-5">
                                    <div>
                                        <label class="form-label"></label>
                                        <input type="text" class="form-control flatpickr flatpickr-input" value="" name="DateTransaction" placeholder="Entrer une date" data-date-format="d M Y" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <!-- Save button -->
                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="submit" class="btn btn-primary">VALIDER</button>
                                    </div>
                                </div>
                                <div class="col-lg-2">

                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Account setting -->
            <div class="col-lg-12">
                <!-- Active log table -->
                <div class="card shadow mt-4">
                    <!-- Card header -->
                    <div class="card-header border-bottom">
                        <h5 class="card-header-title">Liste transactions</h5>
                    </div>

                    <!-- Card body START -->
                    <div class="card-body">
                        <!-- Table START -->
                        <div class="table-responsive border-0">
                            <table class="table align-middle p-4 mb-0 table-hover">

                                <!-- Table head -->
                                <thead class="table-dark">
                                    <tr>
										<th scope="col" class="border-0 rounded-start text-center">Transac</th>
										<th scope="col" class="border-0 text-center">Montant à payer</th>
										<th scope="col" class="border-0 text-center">Date</th>
										<th scope="col" class="border-0 text-center">Statut</th>
										<th scope="col" class="border-0 rounded-end text-center">Action</th>
									</tr>
                                </thead>
                                @if(session('transactions'))
                                    @foreach (session('transactions') as $resultat)
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
																<a href="{{url('/admin/infoTransaction',$resultat->commande_id)}}" class="btn btn-sm btn-light mb-0">Valider</a>
															</td>
														</tr>
													@endif
												@endforeach
											</tbody>
										@endif
									@endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">Aucune transaction trouvée pour cette date.</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                        <!-- Table END -->
                    </div>
                    <!-- Card body END -->
                </div>
            </div>
        </div> <!-- Row END -->
    </div>
    <!-- Page main content END -->
    </div>
    
</section>

<!-- **************** MAIN CONTENT END **************** -->
@include('admin.fooster')