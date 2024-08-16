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
                            
                            <!-- Hotel room list START -->
                            <div class="table-responsive border-0">
                                <table class="table align-middle p-4 mb-0 table-hover table-shrink">
                                    <!-- Table head -->
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col" class="border-0 rounded-start">#</th>
                                            <th scope="col" class="border-0 text-center">Rèf commande</th>
                                            <th scope="col" class="border-0 text-center">Livraison</th>
                                            <th scope="col" class="border-0 text-center">Nombre jours</th>
                                            <th scope="col" class="border-0 text-center">Montant</th>
                                            <th scope="col" class="border-0 text-center">reste</th>
                                            <th scope="col" class="border-0 text-center">Statut</th>
                                            <th scope="col" class="border-0 rounded-end text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <!-- Table body START -->
                                    <tbody class="border-top-0">
                                        <!-- Table item -->
                                        @foreach ($affiche_liste_commande as $resultat)
                                            <tr>
                                                <td> <h6 class="mb-0">{{$resultat->id}}</h6> </td>
                                                <td> <h6 class="mb-0 text-center"><a href="">{{$resultat->ref_commande}}</a></h6> </td>
                                                <td class="text-center"> {{$resultat->mode_livraison}}</td>
                                                <td class="text-center">{{$resultat->nombreJour}} jours</td>
                                                <td class="text-center"> {{$resultat->methode_paiement}} Fcfa</td>
                                                <td class="text-center"> {{$resultat->reste}} Fcfa</td>
                                                <td class="text-center"> {{$resultat->statut}} </td>
                                                <td class="text-center">
                                                    <a href="{{url('/admin/etapeCommande',[$resultat->ref_commande])}}" class="btn btn-sm btn-light mb-0">Etape</a>
                                                    <a href="{{url('/admin/voirCommande',[$resultat->id])}}" class="btn btn-sm btn-light mb-0">Voir</a>
                                                    <a href="{{url('/admin/infoTransaction',[$resultat->id])}}" class="btn btn-sm btn-light mb-0">Transaction</a>

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

<!-- **************** MAIN CONTENT END **************** -->
@include('admin.fooster')