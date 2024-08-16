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
              <li class="breadcrumb-item text-nowrap"><a href="#">Compte</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Favories</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">Mes Favories</h1>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
      <div class="row">
        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0">
          <div class="cz-sidebar-static rounded-lg box-shadow-lg px-0 pb-0 mb-5 mb-lg-0">
            <div class="px-4 mb-4">
              <div class="media align-items-center">
                <div class="img-thumbnail rounded-circle position-relative" style="width: 6.375rem;"><span class="badge badge-warning" data-toggle="tooltip" title="Reward points">{{Session::get('client')->id}}</span><img class="rounded-circle" src="{{ asset('img/shop/client/'.Session::get('client')->image_client) }}" alt="{{Session::get('client')->nom}}"></div>
                <div class="media-body pl-3">
                  <h3 class="font-size-base mb-0">{{Session::get('client')->nom}} {{Session::get('client')->prenoms}}</h3><span class="text-accent font-size-sm">{{Session::get('client')->email}}</span>
                </div>
              </div>
            </div>
            <div class="bg-secondary px-4 py-3">
              <h3 class="font-size-sm mb-0 text-muted">Tableau de bord</h3>
            </div>
            <ul class="list-unstyled mb-0">
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/orders')}}"><i class="czi-bag opacity-60 mr-2"></i>Commandes<span class="font-size-sm text-muted ml-auto"></span></a></li>
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active" href="{{url('/client/wishlist',[Session('client')->id])}}"><i class="czi-heart opacity-60 mr-2"></i>Favories<span class="font-size-sm text-muted ml-auto"></span></a></li>
              <!-- <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/tickets')}}"><i class="czi-help opacity-60 mr-2"></i>Billets d'assistance<span class="font-size-sm text-muted ml-auto"></span></a></li> -->
            </ul>
            <div class="bg-secondary px-4 py-3">
              <h3 class="font-size-sm mb-0 text-muted">Paramètres du compte</h3>
            </div>
            <ul class="list-unstyled mb-0">
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/account',[Session('client')->ref_client])}}"><i class="czi-user opacity-60 mr-2"></i>Informations sur le profil</a></li>
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/address')}}"><i class="czi-location opacity-60 mr-2"></i>Adresses</a></li>
              <li class="d-lg-none border-top mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/signin')}}"><i class="czi-sign-out opacity-60 mr-2"></i>se déconnecter</a></li>
            </ul>
          </div>
        </aside>
        <!-- Content  -->
        <section class="col-lg-8">
          <!-- Toolbar-->
          <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
            <h6 class="font-size-base text-light mb-0">Liste des articles que vous avez ajoutés à vos favories:</h6><a class="btn btn-primary btn-sm" href="{{url('/client/logout')}}"><i class="czi-sign-out mr-2"></i>Se déconnecter</a>
          </div>
          <!-- Wishlist-->
          @foreach ($affiche_article_wishlist as $resultat)
              <!-- Item-->
              <div class="d-sm-flex justify-content-between mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
                <div class="media media-ie-fix d-block d-sm-flex text-center text-sm-left"><a class="d-inline-block mx-auto mr-sm-4" href="#" style="width: 10rem;"><img src="{{ asset('img/shop/catalog/'.$resultat->image_article) }}" alt="Product"></a>
                  <div class="media-body pt-2">
                    <h3 class="product-title font-size-base mb-2"><a href="#">{{$resultat->libelle_article}}</a></h3>
                    <div class="font-size-sm"><span class="text-muted mr-2">Type :</span>{{$resultat->type_article}}</div>
                    <div class="font-size-sm"><span class="text-muted mr-2">Statut :</span>{{$resultat->statut}}</div>
                    <div class="font-size-lg text-accent pt-2">{{number_format($resultat->prix,0,",",".") }}<small> Fcfa</small></div>
                  </div>
                </div>
                <div class="pt-2 pl-sm-3 mx-auto mx-sm-0 text-center">
                  <a href="{{url('/client/wishlist/Remove',$resultat->article_id)}}" class="btn btn-outline-danger btn-sm" type="button"><i class="czi-trash mr-2"></i>Supprimer</a>
                </div>
              </div>
          @endforeach
          
        </section>
      </div>
    </div>
    <!-- Footer-->
    <!-- Footer-->
    @endsection