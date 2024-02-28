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
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Billets d'assistance</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">Billets d'assistance</h1>
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
                <div class="img-thumbnail rounded-circle position-relative" style="width: 6.375rem;"><span class="badge badge-warning" data-toggle="tooltip" title="Reward points">384</span><img class="rounded-circle" src="img/shop/account/avatar.jpg" alt="Susan Gardner"></div>
                <div class="media-body pl-3">
                  <h3 class="font-size-base mb-0">Susan Gardner</h3><span class="text-accent font-size-sm">s.gardner@example.com</span>
                </div>
              </div>
            </div>
            <div class="bg-secondary px-4 py-3">
              <h3 class="font-size-sm mb-0 text-muted">Tableau de bord</h3>
            </div>
            <ul class="list-unstyled mb-0">
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/orders')}}"><i class="czi-bag opacity-60 mr-2"></i>Commandes<span class="font-size-sm text-muted ml-auto">1</span></a></li>
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/wishlist',[Session('client')->ref_client])}}"><i class="czi-heart opacity-60 mr-2"></i>Favories<span class="font-size-sm text-muted ml-auto">3</span></a></li>
              <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active" href="{{url('/client/tickets')}}"><i class="czi-help opacity-60 mr-2"></i>Billets d'assistance<span class="font-size-sm text-muted ml-auto">1</span></a></li>
            </ul>
            <div class="bg-secondary px-4 py-3">
              <h3 class="font-size-sm mb-0 text-muted">Paramètres du compte</h3>
            </div>
            <ul class="list-unstyled mb-0">
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/account',[Session('client')->ref_client])}}"><i class="czi-user opacity-60 mr-2"></i>Informations sur le profil</a></li>
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/address')}}"><i class="czi-location opacity-60 mr-2"></i>Adresses</a></li>
              <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/payment')}}"><i class="czi-card opacity-60 mr-2"></i>Méthodes de payement</a></li>
              <li class="d-lg-none border-top mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/signin')}}"><i class="czi-sign-out opacity-60 mr-2"></i>se déconnecter</a></li>
            </ul>
          </div>
        </aside>
        <!-- Content  -->
        <section class="col-lg-8">
          <!-- Toolbar-->
          <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
            <div class="form-inline">
              <label class="text-light opacity-75 text-nowrap mr-2 d-none d-lg-block" for="order-sort">Trier :</label>
              <select class="form-control custom-select" id="order-sort">
                <option>TOUS</option>
                <option>Ouvrert</option>
                <option>Fermer</option>
              </select>
            </div><a class="btn btn-primary btn-sm d-none d-lg-inline-block" href="account-signin.html"><i class="czi-sign-out mr-2"></i>Sign out</a>
          </div>
          <!-- Tickets list-->
          <div class="table-responsive font-size-md">
            <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th>Objet du ticket</th>
                  <th>Date de soumission | Mis à jour</th>
                  <th>Type</th>
                  <th>Priorité</th>
                  <th>Statut</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="py-3"><a class="nav-link-style font-weight-medium" href="account-single-ticket.html">My new ticket</a></td>
                  <td class="py-3">09/27/2019 | 09/30/2019</td>
                  <td class="py-3">Website problem</td>
                  <td class="py-3"><span class="badge badge-warning m-0">High</span></td>
                  <td class="py-3"><span class="badge badge-success m-0">Open</span></td>
                </tr>
                <tr>
                  <td class="py-3"><a class="nav-link-style font-weight-medium" href="account-single-ticket.html">Another ticket</a></td>
                  <td class="py-3">08/21/2019 | 08/23/2019</td>
                  <td class="py-3">Partner request</td>
                  <td class="py-3"><span class="badge badge-info m-0">Medium</span></td>
                  <td class="py-3"><span class="badge badge-secondary m-0">Closed</span></td>
                </tr>
                <tr>
                  <td class="py-3"><a class="nav-link-style font-weight-medium" href="account-single-ticket.html">Yet another ticket</a></td>
                  <td class="py-3">11/19/2018 | 11/20/2018</td>
                  <td class="py-3">Complaint</td>
                  <td class="py-3"><span class="badge badge-danger m-0">Urgent</span></td>
                  <td class="py-3"><span class="badge badge-secondary m-0">Closed</span></td>
                </tr>
                <tr>
                  <td class="py-3"><a class="nav-link-style font-weight-medium" href="account-single-ticket.html">My old ticket</a></td>
                  <td class="py-3">06/19/2018 | 06/20/2018</td>
                  <td class="py-3">Info inquiry</td>
                  <td class="py-3"><span class="badge badge-success m-0">Low</span></td>
                  <td class="py-3"><span class="badge badge-secondary m-0">Closed</span></td>
                </tr>
              </tbody>
            </table>
          </div>
          <hr class="mb-4">
          <div class="text-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#open-ticket">Soumettre un nouveau billet</button>
          </div>
        </section>
      </div>
    </div>
    <!-- Footer-->
    <!-- Footer-->
    @endsection