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
              <li class="breadcrumb-item text-nowrap"><a href="#">Commandes</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page"></li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">Vos commandes</h1>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-3">
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
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active" href="{{url('/client/orders')}}"><i class="czi-bag opacity-60 mr-2"></i>Commandes<span class="font-size-sm text-muted ml-auto"></span></a></li>
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/wishlist',[Session('client')->id])}}"><i class="czi-heart opacity-60 mr-2"></i>Favories<span class="font-size-sm text-muted ml-auto"></span></a></li>
              <!-- <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/tickets')}}"><i class="czi-help opacity-60 mr-2"></i>Billets d'assistance<span class="font-size-sm text-muted ml-auto"></span></a></li> -->
            </ul>
            <div class="bg-secondary px-4 py-3">
              <h3 class="font-size-sm mb-0 text-muted">Paramètres du compte</h3>
            </div>
            <ul class="list-unstyled mb-0">
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/account',[Session('client')->ref_client])}}"><i class="czi-user opacity-60 mr-2"></i>Informations sur le profil</a></li>
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/address')}}"><i class="czi-location opacity-60 mr-2"></i>Adresses</a></li>
              <!-- <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/payment')}}"><i class="czi-card opacity-60 mr-2"></i>Méthodes de payement</a></li> -->
              <li class="d-lg-none border-top mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/signin')}}"><i class="czi-sign-out opacity-60 mr-2"></i>se déconnecter</a></li>
            </ul>
          </div>
        </aside>
        <!-- Content  -->
        <section class="col-lg-8">
          <!-- Toolbar-->
          <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
            <div class="form-inline">
              <label class="text-light opacity-75 text-nowrap mr-2 d-none d-lg-block" for="order-sort">Trier les commandes:</label>
              <select class="form-control custom-select" id="order-sort">
                <option>Tout</option>
                <option>Delivrer</option>
                <option>En cours</option>
                <option>Retardé</option>
                <option>Annulé</option>
              </select>
            </div><a class="btn btn-primary btn-sm d-none d-lg-inline-block" href="{{url('/client/logout')}}"><i class="czi-sign-out mr-2"></i>Se déconecter</a>
          </div>
          <!-- Orders list-->
          <div class="table-responsive font-size-md">
            <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th>Commande #</th>
                  <th>Date commande</th>
                  <th>Mode livraison</th>
                  <th>Methode paiement</th>
                  <th>Statut</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($affiche_commande as $resultat)
                  <tr>
                    <td class="py-3"><a class="nav-link-style font-weight-medium font-size-sm" href="#order-details" data-toggle="modal">{{$resultat->ref_commande}}</a></td>
                    <td class="py-3">{{$resultat->created_at}}</td>
                    <td class="py-3">{{$resultat->mode_livraison}}</td>
                    <td class="py-3">{{$resultat->methode_paiement}} / jours</td>
                    <td class="py-3"><span class="badge badge-info m-0">{{$resultat->statut}}</span></td>
                  </tr>
                @endforeach
                
                
              </tbody>
            </table>
          </div>
          <hr class="pb-4">
          <!-- Pagination-->
          {{-- <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#"><i class="czi-arrow-left mr-2"></i>Prev</a></li>
            </ul>
            <ul class="pagination">
              <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
              <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="sr-only">(current)</span></span></li>
              <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
              <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
              <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>
              <li class="page-item d-none d-sm-block"><a class="page-link" href="#">5</a></li>
            </ul>
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#" aria-label="Next">Next<i class="czi-arrow-right ml-2"></i></a></li>
            </ul>
          </nav> --}}
        </section>
      </div>
    </div>
   <!-- Footer-->
    <!-- Footer-->
    @endsection