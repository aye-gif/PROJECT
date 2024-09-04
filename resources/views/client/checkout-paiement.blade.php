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
              <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Frais Livraison :</span><span class="text-right">{{number_format(Session('valeur_livraison'),0,",",".")}}<small> Fcfa</small></span></li>
              @if (Session::has('CodePromo'))
                 <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Réduction :</span><span class="text-right">- {{Session('ValeurPromo')}}<small> Fcfa</small></span></li>
                 @else
                 <li class="d-flex justify-content-between align-items-center"><span class="mr-2">Réduction :</span><span class="text-right">—<small></small></span></li>
              @endif
            </ul>
            
            <h3 class="font-weight-normal text-center my-4">{{number_format(Session::get('cart')->totalPrice + Session::get('valeur_livraison') - Session::get('ValeurPromo'),0,",",".")}}<small> Fcfa</small></h3>
          </div>
        </aside>

        {{-- <section class="col-lg-8"><br>
          <!-- Payment methods accordion-->
          <h2 class="h6 pb-3 mb-2">Choisissez le mode de paiement</h2>
          <div class="accordion mb-2" id="payment-method" role="tablist">
          <form class="needs-validation" action="{{url('/client/MethodPay')}}" method="POST">
            @csrf
                <div class="card mb-2">
                  <div class="card-header" role="tab">
                    <h3 class="accordion-heading"><a class="collapsed" href="#points" data-toggle="collapse"><i class="czi-gift mr-2"></i>Payé <span class="text-primary">1.000 Fr</span> chaque jours<span class="accordion-indicator"></span></a></h3>
                  </div>
                  <div class="collapse" id="points" role="tabpanel">
                    <div class="card-body">
                      <div class="custom-control custom-radio mb-2">
                        <input class="custom-control-input" type="checkbox" id="courier" name="Paiement" value="1000" >
                        <label class="custom-control-label" for="courier">Sur : {{number_format(Session::get('cart')->totalPrice / 1000) }} jours    reste : {{number_format(Session::get('cart')->totalPrice - ((Session::get('cart')->totalPrice / 1000) * 1000) ) }} Fcfa  Frais livraison :  {{number_format( Session::get('valeur_livraison')) }} Fcfa</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card mb-2">
                  <div class="card-header" role="tab">
                    <h3 class="accordion-heading"><a class="collapsed" href="#points1" data-toggle="collapse"><i class="czi-gift mr-2"></i>Payé <span class="text-primary">2.000 Fr</span> chaque jours<span class="accordion-indicator"></span></a></h3>
                  </div>
                  <div class="collapse" id="points1" role="tabpanel">
                    <div class="card-body">
                      <div class="custom-control custom-radio mb-2">
                        <input class="custom-control-input" type="checkbox" id="courier1" name="Paiement" value="2000" >
                        <label class="custom-control-label" for="courier">Sur : {{number_format(Session::get('cart')->totalPrice / 2000) }} jours &nbsp;   reste : {{number_format(Session::get('cart')->totalPrice - ((Session::get('cart')->totalPrice / 2000) * 2000) ) }} Fcfa  Frais livraison :  {{number_format( Session::get('valeur_livraison')) }} Fcfa</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card mb-2">
                  <div class="card-header" role="tab">
                    <h3 class="accordion-heading"><a class="collapsed" href="#points2" data-toggle="collapse"><i class="czi-gift mr-2"></i>Payé <span class="text-primary">5.000 Fr</span> chaque jours<span class="accordion-indicator"></span></a></h3>
                  </div>
                  <div class="collapse" id="points2" role="tabpanel">
                    <div class="card-body">
                      <div class="custom-control custom-radio mb-2">
                        <input class="custom-control-input" type="checkbox" id="courier2" name="Paiement" value="5000" >
                        <label class="custom-control-label" for="courier">Sur : {{number_format(Session::get('cart')->totalPrice / 5000) }} jours    reste : {{number_format((Session::get('cart')->totalPrice - ((Session::get('cart')->totalPrice / 5000) * 5000)) ) }} Fcfa  Frais livraison :  {{number_format( Session::get('valeur_livraison')) }} Fcfa</label>
                      </div>
                    </div>
                  </div>
                </div>
              
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
        </section> --}}

        <section class="col-lg-8">
          <!-- Shipping methods table-->
          <h2 class="h6 pb-3 mb-2">Choisissez le mode de paiement</h2>
          <form class="needs-validation" action="{{url('/client/MethodPay')}}" method="post">
            @csrf
              <div class="table-responsive">
                  <table class="table table-hover font-size-sm border-bottom">
                    <thead>
                      <tr>
                        <th class="align-middle"></th>
                        <th class="align-middle">Montant à payé</th>
                        <th class="align-middle">Nombre de jours</th>
                        <th class="align-middle"></th>
                      </tr>
                    </thead>
                    <tbody>
                          <tr>
                            <td>
                              <div class="custom-control custom-radio mb-4">
                                <input class="custom-control-input" type="radio" id="courier" name="Paiement" value="1000" checked>
                                <label class="custom-control-label" for="courier"></label>
                              </div>
                            </td>
                            <td class="align-middle"><span class="text-primary font-weight h5">1.000 Fcfa</span><br><span class="text-muted">All addresses (default zone), United States &amp; Canada</span></td>
                            <td class="align-middle">{{number_format(floor(Session::get('cart')->totalPrice / 1000)) }} jours</td>
                            <td class="align-middle">+ {{ Session::get('cart')->totalPrice % 1000 }} Fcfa</td>
                          </tr>
                          <tr>
                            <td>
                              <div class="custom-control custom-radio mb-4">
                                <input class="custom-control-input" type="radio" id="local" name="Paiement" value="2000">
                                <label class="custom-control-label" for="local"></label>
                              </div>
                            </td>
                            <td class="align-middle"><span class="text-primary font-weight h5">2.000 Fcfa</span><br><span class="text-muted">All addresses (default zone), United States &amp; Canada</span></td>
                            <td class="align-middle">{{number_format(floor(Session::get('cart')->totalPrice / 2000)) }} jours</td>
                            <td class="align-middle">+ {{ Session::get('cart')->totalPrice % 2000 }} Fcfa</td>
                          </tr>
                          <tr>
                            <td>
                              <div class="custom-control custom-radio mb-4">
                                <input class="custom-control-input" type="radio" id="local2" name="Paiement" value="5000">
                                <label class="custom-control-label" for="local2"></label>
                              </div>
                            </td>
                            <td class="align-middle"><span class="text-primary font-weight h5">5.000 Fcfa</span><br><span class="text-muted">All addresses (default zone), United States &amp; Canada</span></td>
                            <td class="align-middle">{{number_format(floor(Session::get('cart')->totalPrice / 5000)) }} jours</td>
                            <td class="align-middle">+ {{ Session::get('cart')->totalPrice % 5000 }} Fcfa</td>
                          </tr>
                      
                    </tbody>
                  </table>
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