<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <title>
        @yield('title')
    </title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Cartzilla - Bootstrap E-commerce Template">
    <meta name="keywords" content="bootstrap, shop, e-commerce, market, modern, responsive,  business, mobile, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="Createx Studio">
    <meta charset="utf-8">
    <meta name="csrf-token" content="content">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="../../apple-touch-icon.png">
    <link rel="icon" type="img/png" sizes="32x32" href="{{asset('../../favicon-32x32.png')}}">
    <link rel="icon" type="img/png" sizes="16x16" href="{{asset('../../favicon-16x16.png')}}">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#fe6a6a" href="../../safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
  
    <link rel="shortcut icon" href="../../img/LogoVSmini.png">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="{{ url('../../vendor/simplebar/dist/simplebar.min.css') }}"/>
    <link rel="stylesheet" media="screen" href="{{ url('../../vendor/tiny-slider/dist/tiny-slider.css') }}"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{ url('../../css/theme.min.css') }}">
    <script src="https://cdn.cinetpay.com/seamless/main.js" type="text/javascript"></script>
  </head>
  <!-- Body-->
  <body class="toolbar-enabled">
     <!-- ma commande-->
     <div class="modal fade" id="signin-modal2" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="card-body needs-validation" action="{{url('/client/ordercommande/')}}" method="post" novalidate>
          @csrf
            <div class="modal-content">
              <div class="modal-header">
                <ul class="nav nav-tabs card-header-tabs" role="tablist">
                  <li class="nav-item"><a class="nav-link active" href="#signin-tab" data-toggle="tab" role="tab" aria-selected="true">Ma commande</a></li>
                </ul>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body tab-content py-4">
                  <div class="form-group">
                    <label for="si-password">Numéro commande</label>
                      <input class="form-control" type="text" name="NumeroCommande"  required>
                  </div>
                  <button class="btn btn-primary btn-block btn-shadow" type="submit">Valider</button>
               </div>
            </div>
        </form>
      </div>
    </div>
    
    <!-- Navbar-->
    <!-- Navbar 3 Level (Light)-->
    <header class="box-shadow-sm">
      <!-- Topbar-->
      <div class="topbar topbar-dark bg-dark">
        <div class="container">
          <div class="topbar-text dropdown d-md-none"><a class="topbar-link dropdown-toggle" href="#">(+225) 07 47 376 562</a>
            
          </div>
          <div class="topbar-text text-nowrap d-none d-md-inline-block"><i class="czi-support"></i><span class="text-muted mr-1">Tèl</span><a class="topbar-link" href="tel:00331697720">(+225) 07 47 376 562</a></div>
          <div class="cz-carousel cz-controls-static">
            <div class="cz-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;nav&quot;: false}">
              <div class="topbar-text"><a class="navbar-tool" href="#signin-modal2" data-toggle="modal"> <i class="czi-location"></i>Ma commande</a></div>
            </div>
          </div>
            <div class="topbar-text dropdown disable-autohide"><a class="topbar-link"><img class="mr-2" width="20" src="../../img/flags/ci.png" alt="français"/>CI / Fcfa</a>
              {{-- <ul class="dropdown-menu dropdown-menu-right">
                <li class="dropdown-item">
                  <select class="custom-select custom-select-sm">
                    <option value="usd">$ USD</option>
                    <option value="eur">€ EUR</option>
                    <option value="ukp">£ UKP</option>
                    <option value="jpy">¥ JPY</option>
                  </select>
                </li>
                <li><a class="dropdown-item pb-1" href="#"><img class="mr-2" width="20" src="img/flags/fr.png" alt="Français"/>Français</a></li>
                <li><a class="dropdown-item pb-1" href="#"><img class="mr-2" width="20" src="img/flags/de.png" alt="Deutsch"/>Deutsch</a></li>
                <li><a class="dropdown-item" href="#"><img class="mr-2" width="20" src="img/flags/it.png" alt="Italiano"/>Italiano</a></li>
              </ul> --}}
            </div>
          </div>
        </div>
      </div>
      
      <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
      <div class="navbar-sticky bg-light">
        <div class="navbar navbar-expand-lg navbar-light">
          <div class="container"><a class="navbar-brand d-none d-sm-block mr-3 flex-shrink-0" href="{{url('/')}}" style="min-width: 7rem;"><img width="142" src="../../img/logo.png" alt="VirtuallStore"/></a><a class="navbar-brand d-sm-none mr-2" href="{{url('/')}}" style="min-width: 4.625rem;"><img width="70" src="../../img/LogoVSmini.png" alt="VirtuallStore"/></a>
            
                <div class="input-group-overlay d-none d-lg-flex mx-4">
                  <form action="{{ url('recherche') }}" method="POST" class="input-group">
                      @csrf
                        <input class="form-control appended-form-control" type="text" name="terme" placeholder="Rechercher un article">
                        <div class="input-group-append-overlay"><button class="btn btn-outline-primary" type="submit" ><i class="czi-search"></i></button></div>
                  </form>
                </div>
            

            <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button><a class="navbar-tool navbar-stuck-toggler" href="#"><span class="navbar-tool-tooltip">Menu</span>
                <div class="navbar-tool-icon-box">
                  <i class="navbar-tool-icon czi-menu"></i>
                </div></a>
                @if (Session::has('client'))
                <a class="navbar-tool d-none d-lg-flex" href="{{url('/client/account/favories',[Session('client')->ref_client])}}"><span class="navbar-tool-tooltip">Favories</span>
                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon czi-heart"></i></div></a>
                    <a class="navbar-tool ml-1 ml-lg-0 mr-n1 mr-lg-2" href="{{url('/client/account',[Session('client')->ref_client])}}">
                      <div class="navbar-tool-icon-box"><i class="navbar-tool-icon czi-user"></i></div>
                      <div class="navbar-tool-text ml-n3"><small>Bonjour,</small>{{Session('client')->nom}}</div>
                    </a>

                    @else
                    <a class="navbar-tool ml-1 ml-lg-0 mr-n1 mr-lg-2" href="{{url('/client/signin')}}">
                      <div class="navbar-tool-icon-box"><i class="navbar-tool-icon czi-user"></i></div>
                      <div class="navbar-tool-text ml-n3"><small>Bonjour, Conexion</small>Mon compte</div>
                    </a>
                 </div>
                @endif
                
                    @if (Session::has('topCart'))
                      <div class="navbar-tool dropdown ml-3"><a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="{{url('/cart')}}"><span class="navbar-tool-label">{{count(Session::get('topCart') )}}</span><i class="navbar-tool-icon czi-cart"></i></a><a class="navbar-tool-text" href="{{url('/cart')}}"><small>Mon panier</small>{{number_format(Session::get('cart')->totalPrice,0,",",".")}} Fcfa</a>
                        <!-- Cart dropdown-->
                      <div class="dropdown-menu dropdown-menu-right" style="width: 20rem;">
                        <div class="widget widget-cart px-3 pt-2 pb-3">
                          <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                            
                                @foreach (Session::get('topCart') as $product)
                                  <div class="widget-cart-item pb-2 border-bottom">
                                    <a  href="{{url('cart/removeItem',[$product['product_id']])}}" class="close text-danger" type="button" aria-label="Remove"><span aria-hidden="true">&times;</span></a>
                                    <div class="media align-items-center"><a class="d-block mr-2" href="{{url('/cart')}}"><img width="64" src="{{ asset('img/shop/catalog/'.$product['product_image']) }}" alt="Product"/></a>
                                      <div class="media-body">
                                        <h6 class="widget-product-title"><a href="{{url('/cart')}}">{{$product['product_name']}}</a></h6>
                                        <div class="widget-product-meta"><span class="text-accent mr-2">{{$product['product_price']}}<small> fr</small></span><span class="text-muted">x {{$product['qty']}}</span></div>
                                      </div>
                                    </div>
                                  </div>
                                @endforeach
                              
                            
                          </div>
                          <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                            <div class="font-size-sm mr-2 py-2"><span class="text-muted">Total :</span><span class="text-accent font-size-base ml-1">{{number_format(Session::get('cart')->totalPrice,0,",",".")}}<small> Fcfa</small></span></div><a class="btn btn-outline-secondary btn-sm" href="{{url('/cart')}}">Mon panier<i class="czi-arrow-right ml-1 mr-n1"></i></a>
                          </div><a class="btn btn-primary btn-sm btn-block" href="{{url('/cart')}}"><i class="czi-card mr-2 font-size-base align-middle"></i>Caisse</a>
                        </div>
                      </div>
                    @else

                          <div class="navbar-tool dropdown ml-3"><a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="{{url('/cart')}}"><span class="navbar-tool-label">0</span><i class="navbar-tool-icon czi-cart"></i></a><a class="navbar-tool-text" href="{{url('/cart')}}"><small>Mon panier</small>0 Fcfa</a>
                            <!-- Cart dropdown-->
                            <div class="dropdown-menu dropdown-menu-right" style="width: 20rem;">
                              <div class="widget widget-cart px-3 pt-2 pb-3">
                                <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                                    <br><br><br><br><br>
                                  <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                                    <div class="font-size-sm mr-2 py-2"><span class="text-muted">Total :</span><span class="text-accent font-size-base ml-1">0<small> Fcfa</small></span></div><a class="btn btn-outline-secondary btn-sm" href="{{url('/cart')}}">Mon panier<i class="czi-arrow-right ml-1 mr-n1"></i></a>
                                  </div>
                                  <a class="btn btn-primary btn-sm btn-block" href="{{url('/cart')}}"><i class="czi-card mr-2 font-size-base align-middle"></i>Caisse</a>

                                </div>
                              </div>
                            </div>
                          </div>
                    @endif  
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
          <div class="container">
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <!-- Search-->
              <div class="input-group-overlay d-lg-none my-3">
                <form action="{{ url('recherche') }}" method="POST" class="input-group">
                  @csrf
                  <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-search"></i></span></div>
                  <input class="form-control prepended-form-control" type="text" name="terme"  placeholder="Rechercher des produits">
                  <div class="input-group-append-overlay"><button class="btn btn-outline-primary" type="submit" ><i class="czi-search"></i></button></div>
                </form>
              </div>
                  <!-- Departments menu-->
                  <!-- <ul class="navbar-nav mega-nav pr-lg-2 mr-lg-2">
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle pl-0" href="#" data-toggle="dropdown"><i class="czi-view-grid mr-2"></i>Departments</a>
                      <div class="dropdown-menu px-2 pl-0 pb-4">
                        <div class="d-flex flex-wrap flex-md-nowrap">
                          <div class="mega-dropdown-column pt-4 px-3">
                            <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="#"><img src="../../img/shop/departments/01.jpg" alt="Shoes"/></a>
                              <h6 class="font-size-base mb-2">FEMME</h6>
                              <ul class="widget-list">
                                <li class="widget-list-item"><a class="widget-list-link" href="#">BASKET</a></li>
                                <li class="widget-list-item"><a class="widget-list-link" href="#">CHAINES</a></li>
                                <li class="widget-list-item"><a class="widget-list-link" href="#">ROBES</a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="mega-dropdown-column pt-4 px-3">
                            <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="#"><img src="../../img/shop/departments/02.jpg" alt="Shoes"/></a>
                              <h6 class="font-size-base mb-2">HOMME</h6>
                              <ul class="widget-list">
                                <li class="widget-list-item"><a class="widget-list-link" href="#">MONTRE</a></li>
                                <li class="widget-list-item"><a class="widget-list-link" href="#">PENTALON</a></li>
                                <li class="widget-list-item"><a class="widget-list-link" href="#">TRICOT</a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="mega-dropdown-column pt-4 px-3">
                            <div class="widget widget-links"><a class="d-block overflow-hidden rounded-lg mb-3" href="#"><img src="../../img/shop/departments/03.jpg" alt="Shoes"/></a>
                              <h6 class="font-size-base mb-2">ENFANT</h6>
                              <ul class="widget-list">
                                <li class="widget-list-item"><a class="widget-list-link" href="#">TRICOT</a></li>
                                <li class="widget-list-item"><a class="widget-list-link" href="#">CULOTTE</a></li>
                                <li class="widget-list-item"><a class="widget-list-link" href="#">CHEMISE</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                    </li>
                  </ul> -->
              <!-- Primary menu-->
                  <!-- <ul class="navbar-nav">
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="{{url('/')}}">Acceuil</a>
                      
                    </li>       
                  </ul> -->
            </div>
          </div>
        </div>
      </div>
    </header>

