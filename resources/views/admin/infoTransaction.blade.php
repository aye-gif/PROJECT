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
                                <h5 class="mb-2 mb-sm-0">Liste des clients</h5>	
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
                                    <!-- Table body START -->
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" class="border-0 rounded-start">#</th>
                                            <th scope="col" class="border-0 text-center">Montant à payer</th>
                                            <th scope="col" class="border-0 text-center">Date</th>
                                            <th scope="col" class="border-0 text-center">Statut</th>
                                            <th scope="col" class="border-0 rounded-end text-center">Action</th>
                                        </tr>
                                    </thead>
                                        @foreach ($affiche_liste_transaction as $resultat)
                                            <!-- Décodage du JSON en tableau PHP -->
                                            <!-- Table data -->
					
                                            @php
                                                $records = json_decode($resultat->contenue, true);
                                            @endphp
                            
                                            <!-- Vérification si le JSON a été correctement décodé et contient des données -->
                                            @if($records && is_array($records))
                                                <tbody class="border-top-0">
                                                    @foreach ($records as $resultat2)
                                                        <tr>
                                                            <td><h6 class="mb-0 text-center">{{ $resultat2['id'] }}</h6></td>
                                                            <td><h6 class="mb-0 text-center"><a href="">{{ $resultat2['montant_a_paye'] }}</a></h6></td>
                                                            <td class="text-center">{{ \Carbon\Carbon::parse($resultat2['date'])->format('d-m-Y') }}</td>
                                                            <td class="text-center"><div class="badge text-center text-bg-{{ $resultat2['statut'] == 0 ? 'warning' : 'success'}}"> {{ $resultat2['statut'] == 0 ? 'Non payé' : 'Payé' }}</div></td>
                                                            <td class="text-center">
                                                                <a href="{{ url('/admin/TransactionValidate', [ $resultat->id , $resultat2['id'] ]) }}" class="btn btn-sm btn-light mb-0">Valider</a>
                                                            </td>
                                                        </tr>
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

                        {{-- <!-- Card footer START -->
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
                        <!-- Card footer END --> --}}
                    </div>
                </div>
            </div>	
		<!-- Booking table END -->
	</div>
    
</section>
<!-- =======================
Content END -->

<!-- **************** MAIN CONTENT END **************** -->
@include('admin.fooster')