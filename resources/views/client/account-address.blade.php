{{-- partie haut de page --}}
@extends('header-fooster')

@section('contenue')
<!-- Navbar-->
    <!-- Add New Address-->
    <form class="needs-validation modal fade" method="post" id="add-address" tabindex="-1" novalidate>
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ajouter une nouvelle adresse</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="address-fn">Télephone 2</label>
                  <input class="form-control" type="number" id="address-fn" required>
                  <div class="invalid-feedback">Entrez Votre Télephone svp!</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="address-ln">Adresse</label>
                  <input class="form-control" type="text" id="address-ln" required>
                  <div class="invalid-feedback">Entrez votre adresse svp!</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="address-company">Company</label>
                  <input class="form-control" type="text" id="address-company">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="address-country">Country</label>
                  <select class="custom-select" id="address-country" required>
                    <option value>Select country</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Belgium">Belgium</option>
                    <option value="France">France</option>
                    <option value="Germany">Germany</option>
                    <option value="Spain">Spain</option>
                    <option value="UK">United Kingdom</option>
                    <option value="USA">USA</option>
                  </select>
                  <div class="invalid-feedback">Please select your country!</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="address-city">City</label>
                  <input class="form-control" type="text" id="address-city" required>
                  <div class="invalid-feedback">Please fill in your city!</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="address-line1">Line 1</label>
                  <input class="form-control" type="text" id="address-line1" required>
                  <div class="invalid-feedback">Please fill in your address!</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="address-line2">Line 2</label>
                  <input class="form-control" type="text" id="address-line2">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="address-zip">ZIP code</label>
                  <input class="form-control" type="text" id="address-zip" required>
                  <div class="invalid-feedback">Please add your ZIP code!</div>
                </div>
              </div>
              <div class="col-12">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="address-primary">
                  <label class="custom-control-label" for="address-primary">Make this address primary</label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            <button class="btn btn-primary btn-shadow" type="submit">Add address</button>
          </div>
        </div>
      </div>
    </form>
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
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Addresses</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">Mes addresse</h1>
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
                <div class="img-thumbnail rounded-circle position-relative" style="width: 6.375rem;"><span class="badge badge-warning" data-toggle="tooltip" title="Reward points">{{Session::get('client')->id}}</span><img class="rounded-circle" src="{{ asset('img/shop/client/'.Session::get('client')->image_client) }}" alt="Susan Gardner"></div>
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
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/wishlist',[Session('client')->ref_client])}}"><i class="czi-heart opacity-60 mr-2"></i>Favories<span class="font-size-sm text-muted ml-auto"></span></a></li>
              <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/tickets')}}"><i class="czi-help opacity-60 mr-2"></i>Billets d'assistance<span class="font-size-sm text-muted ml-auto"></span></a></li>
            </ul>
            <div class="bg-secondary px-4 py-3">
              <h3 class="font-size-sm mb-0 text-muted">Paramètres du compte</h3>
            </div>
            <ul class="list-unstyled mb-0">
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/account',[Session('client')->ref_client])}}"><i class="czi-user opacity-60 mr-2"></i>Informations sur le profil</a></li>
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active" href="{{url('/client/address')}}"><i class="czi-location opacity-60 mr-2"></i>Adresses</a></li>
              <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/payment')}}"><i class="czi-card opacity-60 mr-2"></i>Méthodes de payement</a></li>
              <li class="d-lg-none border-top mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/signin')}}"><i class="czi-sign-out opacity-60 mr-2"></i>se déconnecter</a></li>
            </ul>
          </div>
        </aside>
        <!-- Content  -->
        <section class="col-lg-8">
          <!-- Toolbar-->
          <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-4">
            <h6 class="font-size-base text-light mb-0">Liste de vos adresses enregistrées :</h6><a class="btn btn-primary btn-sm" href="{{url('/client/logout')}}"><i class="czi-sign-out mr-2"></i>Se déconecter</a>
          </div>
          <!-- Addresses list-->
          <div class="table-responsive font-size-md">
            <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th>Address</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($affiche_adresses as $resultat)
                  <tr>
                    <td class="py-3 align-middle">{{$resultat->adresse}}, {{$resultat->commune}}, {{$resultat->ville}}, USA<span class="align-middle badge badge-info ml-2">{{$resultat->statut}}</span></td>
                    <td class="py-3 align-middle"><a class="nav-link-style mr-2" href="#" data-toggle="tooltip" title="Edit"><i class="czi-edit"></i></a><a class="nav-link-style text-danger" href="#" data-toggle="tooltip" title="Remove">
                        <div class="czi-trash"></div></a></td>
                  </tr> 
                @endforeach
               
                
              </tbody>
            </table>
          </div>
          <hr class="pb-4">
          <div class="text-sm-right"><a class="btn btn-primary" href="#add-address" data-toggle="modal">Ajouter une nouvelle adresse</a></div>
        </section>
      </div>
    </div>
   <!-- Footer-->
    <!-- Footer-->
    @endsection