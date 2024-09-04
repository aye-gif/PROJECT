{{-- partie haut de page --}}
@extends('header-fooster')

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
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Résumer</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">Résumer</h1>
        </div>
      </div>
    </div>
    <!-- Steps-->
    <div class="steps steps-light pt-2 pb-3 mb-5"><a class="step-item active" href="{{url('/cart')}}">
      <div class="step-progress"><span class="step-count">1</span></div>
      <div class="step-label"><i class="czi-cart"></i>Panier</div></a><a class="step-item active current" href="{{url('/cart')}}">
      <div class="step-progress"><span class="step-count">2</span></div>
      <div class="step-label"><i class="czi-user-circle"></i>Vos détails</div></a><a class="step-item active current">
      <div class="step-progress"><span class="step-count">3</span></div>
      <div class="step-label"><i class="czi-package"></i>Expédition</div></a><a class="step-item active current" href="checkout-payment.html">
      <div class="step-progress"><span class="step-count">4</span></div>
      <div class="step-label"><i class="czi-card"></i>Paiement</div></a><a class="step-item active current" href="checkout-review.html">
      <div class="step-progress"><span class="step-count">5</span></div>
      <div class="step-label"><i class="czi-check-circle"></i>Résumer</div></a></div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
      <div class="row">
        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0">
          <div class="cz-sidebar-static rounded-lg box-shadow-lg ml-lg-auto">
            
            <ul class="list-unstyled font-size-sm pb-2 border-bottom">
              <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Total :</span><span class="text-right">{{number_format(Session::get('cart')->totalPrice,0,",",".")}}<small> Fcfa</small></span></li>
              <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Frais livraison :</span><span class="text-right">{{number_format(Session('valeur_livraison'),0,",",".")}}<small> Fcfa</small></span></li>
              @if (Session::has('CodePromo'))
                 <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Réduction :</span><span class="text-right">- {{Session('ValeurPromo')}}<small> Fcfa</small></span></li>
                 @else
                 <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Réduction :</span><span class="text-right">—<small></small></span></li>
              @endif
            </ul>
            <h3 class="font-weight-normal text-center my-4">{{number_format(Session::get('cart')->totalPrice + Session::get('valeur_livraison') - Session::get('ValeurPromo'),0,",",".")}} <small> Fcfa</small></h3>
            {{-- @if (Session::has('CodePromo'))
            
            @else
                @if (Session::has('codevalid'))
                    <div class="alert alert-success text-center">
                      {{Session::get('codevalid')}}
                    </div>
                @endif
                @if (Session::has('codenonvalid'))
                    <div class="alert alert-success text-center">
                      {{Session::get('codenonvalid')}}
                    </div>
                @endif
                <form class="card-body needs-validation" action="{{url('CodePromo')}}" method="post" novalidate>
                  @csrf
                  <div class="form-group">
                    <input class="form-control" type="text" placeholder="Promo code" name="CodePromo" required>
                    <div class="invalid-feedback">Veuillez fournir le code promotionnel.</div>
                  </div>
                  <button class="btn btn-outline-primary btn-block" type="submit">Valider</button>
                </form>
            @endif --}}
          </div>
        </aside>
        <section class="col-lg-8">
          
          <!-- Shipping methods table-->
          <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Vérifiez votre commande</h2>
        @foreach (Session::get('topCart') as $product)
          <!-- Item-->
          <div class="d-sm-flex justify-content-between my-4 pb-3 border-bottom">
            <div class="media media-ie-fix d-block d-sm-flex text-center text-sm-left"><a class="d-inline-block mx-auto mr-sm-4" href="shop-single-v1.html" style="width: 10rem;"><img src="{{ asset('img/shop/catalog/'.$product['product_image']) }}" alt="Product"></a>
              <div class="media-body pt-2">
                <h3 class="product-title font-size-base mb-2"><a href="shop-single-v1.html">{{$product['product_name']}} </a></h3>
                <div class="font-size-sm"><span class="text-muted mr-2">Taille :</span>{{$product['product_taille_article']}}</div>
                <div class="font-size-sm"><span class="text-muted mr-2">Couleur :</span>{{$product['product_couleur']}}</div>
                <div class="font-size-lg text-accent pt-2">{{number_format($product['product_price'],0,",",".")}}<small> Fcfa</small></div>
              </div>
            </div>
            <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-right" style="max-width: 9rem;">
              <p class="mb-0"><span class="text-muted font-size-sm">Quantité :</span><span>&nbsp;{{$product['qty']}}</span></p>
            </div>
          </div>
        @endforeach 
        <form class="needs-validation" action="{{url('/client/ValidateCommande')}}" method="POST"> 
          @csrf
          <!-- Client details-->
          <div class="bg-secondary rounded-lg px-4 pt-4 pb-2">
            <div class="row">
              <div class="col-sm-6">
                <h4 class="h6">Expédition à :</h4>
                <ul class="list-unstyled font-size-sm">
                  <li><span class="text-muted">Client :&nbsp;</span>{{Session('client')->nom}} {{Session('client')->prenoms}}</li>
                  <li><span class="text-muted">Adresse :&nbsp;</span>{{$affiche_address_client->ville}} , {{$affiche_address_client->commune}}</li>
                  <li><span class="text-muted">Télephone :&nbsp;</span>+225 {{Session('client')->telephone}}</li>
                  <li><span class="text-muted">Mode de livraison :&nbsp;</span>{{Session('method_livraison')}}</li>
                </ul>
                <input type="hidden" name="id_info_adresse" value="{{$affiche_address_client->id}}">
              </div>
              <div class="col-sm-6">
                <h4 class="h6">Mode de paiement :</h4>
                <ul class="list-unstyled font-size-sm">
                  <li><span class="text-muted">{{Session('MethodPay')}} Fcfa / jours &nbsp;</span></li>
                  <li><span class="text-muted">Nombre de jours : {{number_format(floor(Session::get('cart')->totalPrice / Session('MethodPay'))) }} </span></li>
                  <li><span class="text-muted">+ {{number_format(Session('reste')  ) }} Fcfa</span></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Navigation (desktop)-->
          <div class="d-none d-lg-flex pt-4">
            <div class="w-50 pr-3"><a class="btn btn-secondary btn-block" href="{{url('/client/shipping')}}"><i class="czi-arrow-left mt-sm-0 mr-1"></i><span class="d-none d-sm-inline">Retour au paiement</span><span class="d-inline d-sm-none">Retour</span></a></div>
            <div class="w-50 pl-2"><button class="btn btn-primary btn-block" type="submit"><span class="d-none d-sm-inline">Confirmer la commande</span><span class="d-inline d-sm-none">Complète</span><i class="czi-arrow-right mt-sm-0 ml-1"></i></button></div>
          </div>
          <!-- Navigation (mobile)-->
          <div class="row d-lg-none">
            <div class="col-lg-8">
              <div class="d-flex pt-4 mt-3">
                <div class="w-50 pr-3"><a class="btn btn-secondary btn-block" href="{{url('/client/shipping')}}"><i class="czi-arrow-left mt-sm-0 mr-1"></i><span class="d-none d-sm-inline">Retour au paiement</span><span class="d-inline d-sm-none">Retour</span></a></div>
                <div class="w-50 pl-2"><button class="btn btn-primary btn-block" type="submit"><span class="d-none d-sm-inline">Confirmer la commande</span><span class="d-inline d-sm-none">Complete</span><i class="czi-arrow-right mt-sm-0 ml-1"></i></a></div>
              </div>
            </div>
          </div>
        </form>
        </section>
        
      </div>
    </div>
    @endsection