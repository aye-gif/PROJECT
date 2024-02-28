{{-- partie haut de page --}}
@extends('header-fooster')

{{-- partie corps de page --}}
@section('title')
    shop-grid-ft
@endsection

  
 @section('contenue')
    <!-- Page title-->
    <!-- Page Title-->
      <!-- Navbar-->
    <!-- Quick View Modal-->
    {{-- @foreach ($affiche_20_article as $resultat)
        <div class="modal-quick-view modal fade" id="quick-view{{$resultat->id}}" tabindex="-1">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title product-title"><a href="shop-single-v1.html" data-toggle="tooltip" data-placement="right" title="Go to product page">{{$resultat->libelle_article}}</a></h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <!-- Product gallery-->
                  <div class="col-lg-7 pr-lg-0 pt-lg-4">
                    <div class="cz-product-gallery">
                      <div class="cz-preview order-sm-2">
                        <div class="cz-preview-item active" id="first"><img class="cz-image-zoom" src="{{ asset('img/shop/catalog/'.$resultat->image_article) }}" data-zoom="{{ asset('img/shop/catalog/'.$resultat->image_article) }}" alt="Product image">
                          <div class="cz-image-zoom-pane"></div>
                        </div>
                        <div class="cz-preview-item" id="second"><img class="cz-image-zoom" src="{{ asset('img/shop/catalog/'.$resultat->image2_article) }}" data-zoom="{{ asset('img/shop/catalog/'.$resultat->image2_article) }}" alt="Product image">
                          <div class="cz-image-zoom-pane"></div>
                        </div>
                        <div class="cz-preview-item" id="third"><img class="cz-image-zoom" src="{{ asset('img/shop/catalog/'.$resultat->image3_article) }}" data-zoom="{{ asset('img/shop/catalog/'.$resultat->image3_article) }}" alt="Product image">
                          <div class="cz-image-zoom-pane"></div>
                        </div>
                      </div>
                      <div class="cz-thumblist order-sm-1"><a class="cz-thumblist-item active" href="#first"><img src="{{ asset('img/shop/catalog/'.$resultat->image_article) }}" alt="Product thumb"></a><a class="cz-thumblist-item" href="#second"><img src="{{ asset('img/shop/catalog/'.$resultat->image2_article) }}" alt="Product thumb"></a><a class="cz-thumblist-item" href="#third"><img src="{{ asset('img/shop/catalog/'.$resultat->image3_article) }}" alt="Product thumb"></a><a class="cz-thumblist-item video-item" href="https://www.youtube.com/watch?v=1vrXpMLLK14">
                          <div class="cz-thumblist-item-text"><i class="czi-video"></i>Video</div></a></div>
                    </div>
                  </div>
                  <!-- Product details-->
                  <div class="col-lg-5 pt-4 pt-lg-0 cz-image-zoom-pane">
                    <div class="product-details ml-auto pb-3">
                      <div class="d-flex justify-content-between align-items-center mb-2"><a href="shop-single-v1.html#reviews">
                          <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i>
                          </div><span class="d-inline-block font-size-sm text-body align-middle mt-1 ml-1">74 Reviews</span></a>
                        <button class="btn-wishlist" type="button" data-toggle="tooltip" title="Add to wishlist"><i class="czi-heart"></i></button>
                      </div>
                      <div class="mb-3"><span class="h3 font-weight-normal text-accent mr-1">{{$resultat->prix}}<small> Fcfa</small></span>
                        <del class="text-muted font-size-lg mr-3">{{$resultat->prix_2}}<small> Fcfa</small></del><span class="badge badge-danger badge-shadow align-middle mt-n2">{{$resultat->statut}}</span>
                      </div>
                      <div class="font-size-sm mb-4"><span class="text-heading font-weight-medium mr-1">Color:</span><span class="text-muted">Red/Dark blue/White</span></div>
                      <div class="position-relative mr-n4 mb-3">
                        <div class="custom-control custom-option custom-control-inline mb-2">
                          <input class="custom-control-input" type="radio" name="color" id="color1" checked>
                          <label class="custom-option-label rounded-circle" for="color1"><span class="custom-option-color rounded-circle" style="background-image: url(img/shop/single/color-opt-1.png)"></span></label>
                        </div>
                        <div class="custom-control custom-option custom-control-inline mb-2">
                          <input class="custom-control-input" type="radio" name="color" id="color2">
                          <label class="custom-option-label rounded-circle" for="color2"><span class="custom-option-color rounded-circle" style="background-image: url(img/shop/single/color-opt-2.png)"></span></label>
                        </div>
                        <div class="custom-control custom-option custom-control-inline mb-2">
                          <input class="custom-control-input" type="radio" name="color" id="color3">
                          <label class="custom-option-label rounded-circle" for="color3"><span class="custom-option-color rounded-circle" style="background-image: url(img/shop/single/color-opt-3.png)"></span></label>
                        </div>
                        <div class="product-badge product-available mt-n1"><i class="czi-security-check"></i>{{$resultat->disponibilite}}</div>
                      </div>
                      
                      <h5 class="h6 mb-3 pb-2 border-bottom"><i class="czi-announcement text-muted font-size-lg align-middle mt-n1 mr-2"></i>Product info</h5>
                      <h6 class="font-size-sm mb-2">Style</h6>
                      <ul class="font-size-sm pl-4">
                        <li>Hooded top</li>
                      </ul>
                      <h6 class="font-size-sm mb-2">Composition</h6>
                      <ul class="font-size-sm pl-4">
                        <li>Elastic rib: Cotton 95%, Elastane 5%</li>
                        <li>Lining: Cotton 100%</li>
                        <li>Cotton 80%, Polyester 20%</li>
                      </ul>
                      <h6 class="font-size-sm mb-2">Art. No.</h6>
                      <ul class="font-size-sm pl-4 mb-0">
                        <li>183260098</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach --}}
     <!-- Quick View Modal-->
     <div class="modal-quick-view modal fade" id="quick-view" tabindex="-1">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title product-title"><a href="shop-single-v1.html" data-toggle="tooltip" data-placement="right" title="Go to product page">Sweat à capuche de sport<i class="czi-arrow-right font-size-lg ml-2"></i></a></h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <!-- Product gallery-->
              <div class="col-lg-7 pr-lg-0">
                <div class="cz-product-gallery">
                  <div class="cz-preview order-sm-2">
                    <div class="cz-preview-item active" id="first"><img class="cz-image-zoom" src="img/shop/single/gallery/01.jpg" data-zoom="img/shop/single/gallery/01.jpg" alt="Product image">
                      <div class="cz-image-zoom-pane"></div>
                    </div>
                    <div class="cz-preview-item" id="second"><img class="cz-image-zoom" src="img/shop/single/gallery/02.jpg" data-zoom="img/shop/single/gallery/02.jpg" alt="Product image">
                      <div class="cz-image-zoom-pane"></div>
                    </div>
                    <div class="cz-preview-item" id="third"><img class="cz-image-zoom" src="img/shop/single/gallery/03.jpg" data-zoom="img/shop/single/gallery/03.jpg" alt="Product image">
                      <div class="cz-image-zoom-pane"></div>
                    </div>
                    <div class="cz-preview-item" id="fourth"><img class="cz-image-zoom" src="img/shop/single/gallery/04.jpg" data-zoom="img/shop/single/gallery/04.jpg" alt="Product image">
                      <div class="cz-image-zoom-pane"></div>
                    </div>
                  </div>
                  <div class="cz-thumblist order-sm-1"><a class="cz-thumblist-item active" href="#first"><img src="img/shop/single/gallery/th01.jpg" alt="Product thumb"></a><a class="cz-thumblist-item" href="#second"><img src="img/shop/single/gallery/th02.jpg" alt="Product thumb"></a><a class="cz-thumblist-item" href="#third"><img src="img/shop/single/gallery/th03.jpg" alt="Product thumb"></a><a class="cz-thumblist-item" href="#fourth"><img src="img/shop/single/gallery/th04.jpg" alt="Product thumb"></a></div>
                </div>
              </div>
              <!-- Product details-->
              <div class="col-lg-5 pt-4 pt-lg-0 cz-image-zoom-pane">
                <div class="product-details ml-auto pb-3">
                  <div class="d-flex justify-content-between align-items-center mb-2"><a href="shop-single-v1.html#reviews">
                      <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i>
                      </div><span class="d-inline-block font-size-sm text-body align-middle mt-1 ml-1">74 Reviews</span></a>
                    <button class="btn-wishlist" type="button" data-toggle="tooltip" title="Add to wishlist"><i class="czi-heart"></i></button>
                  </div>
                  <div class="mb-3"><span class="h3 font-weight-normal text-accent mr-1">$18.<small>99</small></span>
                    <del class="text-muted font-size-lg mr-3">$25.<small>00</small></del><span class="badge badge-danger badge-shadow align-middle mt-n2">Sale</span>
                  </div>
                  <div class="font-size-sm mb-4"><span class="text-heading font-weight-medium mr-1">Color:</span><span class="text-muted">Red/Dark blue/White</span></div>
                  <div class="position-relative mr-n4 mb-3">
                    <div class="custom-control custom-option custom-control-inline mb-2">
                      <input class="custom-control-input" type="radio" name="color" id="color1" checked>
                      <label class="custom-option-label rounded-circle" for="color1"><span class="custom-option-color rounded-circle" style="background-image: url(img/shop/single/color-opt-1.png)"></span></label>
                    </div>
                    <div class="custom-control custom-option custom-control-inline mb-2">
                      <input class="custom-control-input" type="radio" name="color" id="color2">
                      <label class="custom-option-label rounded-circle" for="color2"><span class="custom-option-color rounded-circle" style="background-image: url(img/shop/single/color-opt-2.png)"></span></label>
                    </div>
                    <div class="custom-control custom-option custom-control-inline mb-2">
                      <input class="custom-control-input" type="radio" name="color" id="color3">
                      <label class="custom-option-label rounded-circle" for="color3"><span class="custom-option-color rounded-circle" style="background-image: url(img/shop/single/color-opt-3.png)"></span></label>
                    </div>
                    <div class="product-badge product-available mt-n1"><i class="czi-security-check"></i>Product available</div>
                  </div>
                  <form class="mb-grid-gutter">
                    <div class="form-group">
                      <label class="font-weight-medium pb-1" for="product-size">Size:</label>
                      <select class="custom-select" required id="product-size">
                        <option value="">Select size</option>
                        <option value="xs">XS</option>
                        <option value="s">S</option>
                        <option value="m">M</option>
                        <option value="l">L</option>
                        <option value="xl">XL</option>
                      </select>
                    </div>
                    <div class="form-group d-flex align-items-center">
                      <select class="custom-select mr-3" style="width: 5rem;">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                      <button class="btn btn-primary btn-shadow btn-block" type="submit"><i class="czi-cart font-size-lg mr-2"></i>Add to Cart</button>
                    </div>
                  </form>
                  <h5 class="h6 mb-3 pb-2 border-bottom"><i class="czi-announcement text-muted font-size-lg align-middle mt-n1 mr-2"></i>Product info</h5>
                  <h6 class="font-size-sm mb-2">Style</h6>
                  <ul class="font-size-sm pl-4">
                    <li>Hooded top</li>
                  </ul>
                  <h6 class="font-size-sm mb-2">Composition</h6>
                  <ul class="font-size-sm pl-4">
                    <li>Elastic rib: Cotton 95%, Elastane 5%</li>
                    <li>Lining: Cotton 100%</li>
                    <li>Cotton 80%, Polyester 20%</li>
                  </ul>
                  <h6 class="font-size-sm mb-2">Art. No.</h6>
                  <ul class="font-size-sm pl-4 mb-0">
                    <li>183260098</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-title-overlap bg-dark pt-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{url('/')}}"><i class="czi-home"></i>Acceuil</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="#">Plus</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">...</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">Un clic, Un style</h1>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4">
      <div class="row">
        <!-- Content  -->
        <section class="col-lg-8">
          <!-- Toolbar-->
          <div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">
            <div class="d-flex flex-wrap">
              <form action="">
                <div class="form-inline flex-nowrap mr-3 mr-sm-4 pb-3">
                  <label class="text-light opacity-75 text-nowrap mr-2 d-none d-sm-block" for="sorting">Trier :</label>
                  <select class="form-control custom-select" id="sorting">
                    <option>Popularité</option>
                    <option>Bas - Prix élevé</option>
                    <option>Haut - Bas Prix</option>
                    <option>Note moyenne</option>
                    <option>de A - Z</option>
                    <option>de Z - A</option>
                  </select><span class="font-size-sm text-light opacity-75 text-nowrap ml-2 d-none d-md-block">parmis {{count($compte_article)}} articles</span>
                </div>
              </form>
            </div>
            
            <div class="d-none d-sm-flex pb-3"><a class="btn btn-icon nav-link-style bg-light text-dark disabled opacity-100 mr-2" href="#"><i class="czi-view-grid"></i></a></div>
          </div>
          <!-- Products grid-->
          <div class="row mx-n2">
          @if (Session::has('client'))
                @foreach ($affiche_20_article as $resultat)
                  
                  <!-- Product-->
                      <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                        <div class="card product-card"><span class="badge badge-{{ $resultat->couleur_statut}} badge-shadow">{{ $resultat->statut}}</span>
                          <button class="btn-wishlist btn-sm" data-toggle="tooltip" data-placement="left" title="Ajouter aux favories"><a href="{{url('/favories',[$resultat->ref_article])}}" ><i class="czi-heart"></i></a></button><a class="card-img-top d-block overflow-hidden" href="{{url('/',[$resultat->ref_article])}}"><img src="{{ asset('storage/img/shop/catalog/'.$resultat->image_article) }}" alt="Product"></a>
                          <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="{{url('/',[$resultat->id])}}">{{$resultat->type_article}}</a>
                            <h3 class="product-title font-size-sm"><a href="{{url('/',[$resultat->id])}}">{{$resultat->libelle_article}}</a></h3>
                            <div class="d-flex justify-content-between">
                              <div class="product-price"><span class="text-accent">{{number_format($resultat->prix,0,",",".") }}<small> Fcfa</small></span>
                                <del class="font-size-sm text-muted"><small></small></del>
                              </div>
                              <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star active"></i><i class="sr-star czi-star"></i>
                              </div>
                            </div>
                          </div>
                           <form class="mb-grid-gutter" method="POST" action="{{url('/addtocart',[$resultat->id])}}">
                            @method('PUT')
                            @csrf
                                <input class="custom-control-input" type="hidden" name="libelle_article" value="{{ $resultat->libelle_article }}">
                                <input class="custom-control-input" type="hidden" name="prix" value="{{ $resultat->prix }}">
                                <input class="custom-control-input" type="hidden" name="image_article" value="{{ $resultat->image_article }}">

                              <div class="card-body card-body-hidden">
                                <div class="text-center pb-2">
                                  <div class="row">
                                    <div class="col"> 
                                      <select class="custom-select custom-select-sm mr-2" name="taille_article">
                                        @foreach (DB::table('taille_articles')->where('ref_article', '=', $resultat->ref_article)->get() as $item) 
                                            <option value="{{ $item->libelle_taille_article }}">{{ $item->libelle_taille_article }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="col">
                                      <select class="custom-select custom-select-sm mr-2" name="couleur">
                                        @foreach (DB::table('couleurs')->where('ref_article', '=', $resultat->ref_article)->get() as $item) 
                                            <option value="{{ $item->libelle_couleur }}">{{ $item->libelle_couleur }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="d-flex mb-2">  
                                  <button type="submit" class="btn btn-primary btn-sm btn-block mb-2" data-toggle="toast" data-target="#cart-toast"><i class="czi-cart font-size-sm mr-1"></i>Ajouter au panier</button>
                                </div>
                                {{-- <div class="text-center"><a class="nav-link-style font-size-ms" href="#quick-view{{$resultat->id}}" data-toggle="modal" ><i class="czi-eye align-middle mr-1"></i>Détail</a></div> --}}

                              </div>
                        </form>
                        </div>
                        <hr class="d-sm-none">
                      </div>
                  @endforeach
            @else
            @foreach ($affiche_20_article as $resultat)
                  
                  <!-- Product-->
                      <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                        <div class="card product-card"><span class="badge badge-{{ $resultat->couleur_statut}} badge-shadow">{{ $resultat->statut}}</span>
                          <button class="btn-wishlist btn-sm" data-toggle="tooltip" data-placement="left" title="Ajouter aux favories"><a href="{{url('/favories',[$resultat->ref_article])}}" ><i class="czi-heart"></i></a></button><a class="card-img-top d-block overflow-hidden" href="{{url('/',[$resultat->ref_article])}}"><img src="{{ asset('storage/img/shop/catalog/'.$resultat->image_article) }}" alt="Product"></a>
                          <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="{{url('/',[$resultat->id])}}">{{$resultat->type_article}}</a>
                            <h3 class="product-title font-size-sm"><a href="{{url('/',[$resultat->id])}}">{{$resultat->libelle_article}}</a></h3>
                            <div class="d-flex justify-content-between">
                              <div class="product-price"><span class="text-accent">{{number_format($resultat->prix,0,",",".") }}<small> Fcfa</small></span>
                                <del class="font-size-sm text-muted"><small></small></del>
                              </div>
                              <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star active"></i><i class="sr-star czi-star"></i>
                              </div>
                            </div>
                          </div>
                           <form class="mb-grid-gutter" method="POST" action="{{url('/addtocart',[$resultat->id])}}">
                            @method('PUT')
                            @csrf
                                <input class="custom-control-input" type="hidden" name="libelle_article" value="{{ $resultat->libelle_article }}">
                                <input class="custom-control-input" type="hidden" name="prix" value="{{ $resultat->prix }}">
                                <input class="custom-control-input" type="hidden" name="image_article" value="{{ $resultat->image_article }}">

                              <div class="card-body card-body-hidden">
                                <div class="text-center pb-2">
                                  <div class="row">
                                    <div class="col"> 
                                      <select class="custom-select custom-select-sm mr-2" name="taille_article">
                                        @foreach (DB::table('taille_articles')->where('ref_article', '=', $resultat->ref_article)->get() as $item) 
                                            <option value="{{ $item->libelle_taille_article }}">{{ $item->libelle_taille_article }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="col">
                                      <select class="custom-select custom-select-sm mr-2" name="couleur">
                                        @foreach (DB::table('couleurs')->where('ref_article', '=', $resultat->ref_article)->get() as $item) 
                                            <option value="{{ $item->libelle_couleur }}">{{ $item->libelle_couleur }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="d-flex mb-2">  
                                  <button type="submit" class="btn btn-primary btn-sm btn-block mb-2" data-toggle="toast" data-target="#cart-toast"><i class="czi-cart font-size-sm mr-1"></i>Ajouter au panier</button>
                                </div>
                                {{-- <div class="text-center"><a class="nav-link-style font-size-ms" href="#quick-view{{$resultat->id}}" data-toggle="modal" ><i class="czi-eye align-middle mr-1"></i>Détail</a></div> --}}

                              </div>
                        </form>
                        </div>
                        <hr class="d-sm-none">
                      </div>
                  @endforeach
          @endif
          </div>
          <!-- Pagination--> 
          <div class="d-flex justify-content-center">
            {!! $affiche_20_article->links('custom') !!}
          </div>        
     </section>
        
        <!-- Sidebar-->
        <aside class="col-lg-4">
          <!-- Sidebar-->
          <div class="cz-sidebar rounded-lg box-shadow-lg ml-lg-auto " id="shop-sidebar">
            <div class="cz-sidebar-header box-shadow-sm">
              <button class="close ml-auto" type="button" data-dismiss="sidebar" aria-label="Close"><span class="d-inline-block font-size-xs font-weight-normal align-middle">Close sidebar</span><span class="d-inline-block align-middle ml-2" aria-hidden="true">&times;</span></button>
            </div>
            <div class="cz-sidebar-body">
              <!-- Categories-->
              <div class="widget widget-categories mb-4 pb-4 border-bottom">
                <h3 class="widget-title">Categories</h3>
                <div class="accordion mt-n1" id="shop-categories">
                  <!-- Afficher les differents categories qui concerne les femmes-->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="accordion-heading"><a class="collapsed" href="#femme" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="femme">FEMME<span class="accordion-indicator"></span></a></h3>
                    </div>
                    <div class="collapse" id="femme" data-parent="#shop-categories">
                      <div class="card-body">
                        <div class="widget widget-links cz-filter">
                          <div class="input-group-overlay input-group-sm mb-2">
                            <input class="cz-filter-search form-control form-control-sm appended-form-control" type="text" placeholder="Search">
                            <div class="input-group-append-overlay"><span class="input-group-text"><i class="czi-search"></i></span></div>
                          </div>
                          <ul class="widget-list cz-filter-list pt-1" style="height: 12rem;" data-simplebar data-simplebar-auto-hide="false">
                            @foreach ($affiche_categorie_femme as $resultat)
                              <li class="widget-list-item cz-filter-item"><a class="widget-list-link d-flex justify-content-between align-items-center" href="{{url('/type',[$resultat->type_article])}}"><span class="cz-filter-item-text">{{$resultat->type_article}}</span><span class="font-size-xs text-muted ml-3">{{$resultat->article_count}}</span></a></li>                                
                            @endforeach
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Afficher les differents categories qui concerne les hommes-->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="accordion-heading"><a href="#homme"  role="button" data-toggle="collapse" aria-expanded="true" aria-controls="homme">HOMME<span class="accordion-indicator"></span></a></h3>
                    </div>
                    <div class="collapse show" id="homme"  data-parent="#shop-categories">
                      <div class="card-body">
                        <div class="widget widget-links cz-filter">
                          <div class="input-group-overlay input-group-sm mb-2">
                            <input class="cz-filter-search form-control form-control-sm appended-form-control" type="text" placeholder="Search">
                            <div class="input-group-append-overlay"><span class="input-group-text"><i class="czi-search"></i></span></div>
                          </div>
                          <ul class="widget-list cz-filter-list pt-1" style="height: 12rem;" data-simplebar data-simplebar-auto-hide="false">
                            @foreach ($affiche_categorie_homme as $resultat)
                              <li class="widget-list-item cz-filter-item"><a class="widget-list-link d-flex justify-content-between align-items-center" href="{{url('/type',[$resultat->type_article])}}"><span class="cz-filter-item-text">{{$resultat->type_article}}</span><span class="font-size-xs text-muted ml-3">{{$resultat->article_count}}</span></a></li>                                
                            @endforeach
                            
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Afficher les differents categories qui concerne les enfant-->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="accordion-heading"><a class="collapsed" href="#enfant" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="enfant">ENFANT<span class="accordion-indicator"></span></a></h3>
                    </div>
                    <div class="collapse" id="enfant" data-parent="#shop-categories">
                      <div class="card-body">
                        <div class="widget widget-links cz-filter">
                          <div class="input-group-overlay input-group-sm mb-2">
                            <input class="cz-filter-search form-control form-control-sm appended-form-control" type="text" placeholder="Search">
                            <div class="input-group-append-overlay"><span class="input-group-text"><i class="czi-search"></i></span></div>
                          </div>
                          <ul class="widget-list cz-filter-list pt-1" style="height: 12rem;" data-simplebar data-simplebar-auto-hide="false">
                            @foreach ($affiche_categorie_enfant as $resultat)
                              <li class="widget-list-item cz-filter-item"><a class="widget-list-link d-flex justify-content-between align-items-center" href="{{url('/type',[$resultat->type_article])}}"><span class="cz-filter-item-text">{{$resultat->type_article}}</span><span class="font-size-xs text-muted ml-3">{{$resultat->article_count}}</span></a></li>                                
                            @endforeach
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
              {{-- <form action="{{ url('recherche') }}" method="POST" class="input-group">
                @csrf --}}
                <!-- afficher les different marques presentent dans la base de donnee-->
                <div class="widget cz-filter mb-4 pb-4 border-bottom">
                  <h3 class="widget-title">Marque</h3>
                  <div class="input-group-overlay input-group-sm mb-2">
                    <input class="cz-filter-search form-control form-control-sm appended-form-control" type="text" placeholder="Search">
                    <div class="input-group-append-overlay"><span class="input-group-text"><i class="czi-search"></i></span></div>
                  </div>
                  <ul class="widget-list cz-filter-list list-unstyled pt-1" style="max-height: 12rem;" data-simplebar data-simplebar-auto-hide="false">
                    @foreach ($affiche_marque as $resultat)
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="marque" value="{{$resultat->libelle_marque}}" id="flexRadioDefault1">
                      <label class="form-check-label" for="flexRadioDefault1">
                        {{$resultat->libelle_marque}}
                      </label>
                    </div>
                      
                    @endforeach
                  </ul>
                </div>
                <!--afficher les different taille presentent dans la base de donnee-->
                <div class="widget cz-filter mb-4 pb-4 border-bottom">
                  <h3 class="widget-title">Taille</h3>
                  <div class="input-group-overlay input-group-sm mb-2">
                    <input class="cz-filter-search form-control form-control-sm appended-form-control" type="text" placeholder="Search">
                    <div class="input-group-append-overlay"><span class="input-group-text"><i class="czi-search"></i></span></div>
                  </div>
                  @foreach ($affiche_taille as $resultat)

                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="taille" id="flexRadioDefault1">
                      <label class="form-check-label" for="flexRadioDefault1">
                        {{$resultat->libelle_taille_article}}
                      </label>
                    </div>

                  @endforeach
                  
                </div>
                {{-- <div class="card-body card-body-hidden">
                  <button class="btn btn-primary btn-sm btn-block mb-2" type="submit"><a class="product-meta d-block font-size-xs pb-1" href="">RECHERCHER</a></button>
                </div> --}}
              {{-- </form> --}}
              <!-- afficher les different couleur presentent dans la base de donnee-->
              <div class="widget">
                <h3 class="widget-title">Couleur</h3>
                <div class="d-flex flex-wrap">

                  @foreach ($affiche_couleur as $resultat)
                    <div class="custom-control custom-option text-center mb-2 mx-1" style="width: 4rem;">
                      <input class="custom-control-input" type="checkbox" id="color-blue-gray">
                      <label class="custom-option-label rounded-circle" for="color-blue-gray"><span class="custom-option-color rounded-circle" style="background-color: {{ $resultat->lien_couleur }}"></span></label>
                      <label class="d-block font-size-xs text-muted mt-n1" for="color-blue-gray">{{ $resultat->libelle_couleur }}</label>
                    </div>
                  @endforeach
                  
                </div>
              </div>
            </div>
          </div>
        </aside>
      </div>
    </div>
    
    <!-- Toast: Added to Cart-->
    <div class="toast-container toast-bottom-center">
      <div class="toast mb-3" id="cart-toast" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white"><i class="czi-check-circle mr-2"></i>
          <h6 class="font-size-sm text-white mb-0 mr-auto">Ajout au pannier</h6>
          <button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="toast-body">votre article a bien été ajouter au panier</div>
      </div>
    </div>
 @endsection 


