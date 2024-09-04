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
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{'/'}}"><i class="czi-home"></i>Acceuil</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="{{'/plus'}}">Shop</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Cart</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">Votre panier</h1>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
      <div class="row">
        <!-- List of items-->
        <section class="col-lg-8">
          <div class="d-flex justify-content-between align-items-center pt-3 pb-2 pb-sm-5 mt-1">
            <h2 class="h6 text-light mb-0">Produits</h2><a class="btn btn-outline-primary btn-sm pl-2" href="{{'/'}}"><i class="czi-arrow-left mr-2"></i>Continuer vos achats</a>
          </div>
          @if (Session::has('topCart'))
              @foreach (Session::get('topCart') as $resultat)
                  <!-- Item-->
                    <div class="d-sm-flex justify-content-between align-items-center my-4 pb-3 border-bottom">
                      <div class="media media-ie-fix d-block d-sm-flex align-items-center text-center text-sm-left"><a class="d-inline-block mx-auto mr-sm-4" href="shop-single-v1.html" style="width: 10rem;"><img src="{{ asset('img/shop/catalog/'.$resultat['product_image']) }}" alt="Product"></a>
                        <div class="media-body pt-2">
                          <h3 class="product-title font-size-base mb-2"><a href="shop-single-v1.html">{{$resultat['product_name']}}</a></h3>
                          <div class="font-size-sm"><span class="text-muted mr-2">Taille :</span>{{$resultat['product_taille_article']}}</div>
                          <div class="font-size-sm"><span class="text-muted mr-2">couleur :</span>{{$resultat['product_couleur']}}</div>
                          <div class="font-size-lg text-accent pt-2">{{number_format($resultat['product_price'],0,",",".")}}<small> Fcfa</small></div>
                        </div>
                      </div>
                      <form method="POST" action="{{url('cart/updateqty',[$resultat['product_id']])}}">
                        @method('PUT')
                        @csrf
                        <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 9rem;">
                          <div class="form-group mb-0">
                            <label class="font-weight-medium" for="quantity1">Quantity</label>
                            <input class="form-control" min="1" max="100" type="number" name="qty" id="quantity1" value="{{$resultat['qty']}}">
                          </div>
                          <button class="btn btn-link px-0 text-accent" type="submit"><i class="czi-loading font-size-base mr-2"></i><span class="font-size-sm">Actualiser</span></button>
                        </div>
                      </form>
                      
                      <div class="pt-1 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 9rem;">
                        <a href="{{url('cart/removeItem',[$resultat['product_id']])}}" class="btn btn-link px-0 text-danger"><i class="czi-close-circle mr-2"></i><span class="font-size-sm">Supprimer</span></a>
                      </div>
                    </div>
              @endforeach
          @endif
        </section>
        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0">
          <div class="cz-sidebar-static rounded-lg box-shadow-lg ml-lg-auto">
            <div class="text-center mb-4 pb-3 border-bottom">
              <h2 class="h6 mb-3 pb-1">SOUS-TOTAL</h2>
              @if (Session::has('topCart'))
                <h3 class="font-weight-normal">{{number_format(Session::get('cart')->totalPrice,0,",",".")}}<small> Fcfa</small></h3>              
                @else
                <h3 class="font-weight-normal">0<small> Fcfa</small></h3>
              @endif
            </div>
            {{-- <div class="form-group mb-4">
              <label class="mb-3" for="order-comments"><span class="badge badge-info font-size-xs mr-2">Note</span><span class="font-weight-medium">Commentaires supplémentaires</span></label>
              <textarea class="form-control" rows="6" id="order-comments"></textarea>
            </div> --}}
            <div class="accordion" id="order-options">
                <div class="card">
                  <div class="card-header">
                    <h3 class="accordion-heading"><a href="#promo-code" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="promo-code">Ajouter un code promo<span class="accordion-indicator"></span></a></h3>
                  </div>
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
                  <div class="collapse show" id="promo-code" data-parent="#order-options">
                    <form class="card-body needs-validation" action="{{url('CodePromo')}}" method="post" novalidate>
                      @csrf
                      <div class="form-group">
                        <input class="form-control" type="text" placeholder="Promo code" name="CodePromo" required>
                        <div class="invalid-feedback">Veuillez fournir le code promotionnel.</div>
                      </div>
                      <button class="btn btn-outline-primary btn-block" type="submit">Valider</button>
                    </form>
                  </div>
                </div>
            </div>
            @if (Session::has('topCart'))
              </div class="form-group mb-4">
                <a class="btn btn-primary btn-shadow btn-block mt-3" href="{{url('/client/checkout')}}"><i class="czi-card font-size-lg mr-2"></i> Passer à la caisse</a>
              </div>
            @endif
          </div>
        </aside>
      </div>
    </div>
@endsection
