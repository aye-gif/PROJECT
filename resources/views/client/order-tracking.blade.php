{{-- partie haut de page --}}
@extends('header-fooster')
    @section('title')
      order-traking
    @endsection
@section('contenue')
{{-- partie corps de page --}}
    <!-- Page title-->
    <!-- Page Title (Dark)-->
    <div class="bg-dark py-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{url('/')}}"><i class="czi-home"></i>Acceuil</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="{{url('/plus')}}">Order</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Suivi de commande</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">Suivi de commande : <span class="h4 font-weight-normal text-light">{{ $detailcommande->ref_commande }}</span></h1>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container py-5 mb-2 mb-md-3">
      
      @if ($detailcommande->statut == "etape1")
          <!-- Details-->
          <div class="row mb-4">
            <div class="col-sm-4 mb-2">
              <div class="bg-secondary p-4 text-center rounded-lg"><span class="font-weight-medium text-dark mr-2">Mode Livraison :</span>{{$detailcommande->methode_livraison}}</div>
            </div>
            <div class="col-sm-4 mb-2">
              <div class="bg-secondary p-4 text-center rounded-lg"><span class="font-weight-medium text-dark mr-2">Statut :</span>Commande en attente de paiement</div>
            </div>
            <div class="col-sm-4 mb-2">
              <div class="bg-secondary p-4 text-center rounded-lg"><span class="font-weight-medium text-dark mr-2">Date de livraison :</span>{{$detailcommande->date_livraison}}</div>
            </div>
          </div>
          <!-- Progress-->
          <div class="card border-0 box-shadow-lg">
            <div class="card-body pb-2">
              <ul class="nav nav-tabs media-tabs nav-justified">
                <li class="nav-item">
                  <div class="nav-link completed">
                    <div class="media align-items-center">
                      <div class="media-tab-media mr-3"><i class="czi-bag"></i></div>
                      <div class="media-body">
                        <div class="media-tab-subtitle text-muted font-size-xs mb-1">Premier pas</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Commande passée</h6>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <div class="nav-link active">
                    <div class="media align-items-center">
                      <div class="media-tab-media mr-3"><i class="czi-settings"></i></div>
                      <div class="media-body">
                        <div class="media-tab-subtitle text-muted font-size-xs mb-1">Deuxième étape</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Commande en attente de paiement</h6>
                      </div>
                    </div>
                  </div>
                </li>
                
                <li class="nav-item">
                  <div class="nav-link">
                    <div class="media align-items-center">
                      <div class="media-tab-media mr-3"><i class="czi-package"></i></div>
                      <div class="media-body">
                        <div class="media-tab-subtitle text-muted font-size-xs mb-1">Quatrième étape</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Commande expédié</h6>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
      @endif
      @if ($detailcommande->statut == "etape2")
          <!-- Details-->
          <div class="row mb-4">
            <div class="col-sm-4 mb-2">
              <div class="bg-secondary p-4 text-center rounded-lg"><span class="font-weight-medium text-dark mr-2">Mode Livraison :</span>{{$detailcommande->methode_livraison}}</div>
            </div>
            <div class="col-sm-4 mb-2">
              <div class="bg-secondary p-4 text-center rounded-lg"><span class="font-weight-medium text-dark mr-2">Statut :</span>Contrôle qualité</div>
            </div>
            <div class="col-sm-4 mb-2">
              <div class="bg-secondary p-4 text-center rounded-lg"><span class="font-weight-medium text-dark mr-2">Date de livraison :</span>{{$detailcommande->date_livraison}}</div>
            </div>
          </div>
          <!-- Progress-->
          <div class="card border-0 box-shadow-lg">
            <div class="card-body pb-2">
              <ul class="nav nav-tabs media-tabs nav-justified">
                <li class="nav-item">
                  <div class="nav-link completed">
                    <div class="media align-items-center">
                      <div class="media-tab-media mr-3"><i class="czi-bag"></i></div>
                      <div class="media-body">
                        <div class="media-tab-subtitle text-muted font-size-xs mb-1">Premier pas</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Commande passée</h6>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <div class="nav-link">
                    <div class="media align-items-center">
                      <div class="media-tab-media mr-3"><i class="czi-settings"></i></div>
                      <div class="media-body">
                        <div class="media-tab-subtitle text-muted font-size-xs mb-1">Deuxième étape</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Commande en attente de paiement</h6>
                      </div>
                    </div>
                  </div>
                </li>
                
                <li class="nav-item">
                  <div class="nav-link">
                    <div class="media align-items-center">
                      <div class="media-tab-media mr-3"><i class="czi-package"></i></div>
                      <div class="media-body">
                        <div class="media-tab-subtitle text-muted font-size-xs mb-1">Quatrième étape</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Commande expédié</h6>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
      @endif
      @if ($detailcommande->statut == "etape3")
          <!-- Details-->
          <div class="row mb-4">
            <div class="col-sm-4 mb-2">
              <div class="bg-secondary p-4 text-center rounded-lg"><span class="font-weight-medium text-dark mr-2">Mode Livraison :</span>{{$detailcommande->methode_livraison}}</div>
            </div>
            <div class="col-sm-4 mb-2">
              <div class="bg-secondary p-4 text-center rounded-lg"><span class="font-weight-medium text-dark mr-2">Statut :</span>Produit expédié</div>
            </div>
            <div class="col-sm-4 mb-2">
              <div class="bg-secondary p-4 text-center rounded-lg"><span class="font-weight-medium text-dark mr-2">Date de livraison :</span>{{$detailcommande->date_livraison}}</div>
            </div>
          </div>
          <!-- Progress-->
          <div class="card border-0 box-shadow-lg">
            <div class="card-body pb-2">
              <ul class="nav nav-tabs media-tabs nav-justified">
                <li class="nav-item">
                  <div class="nav-link completed">
                    <div class="media align-items-center">
                      <div class="media-tab-media mr-3"><i class="czi-bag"></i></div>
                      <div class="media-body">
                        <div class="media-tab-subtitle text-muted font-size-xs mb-1">Premier pas</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Commande passée</h6>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <div class="nav-link">
                    <div class="media align-items-center">
                      <div class="media-tab-media mr-3"><i class="czi-settings"></i></div>
                      <div class="media-body">
                        <div class="media-tab-subtitle text-muted font-size-xs mb-1">Deuxième étape</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Commande en attente de paiement</h6>
                      </div>
                    </div>
                  </div>
                </li>
                
                <li class="nav-item">
                  <div class="nav-link active">
                    <div class="media align-items-center">
                      <div class="media-tab-media mr-3"><i class="czi-package"></i></div>
                      <div class="media-body">
                        <div class="media-tab-subtitle text-muted font-size-xs mb-1">Quatrième étape</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Commande expédié</h6>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
      @endif
    </div>

    {{-- <section>
      <div class="container pt-5 pb-4 pb-lg-5 mt-5 mb-md-4 mb-lg-5 mb-xl-4 mb-xxl-5">
        <h2 class="h6 pb-3 mb-2">Vos paiements</h2><br>
          <div class="row">
            <div class="col-md-6 mb-4 mb-md-0 border">
                @foreach($suivie as $transaction)
                <h2 class="h6 pb-3 mb-2">Nombre total de jour : <span class="text-primary">{{ $transaction->total_elements +  $transaction->count_non_zero_status}}</span>  jours</h2>  
                <h2 class="h6 pb-3 mb-2">Nombre jour déja payé : <span class="text-primary">{{ $transaction->count_non_zero_status - 0}}</span> jours</h2> 
                <h2 class="h6 pb-3 mb-2">Nombre jour restant : <span class="text-primary">{{ ($transaction->total_elements +  $transaction->count_non_zero_status ) -  $transaction->count_non_zero_status }}</span> jours</h2> 
              @endforeach
            </div>
            <div class="col-md-6 mb-4 mb-md-0">

            </div>
        </div>
      </div>
    </section> --}}

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
      <div class="row">
        <!-- List of items-->
        <section class="col-lg-4">
            <h2 class="h6 pb-3 mb-2 text-center">Vos paiements</h2>
                @foreach($suivie as $transaction)
                  <h2 class="h6 pb-3 mb-2">Nombre total de jour : <span class="text-primary">{{ $transaction->total_elements +  $transaction->count_non_zero_status}}</span>  jours</h2>  
                  <h2 class="h6 pb-3 mb-2">Nombre jour déja payé : <span class="text-primary">{{ $transaction->count_non_zero_status - 0}}</span> jours</h2> 
                  <h2 class="h6 pb-3 mb-2">Nombre jour restant : <span class="text-primary">{{ ($transaction->total_elements +  $transaction->count_non_zero_status ) -  $transaction->count_non_zero_status }}</span> jours</h2> 
                @endforeach
        </section>
        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0">
          <div class="cz-sidebar-static rounded-lg box-shadow-lg ml-lg-auto">
              <div class="text-center">
                <img src="../../img/QRWAVE.png" class="img-fluid" alt="...">
                <div class="card-body"><br>
                  <p class="card-text">Numéro wave :</p>
                <h5 class="card-title">07-47-37-65-62</h5>
              </div>
              
            </div>
            
          </div>
        </aside>

        <aside class="col-lg-4 pt-4 pt-lg-0">
          <h6 class="card-title text-primary text-center">Bon à savoir</h6>
            <p class="fs-6">- Utiliser votre numero de téléphone enregistré pour le paiement.</p>
            <p class="fs-6">- Dans le cas ou vous voulez utiliser un autre numero de téléphone, veuillez nous contacter avant.</p>
          
        </aside>
      </div>
    </div>
    
    @endsection