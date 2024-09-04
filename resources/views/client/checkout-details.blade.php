{{-- partie haut de page --}}
@extends('header-fooster')
  @section('title')
  checkout-detail
  @endsection
@section('contenue')
{{-- partie corps de page --}}
    <!-- Page title-->
    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{url('/')}}"><i class="czi-home"></i>Acceuil</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="{{url('/plus')}}">Shop</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Détails</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">Détails</h1>
        </div>
      </div>
    </div>
    <div class="steps steps-light pt-2 pb-3 mb-5"><a class="step-item active" href="{{url('/cart')}}">
      <div class="step-progress"><span class="step-count">1</span></div>
      <div class="step-label"><i class="czi-cart"></i>Panier</div></a><a class="step-item active current" href="{{url('/cart')}}">
      <div class="step-progress"><span class="step-count">2</span></div>
      <div class="step-label"><i class="czi-user-circle"></i>Vos détails</div></a><a class="step-item" href="checkout-shipping.html">
      <div class="step-progress"><span class="step-count">3</span></div>
      <div class="step-label"><i class="czi-package"></i>Expédition</div></a><a class="step-item" href="checkout-payment.html">
      <div class="step-progress"><span class="step-count">4</span></div>
      <div class="step-label"><i class="czi-card"></i>Paiement</div></a><a class="step-item" href="checkout-review.html">
      <div class="step-progress"><span class="step-count">5</span></div>
      <div class="step-label"><i class="czi-check-circle"></i>Résumer</div></a>
  </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
      <div class="row">
        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0">
          <div class="cz-sidebar-static rounded-lg box-shadow-lg ml-lg-auto">
            <div class="widget mb-3">
              @foreach (Session::get('topCart') as $product)
                  <div class="media align-items-center pb-2 border-bottom"><a class="d-block mr-2" href="shop-single-v1.html"><img width="64" src="{{ asset('img/shop/catalog/'.$product['product_image']) }}" alt="Product"/></a>
                    <div class="media-body">
                      <h6 class="widget-product-title"><a href="{{url('/cart')}}">{{$product['product_name']}}</a></h6>
                      <div class="widget-product-meta"><span class="text-accent mr-2">{{$product['product_price']}}<small> Fcfa</small></span><span class="text-muted">x {{$product['qty']}}</span></div>
                    </div>
                  </div>
                @endforeach
            </div>
            <ul class="list-unstyled font-size-sm pb-2 border-bottom">
              <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Total :</span><span class="text-right">{{Session::get('cart')->totalPrice}}<small> Fcfa</small></span></li>
              <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Frais livraison :</span><span class="text-right">—</span></li>
            @if (Session::has('CodePromo'))
                      <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Réduction :</span><span class="text-right">- {{Session('ValeurPromo')}}</span></li>
                    @else
                      <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Réduction :</span><span class="text-right">—<small></small></span></li>
            @endif
              
                <h3 class="font-weight-normal text-center my-4">{{number_format(Session::get('cart')->totalPrice - Session::get('ValeurPromo'),0,",",".")}}<small> Fcfa</small></h3>
            @if (Session::has('CodePromo'))
            
            @else
              <form class="card-body needs-validation" action="{{url('CodePromo')}}" method="post" novalidate>
                @csrf
                <div class="form-group">
                  <input class="form-control" type="text" placeholder="Promo code" name="CodePromo" required>
                  <div class="invalid-feedback">Veuillez fournir le code promotionnel.</div>
                </div>
                <button class="btn btn-outline-primary btn-block" type="submit">Valider</button>
              </form>
            @endif
          </div>
        </aside>

        <section class="col-lg-8">
          <!-- Steps-->
          
          <!-- Autor info-->
          <div class="d-sm-flex justify-content-between align-items-center bg-secondary p-4 rounded-lg mb-grid-gutter">
            <div class="media align-items-center">
              <div class="img-thumbnail rounded-circle position-relative" style="width: 6.375rem;"><span class="badge badge-warning" data-toggle="tooltip" title="Reward points">{{Session('client')->id}}</span><img class="rounded-circle" src="{{ asset('img/shop/client/logo_client.jpg') }}" alt="{{Session('client')->nom}}"></div>
              <div class="media-body pl-3">
                <h3 class="font-size-base mb-0">{{Session('client')->nom.' '.Session('client')->prenoms}}</h3><span class="text-accent font-size-sm">{{Session('client')->email}}</span>
              </div>
            </div><a class="btn btn-light btn-sm btn-shadow mt-3 mt-sm-0" href="{{url('/client/account',[Session('client')->ref_client])}}"><i class="czi-edit mr-2"></i>Edit profile</a>
          </div>
          
              <!-- Shipping address-->
              <form class="needs-validation" action="{{url('/PlusInfo')}}" method="post">
                @csrf
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="checkout-address-1">Pénoms</label>
                        <input class="form-control" type="hidden" id="checkout-address-1" value="{{Session('client')->id}}" name="id_client">
                        <input class="form-control" type="text" id="checkout-address-1" value="{{Session('client')->prenoms}}" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="checkout-address-2">Nom</label>
                        <input class="form-control" type="text" id="checkout-address-2" value="{{Session('client')->nom}}" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="checkout-address-1">Télephone</label>
                        <input class="form-control" type="text" id="checkout-address-1" value="{{Session('client')->telephone}}" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="checkout-address-2">Télephone mobile supplémentaire  </label> <span class="text-danger">*</span>
                        <input class="form-control" type="text" id="eckout-address-2" name="telephone2" required maxlength="10">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="checkout-address-1">Adresse</label>
                        <input class="form-control" type="text" id="checkout-address-1" name="adresse" required>
                      </div>
                    </div> 
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="checkout-address-1">Ville</label>
                        <input class="form-control" type="text" id="checkout-address-1" name="ville" required>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="checkout-address-1">Commune</label>
                        <input class="form-control" type="text" id="checkout-address-1" name="commune" required>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="checkout-address-1">Quartier</label>
                        <input class="form-control" type="text" id="checkout-address-1" name="quartier" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="checkout-address-1">Information supplémentaire</label>
                        <input class="form-control" type="text" id="checkout-address-1" name="info_supplementaire" required>
                      </div>
                    </div> 
                  </div>
                  <h6 class="mb-3 py-3 border-bottom">Mon adresse</h6>
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="sauvegarde" value="oui" checked>
                    <label class="custom-control-label" for="same-address">votre adresse sera enregistre dans votre espace</label>
                  </div>
                
                  <!-- Navigation (desktop)-->
                  <div class="d-none d-lg-flex pt-4 mt-3">
                    <div class="w-50 pr-3"><a class="btn btn-secondary btn-block" href="{{url('/cart')}}"><i class="czi-arrow-left mt-sm-0 mr-1"></i><span class="d-none d-sm-inline">Retour au panier</span><span class="d-inline d-sm-none">Retour</span></a></div>
                    <div class="w-50 pl-2"><button class="btn btn-primary btn-block" type="submit"><span class="d-none d-sm-inline">Procéder à l'expédition </span><span class="d-inline d-sm-none">Retour</span><i class="czi-arrow-right mt-sm-0 ml-1"></i></button></div>
                  </div>
                  <!-- Navigation (mobile)-->
                  <div class="row d-lg-none">
                    <div class="col-lg-8">
                      <div class="d-flex pt-4 mt-3">
                        <div class="w-50 pr-3"><a class="btn btn-secondary btn-block" href="{{url('/cart')}}"><i class="czi-arrow-left mt-sm-0 mr-1"></i><span class="d-none d-sm-inline">Retour au panier</span><span class="d-inline d-sm-none">Retour</span></a></div>
                        <div class="w-50 pl-2"><button class="btn btn-primary btn-block" type="submit"><span class="d-none d-sm-inline">Procéder à l'expédition </span><span class="d-inline d-sm-none">Suivant</span><i class="czi-arrow-right mt-sm-0 ml-1"></i></a></div>
                      </div>
                    </div>
                  </div>
              </form>
              
        </section> 
      </div>
    </div>
   
    @endsection