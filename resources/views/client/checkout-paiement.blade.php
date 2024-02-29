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
              <li class="breadcrumb-item text-nowrap"><a href="{{url('/plus')}}">Shop</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Paiement</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">Paiement</h1>
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
      <div class="step-label"><i class="czi-package"></i>Expédition</div></a><a class="step-item step-item active current" href="{{url('/client/shipping')}}">
      <div class="step-progress"><span class="step-count">4</span></div>
      <div class="step-label"><i class="czi-card"></i>Paiement</div></a><a class="step-item">
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
              <h2 class="widget-title text-center">Récapitulatif de la commande</h2>
                @foreach (Session::get('topCart') as $product)
                  <div class="media align-items-center pb-2 border-bottom"><a class="d-block mr-2" href="shop-single-v1.html"><img width="64" src="{{ asset('img/shop/catalog/'.$product['product_image']) }}" alt="Product"/></a>
                    <div class="media-body">
                      <h6 class="widget-product-title"><a href="{{url('/cart')}}">{{$product['product_name']}}</a></h6>
                      <div class="widget-product-meta"><span class="text-accent mr-2">{{number_format($product['product_price'],0,",",".")}}<small> Fcfa</small></span><span class="text-muted">x {{$product['qty']}}</span></div>
                    </div>
                  </div>
                @endforeach
            </div>
            <ul class="list-unstyled font-size-sm pb-2 border-bottom">
              <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Total :</span><span class="text-right">{{number_format(Session::get('cart')->totalPrice,0,",",".")}}<small> Fcfa</small></span></li>
              <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Frais Livraison :</span><span class="text-right">{{Session('valeur_livraison')}}<small> Fcfa</small></span></li>
              @if (Session::has('CodePromo'))
                 <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Réduction :</span><span class="text-right">- {{Session('ValeurPromo')}}<small> Fcfa</small></span></li>
                 @else
                 <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Réduction :</span><span class="text-right">—<small></small></span></li>
              @endif
            </ul>
            
            <h3 class="font-weight-normal text-center my-4">{{number_format(Session::get('cart')->totalPrice + Session::get('valeur_livraison') - Session::get('ValeurPromo'),0,",",".")}}<small> Fcfa</small></h3>
            {{-- @if (Session::has('CodePromo'))
            
            @else
                @if (Session::has('codevalid'))
                    <div class="alert alert-success text-center">
                      {{Session::get('codevalid')}}
                    </div>
                @endif
                @if (Session::has('codenonvalid'))
                    <div class="alert alert-danger text-center">
                      {{Session::get('codenonvalid')}}
                    </div>
                @endif
                <form class="card-body needs-validation" action="{{url('/CodePromo')}}" method="post" novalidate>
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
          <!-- Payment methods accordion-->
          <h2 class="h6 pb-3 mb-2">Choisissez le mode de paiement</h2>
          <div class="accordion mb-2" id="payment-method" role="tablist">
          <form class="needs-validation" action="{{url('/client/MethodPay')}}" method="POST">
            @csrf
                <div class="card">
                  <div class="card-header" role="tab">
                    <h3 class="accordion-heading"><a class="collapsed" href="#points" data-toggle="collapse"><i class="czi-gift mr-2"></i>Payé cash à la livraison<span class="accordion-indicator"></span></a></h3>
                  </div>
                  <div class="collapse" id="points" data-parent="#payment-method" role="tabpanel">
                    <div class="card-body">
                      <div class="custom-control custom-radio mb-4">
                        <input class="custom-control-input" type="radio" id="courier" name="Paiement" value="Cash" checked>
                        <label class="custom-control-label" for="courier">régler votre commande dés reception.</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="card">
                  <div class="card-header" role="tab">
                    <h3 class="accordion-heading"><a class="collapsed" href="#paypal" data-toggle="collapse"><i class="czi-paypal mr-2 align-middle"></i>Payer avec PayPal<span class="accordion-indicator"></span></a></h3>
                  </div>
                  <div class="collapse" id="paypal" data-parent="#payment-method" role="tabpanel">
                    <div class="card-body font-size-sm">
                      <div class="custom-control custom-checkbox d-block">
                        <input class="custom-control-input" type="checkbox" id="use_points" name="Paiement" value="PayPal">
                        <label class="custom-control-label" for="use_points">régler votre commande a partir d'un compte PayPal.</label>
                      </div>
                    </div>
                  </div>
                </div>  -->
                <!-- <div class="card">
                  <div class="card-header" role="tab">
                    <h3 class="accordion-heading"><a href="#card" data-toggle="collapse"><i class="czi-card font-size-lg mr-2 mt-n1 align-middle"></i>Payez a partir d'un compte mobile money<span class="accordion-indicator"></span></a></h3>
                  </div>
                  <div class="collapse show" id="card" data-parent="#payment-method" role="tabpanel">
                    <div class="card-body">
                      <img height="50" width="500" src="https://docs.cinetpay.com/images/latest_ci1.webp" alt="Logo CinetPay">
                      <div class="card-wrapper"></div>
                      <div class="custom-control custom-radio mb-4">
                        <input class="custom-control-input" type="radio" id="local" name="Paiement" value="Mobile Money">
                        <a class="btn btn-danger" href="{{url('/client/cinetpay')}}">Passer au paiement</a>
              
                      </div>
                    </div>
                  </div>
                </div> -->
              
              </div>
              <!-- Navigation (desktop)-->
              <div class="d-none d-lg-flex pt-4">
                <div class="w-50 pr-3"><a class="btn btn-secondary btn-block" href="{{url('/client/shipping')}}"><i class="czi-arrow-left mt-sm-0 mr-1"></i><span class="d-none d-sm-inline">Retour à Expédition</span><span class="d-inline d-sm-none">Retour</span></a></div>
                <div class="w-50 pl-2"><button class="btn btn-primary btn-block" type="submit"><span class="d-none d-sm-inline">Vérifiez votre commande</span><span class="d-inline d-sm-none">Vérifier la commande</span><i class="czi-arrow-right mt-sm-0 ml-1"></i></button></div>
              </div>
              <!-- Navigation (mobile)-->
              <div class="row d-lg-none">
                <div class="col-lg-8">
                  <div class="d-flex pt-4 mt-3">
                    <div class="w-50 pr-3"><a class="btn btn-secondary btn-block" href="{{url('/client/shipping')}}"><i class="czi-arrow-left mt-sm-0 mr-1"></i><span class="d-none d-sm-inline">Retour à Expédition</span><span class="d-inline d-sm-none">Retour</span></a></div>
                    <div class="w-50 pl-2"><button class="btn btn-primary btn-block" type="submit"><span class="d-none d-sm-inline">Vérifiez votre commande</span><span class="d-inline d-sm-none">Vérifier la commande</span><i class="czi-arrow-right mt-sm-0 ml-1"></i></button></div>
                  </div>
                </div>
              </div>
            </form>
        </section>
        
      </div>
    </div>

    @endsection