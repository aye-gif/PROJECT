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
                        <div class="card-header border-top">
                            <div class="d-sm-flex justify-content-between align-items-center">
                                <h5 class="mb-2 mb-sm-0">Liste des clients</h5>	
                            </div>
                        </div>
                        <!-- Card header END -->

                            <!-- agent list START -->
                            <div class="row g-4">
                                <!-- Card item -->
                                @foreach ($affiche_liste_client as $resultat)
                                        <div class="col-md-6 col-lg-4 col-xxl-3">
                                            <div class="card border h-100">
                                                
                                                <!-- Card body -->
                                                <div class="card-body text-center pb-0">
                                                    <!-- Avatar Image -->
                                                    <div class="avatar avatar-xl flex-shrink-0 mb-3">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('img/shop/client/'.$resultat->image_client) }}" alt="avatar">
                                                    </div>
                                                    <!-- Title -->
                                                    <h5 class="mb-1">{{ $resultat->nom }}</h5>
                                                    <small><i class="bi bi-person fa-fw me-2"></i>{{ $resultat->prenoms }}</small>
                                                    <h6 class="mb-1"><i class="bi bi-telephone fa-fw me-2"></i>{{ $resultat->telephone }}</h6>
                                                </div>
                                                <!-- card footer -->
                                                <div class="card-footer d-flex gap-3 align-items-center">
                                                    <a href="{{url('/admin/infoCommande',[$resultat->id])}}" class="btn btn-sm btn-primary-soft mb-0 w-100">Voir commande</a>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                                <!-- Card item END -->
                            </div> 
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