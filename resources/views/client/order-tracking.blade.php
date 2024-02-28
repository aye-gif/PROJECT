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
          <h1 class="h3 text-light mb-0">Suivi de commande : <span class="h4 font-weight-normal text-light">{{$detailcommande->ref_commande}}</span></h1>
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
              <div class="bg-secondary p-4 text-center rounded-lg"><span class="font-weight-medium text-dark mr-2">Statut :</span>Commande en traitement</div>
            </div>
            <div class="col-sm-4 mb-2">
              <div class="bg-secondary p-4 text-center rounded-lg"><span class="font-weight-medium text-dark mr-2">Date de livraison :</span>{{$detailcommande->created_at}}</div>
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
                        <h6 class="media-tab-title text-nowrap mb-0">Commande en traitement</h6>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <div class="nav-link">
                    <div class="media align-items-center">
                      <div class="media-tab-media mr-3"><i class="czi-star"></i></div>
                      <div class="media-body">
                        <div class="media-tab-subtitle text-muted font-size-xs mb-1">Troisième étape</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Contrôle qualité</h6>
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
              <div class="bg-secondary p-4 text-center rounded-lg"><span class="font-weight-medium text-dark mr-2">Date de livraison :</span>{{$detailcommande->created_at}}</div>
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
                        <h6 class="media-tab-title text-nowrap mb-0">Commande en traitement</h6>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <div class="nav-link active">
                    <div class="media align-items-center">
                      <div class="media-tab-media mr-3"><i class="czi-star"></i></div>
                      <div class="media-body">
                        <div class="media-tab-subtitle text-muted font-size-xs mb-1">Troisième étape</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Contrôle qualité</h6>
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
              <div class="bg-secondary p-4 text-center rounded-lg"><span class="font-weight-medium text-dark mr-2">Date de livraison :</span>October 15, 2019</div>
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
                        <h6 class="media-tab-title text-nowrap mb-0">Commande en traitement</h6>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <div class="nav-link">
                    <div class="media align-items-center">
                      <div class="media-tab-media mr-3"><i class="czi-star"></i></div>
                      <div class="media-body">
                        <div class="media-tab-subtitle text-muted font-size-xs mb-1">Troisième étape</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Contrôle qualité</h6>
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
      
      <!-- Footer-->
      <div class="d-sm-flex flex-wrap justify-content-between align-items-center text-center pt-4">
        <div class="custom-control custom-checkbox mt-2 mr-3">
          <input class="custom-control-input" type="checkbox" id="notify-me" checked>
          <label class="custom-control-label" for="notify-me">Prévenez-moi lorsque la commande est livrée</label>
        </div>
      </div>
    </div>
    @endsection