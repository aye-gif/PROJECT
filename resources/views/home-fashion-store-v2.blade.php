<!-- le lien vers le header et le fooster-->
@extends('header-fooster')
  @section('title')
  home-fashion-store-v2
  @endsection

 @section('contenue')

    <!-- Page title-->
    <!-- Page Content-->
    <!-- Hero slider-->
    <section class="cz-carousel cz-controls-lg mb-4 mb-lg-5">
      <div class="cz-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;responsive&quot;: {&quot;0&quot;:{&quot;nav&quot;:true, &quot;controls&quot;: false},&quot;992&quot;:{&quot;nav&quot;:false, &quot;controls&quot;: true}}}">
        <!-- Item-->
        <div class="px-lg-5" style="background-color: #f5b1b0;">
          <div class="d-lg-flex justify-content-between align-items-center pl-lg-4"><img class="d-block order-lg-2 mr-lg-n5 flex-shrink-0" src="img/home/hero-slider/02.jpg" alt="Women Sportswear">
            <div class="position-relative mx-auto mr-lg-n5 py-5 px-4 mb-lg-5 order-lg-1" style="max-width: 42rem; z-index: 10;">
              <div class="pb-lg-5 mb-lg-5 text-center text-lg-left text-lg-nowrap">
                <h2 class="text-light font-weight-light pb-1 from-bottom">Dépêchez-vous! Offre d’une durée limitée.</h2>
                <h3 class="text-light display-4 from-bottom delay-1">Viens prendre ton maillot </h1>
                <p class="font-size-lg text-light pb-3 from-bottom delay-2">Réal, Barça, Chelsea, Man blue, Arsenal, PSG, Marseille, Bayern, Liverkusen</p><a class="btn btn-primary scale-up delay-4" href="{{url('/')}}">Acheter maintenant<i class="czi-arrow-right ml-2 mr-n1"></i></a>
              </div>
            </div>
          </div>
        </div>
        <!-- Item-->
        <div class="px-lg-5" style="background-color: #3aafd2;">
          <div class="d-lg-flex justify-content-between align-items-center pl-lg-4"><img class="d-block order-lg-2 mr-lg-n5 flex-shrink-0" src="img/home/hero-slider/01.jpg" alt="Summer Collection">
            <div class="position-relative mx-auto mr-lg-n5 py-5 px-4 mb-lg-5 order-lg-1" style="max-width: 42rem; z-index: 10;">
              <div class="pb-lg-5 mb-lg-5 text-center text-lg-left text-lg-nowrap">
                <h2 class="text-light font-weight-light pb-1 from-left">Vient d’arriver!</h2>
                <h1 class="text-light display-4 from-left delay-1">Immense collection d’été</h1>
                <p class="font-size-lg text-light pb-3 from-left delay-2">Maillots de bain, hauts, shorts, lunettes de soleil &amp; beaucoup plus...</p><a class="btn btn-primary scale-up delay-4" href="{{url('/')}}">Acheter maintenant<i class="czi-arrow-right ml-2 mr-n1"></i></a>
              </div>
            </div>
          </div>
        </div>
        {{-- <!-- Item-->
        <div class="px-lg-5" style="background-color: #eba170;">
          <div class="d-lg-flex justify-content-between align-items-center pl-lg-4"><img class="d-block order-lg-2 mr-lg-n5 flex-shrink-0" src="img/home/hero-slider/flyer1.jpg" alt="Men Accessories">
            <div class="position-relative mx-auto mr-lg-n5 py-5 px-4 mb-lg-5 order-lg-1" style="max-width: 42rem; z-index: 10;">
              <div class="pb-lg-5 mb-lg-5 text-center text-lg-left text-lg-nowrap">
                <h2 class="text-light font-weight-light pb-1 from-top">Complétez votre look avec</h2>
                <h1 class="text-light display-4 from-top delay-1">Nouveaux accessoires pour hommes</h1>
                <p class="font-size-lg text-light pb-3 from-top delay-2">Chapeaux &amp; Casquettes, lunettes de soleil, sacs&amp; beaucoup plus...</p><a class="btn btn-primary scale-up delay-4" href="{{url('/')}}">Acheter maintenant<i class="czi-arrow-right ml-2 mr-n1"></i></a>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
    </section>
    <!-- Category (Women)-->
    <section class="container pt-lg-3 mb-4 mb-sm-5">
      <div class="row">
        <!-- Banner with controls-->
        <div class="col-md-5">
          <div class="d-flex flex-column h-100 overflow-hidden rounded-lg" style="background-color: #f6f8fb;">
            <div class="d-flex justify-content-between px-grid-gutter py-grid-gutter">
              <div>
                <!-- <h3 class="mb-1">POUR FEMME</h3><a class="font-size-md" href="{{url('/')}}"></a> -->
              </div>
              <div class="cz-custom-controls" id="for-women">
                <button type="button"><i class="czi-arrow-left"></i></button>
                <button type="button"><i class="czi-arrow-right"></i></button>
              </div>
            </div><a class="d-none d-md-block mt-auto" href="{{url('/')}}"><img class="d-block w-100" src="img/home/categories/cat01.png" alt="image 01"></a>
          </div>
        </div>
        <!-- Product grid (femme)-->
        <div class="col-md-7 pt-4 pt-md-0">
          <div class="cz-carousel">
            <div class="cz-carousel-inner" data-carousel-options="{&quot;nav&quot;: false, &quot;controlsContainer&quot;: &quot;#for-women&quot;}">
              <!-- Carousel item-->
              <div>
                <div class="row mx-n2">
                  
                  @if (Session::has('client'))
                        <!-- nous affichons ici 6 images de vetement et autre pour la femme -->
                        @foreach($articles_6_f as $article)
                    
                          <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                            <div class="card product-card"><span class="badge badge-{{ $article->couleur_statut}} badge-shadow">{{ $article->statut}}</span>
                              <button class="btn-wishlist btn-sm" data-toggle="tooltip" data-placement="left" title="Ajouter aux favories"><a href="{{url('/favories',[$article->id])}}" ><i class="czi-heart"></i></a></button><a class="card-img-top d-block overflow-hidden" href="{{url('/article',[$article->id])}}"><img src="{{ asset('img/shop/catalog/'.$article->image_article) }}" alt="Product"></a>
                              <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="{{url('/article',[$article->id])}}">{{$article->type_article }}</a>
                                <h3 class="product-title font-size-sm"><a href="{{url('/article',[$article->id])}}">{{$article->libelle_article }}</a></h3>
                                <div class="d-flex justify-content-between">
                                  <div class="product-price"><span class="text-accent">{{number_format($article->prix,0,",",".") }}<small> Fcfa</small></span>
                                  </div>
                                  <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i><i class="sr-star czi-star"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        @endforeach
                     @else
                          <!-- nous affichons ici 6 images de vetement et autre pour la femme -->
                          @foreach($articles_6_f as $article)

                          <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4" id="open">
                            <div class="card product-card"><span class="badge badge-{{ $article->couleur_statut}} badge-shadow">{{ $article->statut}}</span>
                              <button class="btn-wishlist btn-sm" data-toggle="tooltip" data-placement="left" title="Ajouter aux favories"><a href="#" ><i class="czi-heart"></i></a></button><a  href="{{url('/article',[$article->id])}}"><img src="{{ asset('img/shop/catalog/'.$article->image_article) }}" alt="Product"></a>
                              <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="{{url('/article',[$article->id])}}">{{$article->type_article }}</a>
                                <h3 class="product-title font-size-sm"><a href="{{url('/article',[$article->id])}}">{{$article->libelle_article }}</a></h3>
                                <div class="d-flex justify-content-between">
                                  <div class="product-price"><span class="text-accent">{{number_format($article->prix,0,",",".") }}<small> Fcfa</small></span>
                                  </div>
                                  <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i><i class="sr-star czi-star"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        @endforeach
                  @endif

                </div> 
              </div>
              <!-- Carousel item-->
              <div>
                <div class="row mx-n2">
                  
                  @if (Session::has('client'))
                  <!-- nous affichons ici 6 autre images de vetement et autre pour la femme -->
                    @foreach($articles_12_f as $article)
              
                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card"><span class="badge badge-{{ $article->couleur_statut}} badge-shadow">{{ $article->statut}}</span>
                        <button class="btn-wishlist btn-sm" data-toggle="tooltip" data-placement="left" title="Ajouter aux favories"><a href="{{url('/favories',$article->id)}}" ><i class="czi-heart"></i></a></button><a class="card-img-top d-block overflow-hidden" href="{{url('/',[$article->id])}}"><img src="{{ asset('img/shop/catalog/'.$article->image_article) }}" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="{{url('/',[$article->id])}}">{{$article->type_article }}</a>
                          <h3 class="product-title font-size-sm"><a href="{{url('/',[$article->id])}}">{{$article->libelle_article }}</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">{{number_format($article->prix,0,",",".") }}<small> Fcfa</small></span>
                            </div>
                            <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i><i class="sr-star czi-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  @endforeach
               @else
                    <!-- nous affichons ici 6 autre images de vetement et autre pour la femme -->
                    @foreach($articles_12_f as $article)

                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card"><span class="badge badge-{{ $article->couleur_statut}} badge-shadow">{{ $article->statut}}</span>
                        <button class="btn-wishlist btn-sm" data-toggle="tooltip" data-placement="left" title="Ajouter aux favories"><a href="{{url('/favories',[$article->id])}}" ><i class="czi-heart"></i></a></button><a class="card-img-top d-block overflow-hidden" href="{{url('/',[$article->ref_article])}}"><img src="{{ asset('img/shop/catalog/'.$article->image_article) }}" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="{{url('/',[$article->ref_article])}}">{{$article->type_article }}</a>
                          <h3 class="product-title font-size-sm"><a href="{{url('/',[$article->ref_article])}}">{{$article->libelle_article }}</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">{{number_format($article->prix,0,",",".") }}<small> Fcfa</small></span>
                            </div>
                            <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i><i class="sr-star czi-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  @endforeach
            @endif
              
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Category (Men)-->
    <section class="container pt-lg-4 mb-4 mb-sm-5">
      <div class="row">
        <!-- Banner with controls-->
        <div class="col-md-5 order-md-2">
          <div class="d-flex flex-column h-100 overflow-hidden rounded-lg" style="background-color: #f5b1b0;">
            <div class="d-flex justify-content-between px-grid-gutter py-grid-gutter">
              <div class="order-md-2">
                <h3 class="mb-1">Vietnamienne & Loose & Curly</h3><a class="font-size-md" href="{{url('/')}}"></a> 
              </div>
              <div class="cz-custom-controls order-md-1" id="for-men">
                <button type="button"><i class="czi-arrow-left"></i></button>
                <button type="button"><i class="czi-arrow-right"></i></button>
              </div>
            </div><a class="d-none d-md-block mt-auto" href="{{url('/')}}"><img class="d-block w-100" src="img/home/categories/cat-lg01.jpg" alt="Pour Homme"></a>
          </div>
        </div>
        <!-- Product grid (homme)-->
        <div class="col-md-7 pt-4 pt-md-0 order-md-1">
          <div class="cz-carousel">
            <div class="cz-carousel-inner" data-carousel-options="{&quot;nav&quot;: false, &quot;controlsContainer&quot;: &quot;#for-men&quot;}">
              <!-- Carousel item-->
              <div>
                <div class="row mx-n2">
                  @if (Session::has('client'))
                  <!-- nous affichons ici 6 images de vetement et autre pour les hommes -->
                    @foreach($articles_6_h as $article)
              
                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card"><span class="badge badge-{{ $article->couleur_statut}} badge-shadow">{{ $article->statut}}</span>
                        <button class="btn-wishlist btn-sm" data-toggle="tooltip" data-placement="left" title="Ajouter aux favories"><a href="{{url('/favories',$article->ref_article)}}" ><i class="czi-heart"></i></a></button><a class="card-img-top d-block overflow-hidden" href="{{url('/',[$article->ref_article])}}"><img src="{{ asset('img/shop/catalog/'.$article->image_article) }}" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="{{url('/',[$article->ref_article])}}">{{$article->type_article }}</a>
                          <h3 class="product-title font-size-sm"><a href="{{url('/',[$article->ref_article])}}">{{$article->libelle_article }}</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">{{number_format($article->prix,0,",",".") }}<small> Fcfa</small></span>
                            </div>
                            <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i><i class="sr-star czi-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  @endforeach
               @else
                    <!-- nous affichons ici 6 images de vetement et autre pour les hommes -->
                    @foreach($articles_6_h as $article)

                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card"><span class="badge badge-{{ $article->couleur_statut}} badge-shadow">{{ $article->statut}}</span>
                        <button class="btn-wishlist btn-sm" data-toggle="tooltip" data-placement="left" title="Ajouter aux favories"><a href="{{url('/favories',[$article->ref_article])}}" ><i class="czi-heart"></i></a></button><a class="show-info-link" href="{{url('/',[$article->ref_article])}}"><img src="{{ asset('img/shop/catalog/'.$article->image_article) }}" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="{{url('/',[$article->ref_article])}}">{{$article->type_article }}</a>
                          <h3 class="product-title font-size-sm"><a href="{{url('/',[$article->ref_article])}}">{{$article->libelle_article }}</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">{{number_format($article->prix,0,",",".") }}<small> Fcfa</small></span>
                            </div>
                            <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i><i class="sr-star czi-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  @endforeach
            @endif
  
                </div>
              </div>
              <!-- Carousel item-->
              <div>
                <div class="row mx-n2">
                  @if (Session::has('client'))
                        <!-- nous affichons ici 6 autres images de vetement et autre pour la hommes -->
                          @foreach($articles_12_h as $article)
                    
                          <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                            <div class="card product-card"><span class="badge badge-{{ $article->couleur_statut}} badge-shadow">{{ $article->statut}}</span>
                              <button class="btn-wishlist btn-sm" data-toggle="tooltip" data-placement="left" title="Ajouter aux favories"><a href="{{url('/favories',$article->ref_article)}}" ><i class="czi-heart"></i></a></button><a class="card-img-top d-block overflow-hidden" href="{{url('/',[$article->ref_article])}}"><img src="{{ asset('img/shop/catalog/'.$article->image_article) }}" alt="Product"></a>
                              <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="{{url('/',[$article->ref_article])}}">{{$article->type_article }}</a>
                                <h3 class="product-title font-size-sm"><a href="{{url('/',[$article->ref_article])}}">{{$article->libelle_article }}</a></h3>
                                <div class="d-flex justify-content-between">
                                  <div class="product-price"><span class="text-accent">{{number_format($article->prix,0,",",".") }}<small> Fcfa</small></span>
                                  </div>
                                  <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i><i class="sr-star czi-star"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        @endforeach
                     @else
                          <!-- nous affichons ici 6 autres images de vetement et autre pour la hommes -->
                          @foreach($articles_12_h as $article)

                          <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                            <div class="card product-card"><span class="badge badge-{{ $article->couleur_statut}} badge-shadow">{{ $article->statut}}</span>
                              <button class="btn-wishlist btn-sm" data-toggle="tooltip" data-placement="left" title="Ajouter aux favories"><a href="{{url('/favories',[$article->ref_article])}}" ><i class="czi-heart"></i></a></button><a class="card-img-top d-block overflow-hidden" href="{{url('/',[$article->ref_article])}}"><img src="{{ asset('img/shop/catalog/'.$article->image_article) }}" alt="Product"></a>
                              <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="{{url('/',[$article->ref_article])}}">{{$article->type_article }}</a>
                                <h3 class="product-title font-size-sm"><a href="{{url('/',[$article->ref_article])}}">{{$article->libelle_article }}</a></h3>
                                <div class="d-flex justify-content-between">
                                  <div class="product-price"><span class="text-accent">{{number_format($article->prix,0,",",".") }}<small> Fcfa</small></span>
                                  </div>
                                  <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i><i class="sr-star czi-star"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        @endforeach
                  @endif
  
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Category (Kids)-->
    <section class="container pt-lg-4 mb-4 mb-md-5">
      <div class="row">
        <!-- Banner with controls-->
        <div class="col-md-5">
          <div class="d-flex flex-column h-100 overflow-hidden rounded-lg" style="background-color: #eba170;">
            <div class="d-flex justify-content-between px-grid-gutter py-grid-gutter">
              <div>
                <h3 class="mb-1">Double drawn & Hair factory</h3><a class="font-size-md" href="{{url('/')}}"></a>
              </div>
              <div class="cz-custom-controls" id="for-kids">
                <button type="button"><i class="czi-arrow-left"></i></button>
                <button type="button"><i class="czi-arrow-right"></i></button>
              </div>
            </div><a class="d-none d-md-block mt-auto" href="{{url('/')}}"><img class="d-block w-100" src="img/home/categories/cat-lg06.jpg" alt="Pour Enfant"></a>
          </div>
        </div>
        <!-- Product grid (enfant)-->
        <div class="col-md-7 pt-4 pt-md-0">
          <div class="cz-carousel">
            <div class="cz-carousel-inner" data-carousel-options="{&quot;nav&quot;: false, &quot;controlsContainer&quot;: &quot;#for-kids&quot;}">
              <!-- Carousel item-->
              <div>
                <div class="row mx-n2">
                  @if (Session::has('client'))
                  <!-- nous affichons ici 6 images de vetement et autre pour la enfant -->
                    @foreach($articles_6_e as $article)
              
                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card"><span class="badge badge-{{ $article->couleur_statut}} badge-shadow">{{ $article->statut}}</span>
                        <button class="btn-wishlist btn-sm" data-toggle="tooltip" data-placement="left" title="Ajouter aux favories"><a href="{{url('/favories',$article->ref_article)}}" ><i class="czi-heart"></i></a></button><a class="card-img-top d-block overflow-hidden" href="{{url('/',[$article->ref_article])}}"><img src="{{ asset('img/shop/catalog/'.$article->image_article) }}" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="{{url('/',[$article->ref_article])}}">{{$article->type_article }}</a>
                          <h3 class="product-title font-size-sm"><a href="{{url('/',[$article->ref_article])}}">{{$article->libelle_article }}</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">{{number_format($article->prix,0,",",".") }}<small> Fcfa</small></span>
                            </div>
                            <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i><i class="sr-star czi-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  @endforeach
               @else
                    <!-- nous affichons ici 6 images de vetement et autre pour la enfants -->
                    @foreach($articles_6_e as $article)

                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card"><span class="badge badge-{{ $article->couleur_statut}} badge-shadow">{{ $article->statut}}</span>
                        <button class="btn-wishlist btn-sm" data-toggle="tooltip" data-placement="left" title="Ajouter aux favories"><a href="{{url('/favories',[$article->ref_article])}}" ><i class="czi-heart"></i></a></button><a class="card-img-top d-block overflow-hidden" href="{{url('/',[$article->ref_article])}}"><img src="{{ asset('img/shop/catalog/'.$article->image_article) }}" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="{{url('/',[$article->ref_article])}}">{{$article->type_article }}</a>
                          <h3 class="product-title font-size-sm"><a href="{{url('/',[$article->ref_article])}}">{{$article->libelle_article }}</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">{{number_format($article->prix,0,",",".") }}<small> Fcfa</small></span>
                            </div>
                            <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i><i class="sr-star czi-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  @endforeach
            @endif
                  
                </div>
              </div>
              <!-- Carousel item-->
              <div>
                <div class="row mx-n2">
                  @if (Session::has('client'))
                  <!-- nous affichons ici 6 autres images de vetement et autre pour la enfant -->
                    @foreach($articles_12_e as $article)
              
                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card"><span class="badge badge-{{ $article->couleur_statut}} badge-shadow">{{ $article->statut}}</span>
                        <button class="btn-wishlist btn-sm" data-toggle="tooltip" data-placement="left" title="Ajouter aux favories"><a href="{{url('/favories',$article->ref_article)}}" ><i class="czi-heart"></i></a></button><a class="card-img-top d-block overflow-hidden" href="{{url('/',[$article->ref_article])}}"><img src="{{ asset('img/shop/catalog/'.$article->image_article) }}" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="{{url('/',[$article->ref_article])}}">{{$article->type_article }}</a>
                          <h3 class="product-title font-size-sm"><a href="{{url('/',[$article->ref_article])}}">{{$article->libelle_article }}</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">{{number_format($article->prix,0,",",".") }}<small> Fcfa</small></span>
                            </div>
                            <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i><i class="sr-star czi-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  @endforeach
               @else
                    <!-- nous affichons ici 6 autre images de vetement et autre pour les enfant -->
                    @foreach($articles_12_e as $article)

                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card"><span class="badge badge-{{ $article->couleur_statut}} badge-shadow">{{ $article->statut}}</span>
                        <button class="btn-wishlist btn-sm" data-toggle="tooltip" data-placement="left" title="Ajouter aux favories"><a href="{{url('/favories',[$article->ref_article])}}" ><i class="czi-heart"></i></a></button><a class="card-img-top d-block overflow-hidden" href="{{url('/',[$article->ref_article])}}"><img src="{{ asset('img/shop/catalog/'.$article->image_article) }}" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="{{url('/',[$article->ref_article])}}">{{$article->type_article }}</a>
                          <h3 class="product-title font-size-sm"><a href="{{url('/',[$article->ref_article])}}">{{$article->libelle_article }}</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">{{number_format($article->prix,0,",",".") }}<small> Fcfa</small></span>
                            </div>
                            <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i><i class="sr-star czi-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  @endforeach
            @endif

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Shop by brand-->

    <section class="container py-lg-4">
      <h2 class="h3 text-center pb-4">Magasinez par marque</h2>
      <div class="row">
        <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white box-shadow-sm rounded-lg py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/01.png" style="width: 150px;" alt="Brand"></a></div>
        <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white box-shadow-sm rounded-lg py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/02.png" style="width: 150px;" alt="Brand"></a></div>
        <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white box-shadow-sm rounded-lg py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/03.png" style="width: 150px;" alt="Brand"></a></div>
        <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white box-shadow-sm rounded-lg py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/04.png" style="width: 150px;" alt="Brand"></a></div>
        <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white box-shadow-sm rounded-lg py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/05.png" style="width: 150px;" alt="Brand"></a></div>
        <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white box-shadow-sm rounded-lg py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/06.png" style="width: 150px;" alt="Brand"></a></div>
        <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white box-shadow-sm rounded-lg py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/07.png" style="width: 150px;" alt="Brand"></a></div>
        <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white box-shadow-sm rounded-lg py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/08.png" style="width: 150px;" alt="Brand"></a></div>
        <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white box-shadow-sm rounded-lg py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/09.png" style="width: 150px;" alt="Brand"></a></div>
        <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white box-shadow-sm rounded-lg py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/10.png" style="width: 150px;" alt="Brand"></a></div>
        <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white box-shadow-sm rounded-lg py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/11.png" style="width: 150px;" alt="Brand"></a></div>
        <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white box-shadow-sm rounded-lg py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/brands/12.png" style="width: 150px;" alt="Brand"></a></div>
      </div>
    </section>
    <!-- Product widgets-->
    <section class="container pt-md-3 pb-4 pb-md-5 mb-lg-2">
      <div class="row">
        <div class="col-lg-4 col-md-6 mb-2 py-3">
          <div class="widget">
            <h3 class="widget-title">Meilleures ventes</h3>
            <!-- nous affichons ici les articles ayant pour statut bestsellers -->
            @foreach($articles_bestsellers as $article)
                <div class="media align-items-center pb-2 border-bottom"><a class="d-block mr-2" href="{{url('/',[$article->ref_article])}}"><img width="64" src="{{ asset('img/shop/catalog/'.$article->image_article) }}" alt="Product"/></a>
                  <div class="media-body">
                    <h6 class="widget-product-title"><a href="{{url('/',[$article->ref_article])}}">{{$article->libelle_article }}</a></h6>
                    <div class="widget-product-meta"><span class="text-accent mr-2">{{number_format($article->prix,0,",",".") }}<small> Fcfa</small></span></div>
                  </div>
                </div>
            @endforeach
            
            <p class="mb-0">...</p><a class="font-size-sm" href="{{url('/')}}"></a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-2 py-3">
          <div class="widget">
            <h3 class="widget-title">Nouveau arrivage</h3>
            <!-- nous affichons ici les articles ayant pour statut new arrivage -->
              @foreach($articles_new_arrivage as $article)
                  <div class="media align-items-center pb-2 border-bottom"><a class="d-block mr-2" href="{{url('/',[$article->ref_article])}}"><img width="64" src="{{ asset('img/shop/catalog/'.$article->image_article) }}" alt="Product"/></a>
                    <div class="media-body">
                      <h6 class="widget-product-title"><a href="{{url('/',[$article->ref_article])}}">{{$article->libelle_article }}</a></h6>
                      <div class="widget-product-meta"><span class="text-accent mr-2">{{number_format($article->prix,0,",",".") }}<small> Fcfa</small></span></div>
                    </div>
                  </div>
              @endforeach
            
            <p class="mb-0">...</p><a class="font-size-sm" href="{{url('/')}}"></a>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 d-none d-lg-block"><a class="d-block" href="shop-grid-ls.html"><img class="d-block rounded-lg" src="img/home/banners/v-banner.jpg" alt="Promo banner"></a></div>
      </div>
    </section>
    <!-- Blog + Instagram info cards-->
    <section class="container-fluid px-0">
      <div class="row no-gutters">
        <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-primary" href="blog-list-sidebar.html">
            <div class="card-body text-center"><i class="czi-edit h3 mt-2 mb-4 text-primary"></i>
              <h3 class="h5 mb-1">Read the blog</h3>
              <p class="text-muted font-size-sm">Latest store, fashion news and trends</p>
            </div></a></div>
        <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-accent" href="#">
            <div class="card-body text-center"><i class="czi-instagram h3 mt-2 mb-4 text-accent"></i>
              <h3 class="h5 mb-1">Follow on Instagram</h3>
              <p class="text-muted font-size-sm">#ShopWithCartzilla</p>
            </div></a></div>
      </div>
    </section>

 @endsection

 
    