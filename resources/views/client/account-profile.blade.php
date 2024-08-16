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
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Informations sur le profil</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">Informations sur le profil</h1>
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
                <div class="img-thumbnail rounded-circle position-relative" style="width: 6.375rem;"><span class="badge badge-warning" data-toggle="tooltip" title="Reward points">{{Session::get('client')->id}}</span><img class="rounded-circle" src="{{ asset('img/shop/client/'.$affiche_info_client->image_client) }}" alt="Susan Gardner"></div>
                <div class="media-body pl-3">
                  <h3 class="font-size-base mb-0">{{$affiche_info_client->nom}}</h3><span class="text-accent font-size-sm">{{$affiche_info_client->email}}</span>
                </div>
              </div>
            </div>
            <div class="bg-secondary px-4 py-3">
              <h3 class="font-size-sm mb-0 text-muted">Tableau de bord</h3>
            </div>
            <ul class="list-unstyled mb-0">
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/orders')}}"><i class="czi-bag opacity-60 mr-2"></i>Commandes<span class="font-size-sm text-muted ml-auto"></span></a></li>
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/wishlist',[Session('client')->id])}}"><i class="czi-heart opacity-60 mr-2"></i>Favories<span class="font-size-sm text-muted ml-auto"></span></a></li>
              <!-- <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/tickets')}}"><i class="czi-help opacity-60 mr-2"></i>Billets d'assistance<span class="font-size-sm text-muted ml-auto"></span></a></li> -->
            </ul>
            <div class="bg-secondary px-4 py-3">
              <h3 class="font-size-sm mb-0 text-muted">Paramètres du compte</h3>
            </div>
            <ul class="list-unstyled mb-0">
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active" href="{{url('/client/account')}}"><i class="czi-user opacity-60 mr-2"></i>Informations sur le profil</a></li>
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/address')}}"><i class="czi-location opacity-60 mr-2"></i>Adresses</a></li>
              <!-- <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/payment')}}"><i class="czi-card opacity-60 mr-2"></i>Méthodes de payement</a></li> -->
              <li class="d-lg-none border-top mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/logout')}}"><i class="czi-sign-out opacity-60 mr-2"></i>se déconnecter</a></li>
            </ul>
          </div>
        </aside>
        <!-- Content  -->
        <section class="col-lg-8">
          <!-- Toolbar-->
          <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
            <h6 class="font-size-base text-light mb-0">Mettez à jour les détails de votre profil ci-dessous :</h6><a class="btn btn-primary btn-sm" href="{{url('/client/logout')}}"><i class="czi-sign-out mr-2"></i>se déconnecter</a>
          </div>
          @if (Session::has('validate'))
              <div class="alert alert-success">
                {{Session::get('validate')}}
              </div>
           @endif
          <!-- Profile form-->
          <form action="{{ url('client/ModifInfoClient', [$affiche_info_client->id] ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="bg-secondary rounded-lg p-4 mb-4">
              <div class="media align-items-center"><img src="{{ asset('img/shop/client/'.$affiche_info_client->image_client) }}" width="90" alt="Susan Gardner">
                <div class="mb-3">
                  <label for="formFile" class="form-label">Extension disponible : .jpeg, .jpg, png</label>
                  <input class="form-control" type="file" id="formFile" name="image_client" accept="image/jpeg, image/png, image/gif">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-fn">Nom de famille</label>
                  <input class="form-control" type="text" name="nom" id="account-fn" value="{{$affiche_info_client->nom}}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-ln">Prénoms</label>
                  <input class="form-control" type="text" name="prenoms" id="account-ln" value="{{$affiche_info_client->prenoms}}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-email">Email</label>
                  <input class="form-control" type="email" name="email" id="account-email" value="{{$affiche_info_client->email}}" disabled>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-phone">Télephone</label>
                  <input class="form-control" type="tel" name="telephone" id="account-phone" value="{{$affiche_info_client->telephone}}" required maxlength="10">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="account-pass">Password</label>
                  <div class="password-toggle">
                    <input class="form-control" type="password" id="account-pass" disabled>
                    <label class="password-toggle-btn">
                      <input class="custom-control-input" type="checkbox"><i class="czi-eye password-toggle-indicator"></i><span class="sr-only">Show password</span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <hr class="mt-2 mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                  <div class="custom-control custom-checkbox d-block">
                    <input class="custom-control-input" type="checkbox" id="subscribe_me" checked>
                    <label class="custom-control-label" for="subscribe_me">Abonnez-moi à la newsletter</label>
                  </div>
                  <button class="btn btn-primary mt-3 mt-sm-0" type="submit" type="button">Mettre à jour le profil</button>
                </div>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
    <!-- Footer-->
    <!-- Footer-->
    @endsection