@yield('contenue')

    <!-- Footer-->
    <!-- Footer-->
    <footer class="bg-dark pt-5">
        
      <div class="pt-5 bg-darker">
        <div class="container">
          <div class="row pb-2">
            <div class="col-md-6 text-center text-md-left mb-4">
              <div class="text-nowrap mb-4"><a class="d-inline-block align-middle mt-n1 mr-3" href="#"><img class="d-block" width="117" src="../../img/LogoVSmini.png" alt="Virtuall Store"/></a>
                <div class="btn-group dropdown disable-autohide">
                  <button class="btn btn-outline-light border-light btn-sm"><img class="mr-2" width="20" src="../../img/flags/ci.png" alt="Cote d'ivoire"/>CI / Fcfa
                  </button>
                  {{-- <ul class="dropdown-menu">
                    <li class="dropdown-item">
                      <select class="custom-select custom-select-sm">
                        <option value="usd">$ USD</option>
                        <option value="eur">€ EUR</option>
                        <option value="ukp">£ UKP</option>
                        <option value="jpy">¥ JPY</option>
                      </select>
                    </li>
                    <li><a class="dropdown-item pb-1" href="#"><img class="mr-2" width="20" src="img/flags/fr.png" alt="Français"/>Français</a></li>
                    <li><a class="dropdown-item pb-1" href="#"><img class="mr-2" width="20" src="img/flags/de.png" alt="Deutsch"/>Deutsch</a></li>
                    <li><a class="dropdown-item" href="#"><img class="mr-2" width="20" src="img/flags/it.png" alt="Italiano"/>Italiano</a></li>
                  </ul> --}}
                </div>
              </div>
              <div class="widget widget-links widget-light">
                <ul class="widget-list d-flex flex-wrap justify-content-center justify-content-md-start">
                  <li class="widget-list-item mr-4"><a class="widget-list-link" href="#">Prises électriques</a></li>
                  <li class="widget-list-item mr-4"><a class="widget-list-link" href="#">Affiliées</a></li>
                  <li class="widget-list-item mr-4"><a class="widget-list-link" href="#">Support</a></li>
                  <li class="widget-list-item mr-4"><a class="widget-list-link" href="#">Confidentialité</a></li>
                  <li class="widget-list-item mr-4"><a class="widget-list-link" href="#">Conditions d'utilisation</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-6 text-center text-md-right mb-4">
              <div class="mb-3">
                <a class="social-btn sb-light sb-twitter ml-2 mb-2" href="#"><i class="czi-twitter"></i></a>
                <a class="social-btn sb-light sb-facebook ml-2 mb-2" href="#"><i class="czi-facebook"></i></a>
                <a class="social-btn sb-light sb-instagram ml-2 mb-2" href="#"><i class="czi-instagram"></i></a>
                <a class="social-btn sb-light sb-pinterest ml-2 mb-2" href="#"><i class="czi-pinterest"></i></a>
                <a class="social-btn sb-light sb-youtube ml-2 mb-2" href="#"><i class="czi-youtube"></i></a>
              </div> 
              <img class="d-inline-block" width="187" src="../../img/cards-alt.png" alt="Payment methods"/>
            </div>
          </div>
          <div class="pb-4 font-size-xs text-light opacity-50 text-center text-md-left">© Tous les droits sont réservés. Faite par <a class="text-light" href="" target="_blank" rel="noopener">OAAA GROUP</a></div>
        </div>
      </div>
    </footer>
    <!-- Toolbar for handheld devices-->
    <div class="cz-handheld-toolbar">
      <div class="d-table table-fixed w-100">
        <a class="d-table-cell cz-handheld-toolbar-item" href="#navbarCollapse" data-toggle="collapse" onclick="window.scrollTo(0, 0)"><span class="cz-handheld-toolbar-icon"><i class="czi-menu"></i></span><span class="cz-handheld-toolbar-label">Menu</span></a>
        @if (Session::has('topCart'))
          <a class="d-table-cell cz-handheld-toolbar-item" href="{{url('/cart')}}"><span class="cz-handheld-toolbar-icon"><i class="czi-cart"></i><span class="badge badge-primary badge-pill ml-1">{{count(Session::get('topCart') )}}</span></span><span class="cz-handheld-toolbar-label">{{number_format(Session::get('cart')->totalPrice,0,",",".")}} Fcfa</span></a>
        @endif
      </div>
    </div>

    @if (Session::has('topCart'))
      <!-- Toolbar for handheld devices-->
      <div class="cz-handheld-toolbar">
        <div class="d-table table-fixed w-100">
          <a class="d-table-cell cz-handheld-toolbar-item" href="#navbarCollapse" data-toggle="collapse" onclick="window.scrollTo(0, 0)"><span class="cz-handheld-toolbar-icon"><i class="czi-menu"></i></span><span class="cz-handheld-toolbar-label">Menu</span></a>
          <a class="d-table-cell cz-handheld-toolbar-item" href="{{url('/cart')}}"><span class="cz-handheld-toolbar-icon"><i class="czi-cart"></i><span class="badge badge-primary badge-pill ml-1">{{count(Session::get('topCart') )}}</span></span><span class="cz-handheld-toolbar-label">{{number_format(Session::get('cart')->totalPrice,0,",",".")}} Fcfa</span></a>
        </div>
      </div>

      @else

      <!-- Toolbar for handheld devices-->
      <div class="cz-handheld-toolbar">
        <div class="d-table table-fixed w-100"><a class="d-table-cell cz-handheld-toolbar-item" href="#navbarCollapse" data-toggle="collapse" onclick="window.scrollTo(0, 0)"><span class="cz-handheld-toolbar-icon"><i class="czi-menu"></i></span><span class="cz-handheld-toolbar-label">Menu</span></a>
          <a class="d-table-cell cz-handheld-toolbar-item" href="{{url('/cart')}}"><span class="cz-handheld-toolbar-icon"><i class="czi-cart"></i><span class="badge badge-primary badge-pill ml-1">0</span></span><span class="cz-handheld-toolbar-label">0 Fcfa</span></a>
        </div>
      </div>
          
    @endif
    <!-- Back To Top Button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">Top</span><i class="btn-scroll-top-icon czi-arrow-up">   </i></a>
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="{{ url('../../vendor/jquery/dist/jquery.slim.min.js') }}"></script>
    <script src="{{ url('../../vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('../../vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ url('../../vendor/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ url('../../vendor/tiny-slider/dist/min/tiny-slider.js') }}"></script>
    <script src="{{ url('../../vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
    <!-- Main theme script-->
    <script src="../../js/theme.min.js"></script>
    
  </body>
</html>


    


    