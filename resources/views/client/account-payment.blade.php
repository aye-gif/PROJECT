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
              <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="czi-home"></i>Home</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Payment methods</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">My payment methods</h1>
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
              <!-- <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/tickets')}}"><i class="czi-help opacity-60 mr-2"></i>Billets d'assistance<span class="font-size-sm text-muted ml-auto">1</span></a></li> -->
            </ul>
            <div class="bg-secondary px-4 py-3">
              <h3 class="font-size-sm mb-0 text-muted">Paramètres du compte</h3>
            </div>
            <ul class="list-unstyled mb-0">
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/account',[Session('client')->ref_client])}}"><i class="czi-user opacity-60 mr-2"></i>Informations sur le profil</a></li>
              <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/address')}}"><i class="czi-location opacity-60 mr-2"></i>Adresses</a></li>
              <!-- <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active" href="{{url('/client/payment')}}"><i class="czi-card opacity-60 mr-2"></i>Méthodes de payement</a></li> -->
              <li class="d-lg-none border-top mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="{{url('/client/signin')}}"><i class="czi-sign-out opacity-60 mr-2"></i>se déconnecter</a></li>
            </ul>
          </div>
        </aside>
        <!-- Content  -->
        <section class="col-lg-8">
          <!-- Toolbar-->
          <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-4">
            <h6 class="font-size-base text-light mb-0">Le mode de paiement principal est utilisé par défaut</h6><a class="btn btn-primary btn-sm" href="{{url('/client/logout')}}"><i class="czi-sign-out mr-2"></i>Sign out</a>
          </div>
          <!-- Payment methods list-->
          <div class="table-responsive font-size-md">
            <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th>Vos cartes de crédit/débit</th>
                  <th>Nom sur la carte</th>
                  <th>Expire le</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="py-3 align-middle">
                    <div class="media align-items-center"><img class="mr-2" src="img/card-visa.png" width="39" alt="Visa">
                      <div class="media-body"><span class="font-weight-medium text-heading mr-1">Visa</span>ending in 4999<span class="align-middle badge badge-info ml-2">Primary</span></div>
                    </div>
                  </td>
                  <td class="py-3 align-middle">Susan Gardner</td>
                  <td class="py-3 align-middle">08 / 2019</td>
                  <td class="py-3 align-middle"><a class="nav-link-style mr-2" href="#" data-toggle="tooltip" title="Edit"><i class="czi-edit"></i></a><a class="nav-link-style text-danger" href="#" data-toggle="tooltip" title="Remove">
                      <div class="czi-trash"></div></a></td>
                </tr>
                <tr>
                  <td class="py-3 align-middle">
                    <div class="media align-items-center"><img class="mr-2" src="img/card-master.png" width="39" alt="MesterCard">
                      <div class="media-body"><span class="font-weight-medium text-heading mr-1">MasterCard</span>ending in 0015</div>
                    </div>
                  </td>
                  <td class="py-3 align-middle">Susan Gardner</td>
                  <td class="py-3 align-middle">11 / 2021</td>
                  <td class="py-3 align-middle"><a class="nav-link-style mr-2" href="#" data-toggle="tooltip" title="Edit"><i class="czi-edit"></i></a><a class="nav-link-style text-danger" href="#" data-toggle="tooltip" title="Remove">
                      <div class="czi-trash"></div></a></td>
                </tr>
                <tr>
                  <td class="py-3 align-middle">
                    <div class="media align-items-center"><img class="mr-2" src="img/card-paypal.png" width="39" alt="PayPal">
                      <div class="media-body"><span class="font-weight-medium text-heading mr-1">PayPal</span>s.gardner@example.com</div>
                    </div>
                  </td>
                  <td class="py-3 align-middle">&mdash;</td>
                  <td class="py-3 align-middle">&mdash;</td>
                  <td class="py-3 align-middle"><a class="nav-link-style mr-2" href="#" data-toggle="tooltip" title="Edit"><i class="czi-edit"></i></a><a class="nav-link-style text-danger" href="#" data-toggle="tooltip" title="Remove">
                      <div class="czi-trash"></div></a></td>
                </tr>
                <tr>
                  <td class="py-3 align-middle">
                    <div class="media align-items-center"><img class="mr-2" src="img/card-visa.png" width="39" alt="Visa">
                      <div class="media-body"><span class="font-weight-medium text-heading mr-1">Visa</span>ending in 6073</div>
                    </div>
                  </td>
                  <td class="py-3 align-middle">Susan Gardner</td>
                  <td class="py-3 align-middle">09 / 2021</td>
                  <td class="py-3 align-middle"><a class="nav-link-style mr-2" href="#" data-toggle="tooltip" title="Edit"><i class="czi-edit"></i></a><a class="nav-link-style text-danger" href="#" data-toggle="tooltip" title="Remove">
                      <div class="czi-trash"></div></a></td>
                </tr>
                <tr>
                  <td class="py-3 align-middle">
                    <div class="media align-items-center"><img class="mr-2" src="img/card-visa.png" width="39" alt="Visa">
                      <div class="media-body"><span class="font-weight-medium text-heading mr-1">Visa</span>ending in 9791</div>
                    </div>
                  </td>
                  <td class="py-3 align-middle">Susan Gardner</td>
                  <td class="py-3 align-middle">05 / 2021</td>
                  <td class="py-3 align-middle"><a class="nav-link-style mr-2" href="#" data-toggle="tooltip" title="Edit"><i class="czi-edit"></i></a><a class="nav-link-style text-danger" href="#" data-toggle="tooltip" title="Remove">
                      <div class="czi-trash"></div></a></td>
                </tr>
              </tbody>
            </table>
          </div>
          <hr class="pb-4">
          <div class="text-sm-right"><a class="btn btn-primary" href="#add-payment" data-toggle="modal">Ajouter un mode de paiement</a></div>
        </section>
      </div>
    </div>
    <!-- Footer-->
    <!-- Footer-->
    @endsection