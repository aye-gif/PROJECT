{{-- partie haut de page --}}
@extends('header-fooster')
@section('title')
  shop-single-v1
  @endsection
{{-- partie corps de page --}}

@section('contenue')
    <!-- Page title-->
    <!-- Page Title-->

    <div class="page-title-overlap bg-dark pt-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="{{url('/')}}"><i class="czi-home"></i>Acceuil</a></li>
              <li class="breadcrumb-item text-nowrap"><a href="#">Shop</a>
              </li>
              <li class="breadcrumb-item text-nowrap active" aria-current="page">{{$affiche_info_article->type_article}}</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
          <h1 class="h3 text-light mb-0">{{$affiche_info_article->libelle_article}}</h1>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container">
      <!-- Gallery + details-->
      <div class="bg-light box-shadow-lg rounded-lg px-4 py-3 mb-5">
        <div class="px-lg-3">
          <div class="row">
            <!-- Product gallery-->
            <div class="col-lg-7 pr-lg-0 pt-lg-4">
              <div class="cz-product-gallery">
                <div class="cz-preview order-sm-2">
                  <div class="cz-preview-item active" id="first"><img class="cz-image-zoom" src="{{ asset('img/shop/catalog/'.$affiche_info_article->image_article) }}" data-zoom="{{ asset('img/shop/catalog/'.$affiche_info_article->image_article) }}" alt="Product image">
                    <div class="cz-image-zoom-pane"></div>
                  </div>
                  <div class="cz-preview-item" id="second"><img class="cz-image-zoom" src="{{ asset('img/shop/catalog/'.$affiche_info_article->image2_article) }}" data-zoom="{{ asset('img/shop/catalog/'.$affiche_info_article->image2_article) }}" alt="Product image">
                    <div class="cz-image-zoom-pane"></div>
                  </div>
                  <div class="cz-preview-item" id="third"><img class="cz-image-zoom" src="{{ asset('img/shop/catalog/'.$affiche_info_article->image3_article) }}" data-zoom="{{ asset('img/shop/catalog/'.$affiche_info_article->image3_article) }}" alt="Product image">
                    <div class="cz-image-zoom-pane"></div>
                  </div>
                </div>
                <div class="cz-thumblist order-sm-1"><a class="cz-thumblist-item active" href="#first"><img src="{{ asset('img/shop/catalog/'.$affiche_info_article->image_article) }}" alt="Product thumb"></a><a class="cz-thumblist-item" href="#second"><img src="{{ asset('img/shop/catalog/'.$affiche_info_article->image2_article) }}" alt="Product thumb"></a><a class="cz-thumblist-item" href="#third"><img src="{{ asset('img/shop/catalog/'.$affiche_info_article->image3_article) }}" alt="Product thumb"></a><a class="cz-thumblist-item video-item" href="https://www.youtube.com/watch?v=1vrXpMLLK14">
                    <div class="cz-thumblist-item-text"><i class="czi-video"></i>Video</div></a></div>
              </div>
            </div>
            <!-- Product details-->
            <div class="col-lg-5 pt-4 pt-lg-0">
              <form class="mb-grid-gutter" method="POST" action="{{url('/addtocart',[$affiche_info_article->id])}}">
                  @method('PUT')
                  @csrf

                  <input class="custom-control-input" type="hidden" name="libelle_article" value="{{ $affiche_info_article->libelle_article }}">
                  <input class="custom-control-input" type="hidden" name="prix" value="{{ $affiche_info_article->prix }}">
                  <input class="custom-control-input" type="hidden" name="image_article" value="{{ $affiche_info_article->image_article }}">

                <div class="product-details ml-auto pb-3">
                  <div class="d-flex justify-content-between align-items-center mb-2"><a href="#reviews" data-scroll>
                      <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i>
                      </div><span class="d-inline-block font-size-sm text-body align-middle mt-1 ml-1">{{count($affiche_commentaire_article)}} Commentaires</span></a>
                    <button class="btn-wishlist mr-0 mr-lg-n3" type="button" data-toggle="tooltip" title="Ajouter aux favories"><a href="" ><i class="czi-heart"></i></a></button>
                  </div>
                  <div class="mb-3"><span class="h3 font-weight-normal text-accent mr-1">{{$affiche_info_article->prix}}<small> Fcfa</small></span>
                    <del class="text-muted font-size-lg mr-3">{{$affiche_info_article->prix_2}}<small> Fcfa</small></del><span class="badge badge-{{$affiche_info_article->couleur_statut}} badge-shadow align-middle mt-n2">{{$affiche_info_article->statut}}</span>
                  </div>
                  <div class="font-size-sm mb-4"><span class="text-heading font-weight-medium mr-1">Couleur :</span>
                    <span class="text-muted" id="colorOption">
                      @foreach ($affiche_couleur_article as $resultat)
                        {{ $resultat->libelle_couleur }}
                      @endforeach
                    </span>
                  </div>

                  <div class="position-relative mr-n4 mb-3">
                    @foreach ($affiche_couleur_article as $resultat)
                      <div class="custom-control custom-option custom-control-inline mb-2">
                        <input class="custom-control-input" type="radio" name="couleur" id="{{ $resultat->ref_couleur }}" data-label="colorOption" value="{{ $resultat->libelle_couleur }}" checked>
                        <label class="custom-option-label rounded-circle" for="{{ $resultat->ref_couleur }}"><span class="custom-option-color rounded-circle" style="background-color: {{ $resultat->lien_couleur }}"></span></label>
                      </div>
                    @endforeach

                    <div class="product-badge product-available mt-n1"><i class="czi-security-check"></i>{{ $affiche_info_article->disponibilite }}</div>
                  </div>

                    <div class="form-group">
                      <div class="d-flex justify-content-between align-items-center pb-1">
                        <label class="font-weight-medium" for="product-size">Taille :</label><a class="nav-link-style font-size-sm" href="#size-chart" data-toggle="modal"><i class="czi-ruler lead align-middle mr-1 mt-n1"></i>Taille guide</a>
                      </div>
                      <select class="custom-select" required id="product-size" name="taille_article">
                          @foreach ($affiche_taille_article as $taille)
                            <option value="{{ $taille->libelle_taille_article }}">{{ $taille->libelle_taille_article }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <button class="btn btn-primary btn-shadow btn-block" type="submit" data-toggle="toast" data-target="#cart-toast"><i class="czi-cart font-size-lgy"></i> Ajouter au panier</button>
                      </div>
                    </div>
                  </div>
                </form>
                <!-- Product panels-->
                <div class="accordion mb-4" id="productPanels">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="accordion-heading"><a href="#productInfo" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="productInfo"><i class="czi-announcement text-muted font-size-lg align-middle mt-n1 mr-2"></i>Produit info<span class="accordion-indicator"></span></a></h3>
                    </div>
                    <div class="collapse show" id="productInfo" data-parent="#productPanels">
                      <div class="card-body">
                        <h6 class="font-size-sm mb-2">Composition</h6>
                        <ul class="font-size-sm pl-4">
                          <li>{{$affiche_detail_article->libelle1}}: {{$affiche_detail_article->valeur1}}</li>
                          <li>{{$affiche_detail_article->libelle2}}: {{$affiche_detail_article->valeur2}}</li>
                          <li>{{$affiche_detail_article->libelle3}} {{$affiche_detail_article->valeur3}}</li>
                        </ul>
                        <h6 class="font-size-sm mb-2">Art. No.</h6>
                        <ul class="font-size-sm pl-4 mb-0">
                          <li>{{$affiche_info_article->Num_article}}</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="accordion-heading"><a class="collapsed" href="#shippingOptions" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="shippingOptions"><i class="czi-delivery text-muted lead align-middle mt-n1 mr-2"></i>les options d'expédition<span class="accordion-indicator"></span></a></h3>
                    </div>
                    <div class="collapse" id="shippingOptions" data-parent="#productPanels">
                      <div class="card-body font-size-sm">
                        <div class="d-flex justify-content-between border-bottom pb-2">
                          <div>
                            <div class="font-weight-semibold text-dark">A domicile</div>
                            <div class="font-size-sm text-muted">Livraison entre 1 - 2 jours</div>
                          </div>
                          <div>1.500 Fr</div>
                        </div>
                        <div class="d-flex justify-content-between py-2">
                          <div>
                            <div class="font-weight-semibold text-dark">Notre magasin</div>
                            <div class="font-size-sm text-muted">Se rendre dans nos locaux pour le retrait </div>
                          </div>
                          <div>0 Fr</div>
                        </div>

                      </div>
                    </div>
                  </div>

                </div>
                <!-- Sharing-->
                <h6 class="d-inline-block align-middle font-size-base my-2 mr-2">Partager:</h6><a class="share-btn sb-twitter mr-2 my-2" href="#"><i class="czi-twitter"></i>Twitter</a><a class="share-btn sb-instagram mr-2 my-2" href="#"><i class="czi-instagram"></i>Instagram</a><a class="share-btn sb-facebook my-2" href="#"><i class="czi-facebook"></i>Facebook</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Product description section 1-->
      <div class="row align-items-center py-md-3" id="monDiv">
        <div class="col-lg-5 col-md-6 offset-lg-1 order-md-2"><img class="d-block rounded-lg" src="{{ asset('img/shop/catalog/'.$affiche_info_article->image_article) }}" alt="Image"></div>
        <div class="col-lg-4 col-md-6 offset-lg-1 py-4 order-md-1">
          <h2 class="h3 mb-4 pb-2">Matériaux de haute qualité</h2>
          <h6 class="font-size-base mb-3">{{$affiche_info_article->libelle5}}</h6>
          <p class="font-size-sm text-muted pb-2">{{$affiche_info_article->libelle4}} {{$affiche_info_article->valeur4}}</p>
          <h6 class="font-size-base mb-3">Instructions</h6>
          <ul class="nav nav-tabs mb-3" role="tablist">
            <li class="nav-item"><a class="nav-link active" href="#wash" data-toggle="tab" role="tab"><i class="czi-wash font-size-xl"></i></a></li>
            <li class="nav-item"><a class="nav-link" href="#bleach" data-toggle="tab" role="tab"><i class="czi-bleach font-size-xl"></i></a></li>
            <li class="nav-item"><a class="nav-link" href="#hand-wash" data-toggle="tab" role="tab"><i class="czi-hand-wash font-size-xl"></i></a></li>
            <li class="nav-item"><a class="nav-link" href="#ironing" data-toggle="tab" role="tab"><i class="czi-ironing font-size-xl"></i></a></li>
            <li class="nav-item"><a class="nav-link" href="#dry-clean" data-toggle="tab" role="tab"><i class="czi-dry-clean font-size-xl"></i></a></li>
          </ul>
          <div class="tab-content text-muted font-size-sm">
            <div class="tab-pane fade show active" id="wash" role="tabpanel">Lavage en machine doux à 30°</div>
            <div class="tab-pane fade" id="bleach" role="tabpanel">Ne pas utiliser d'eau de Javel</div>
            <div class="tab-pane fade" id="hand-wash" role="tabpanel">Lavage à la main normal (30°)</div>
            <div class="tab-pane fade" id="ironing" role="tabpanel">Repassage à basse température</div>
            <div class="tab-pane fade" id="dry-clean" role="tabpanel">Ne pas nettoyer à sec</div>
          </div>
        </div>
      </div>

    </div>
    <!-- -->
    <div class="border-top border-bottom my-lg-3 py-5">
      <div class="container pt-md-2" id="reviews">
        <div class="row pb-3">
          <div class="col-lg-4 col-md-5">
            <h2 class="h3 mb-4">{{count($affiche_commentaire_article)}} Commentaires</h2>
            <div class="star-rating mr-2"><i class="czi-star-filled font-size-sm text-accent mr-1"></i><i class="czi-star-filled font-size-sm text-accent mr-1"></i><i class="czi-star-filled font-size-sm text-accent mr-1"></i><i class="czi-star-filled font-size-sm text-accent mr-1"></i><i class="czi-star font-size-sm text-muted mr-1"></i></div><span class="d-inline-block align-middle">4.1 Note globale</span>
            <p class="pt-3 font-size-sm text-muted">{{count($affiche_commentaire_article)}} sur {{count($compte_total_commentaire)}} ({{count($compte_total_commentaire) +count($affiche_commentaire_article)}}%)<br>Les clients ont recommandé ce produit</p>
          </div>

          <div class="col-lg-8 col-md-7">
            <div class="d-flex align-items-center mb-2">
              <div class="text-nowrap mr-3"><span class="d-inline-block align-middle text-muted">5</span><i class="czi-star-filled font-size-xs ml-1"></i></div>
              <div class="w-100">
                <div class="progress" style="height: 4px;">
                  <div class="progress-bar bg-success" role="progressbar" style="width: {{count($affiche_etoile_5)}}%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><span class="text-muted ml-3">{{count($affiche_etoile_5)}}</span>
            </div>
            <div class="d-flex align-items-center mb-2">
              <div class="text-nowrap mr-3"><span class="d-inline-block align-middle text-muted">4</span><i class="czi-star-filled font-size-xs ml-1"></i></div>
              <div class="w-100">
                <div class="progress" style="height: 4px;">
                  <div class="progress-bar" role="progressbar" style="width: {{count($affiche_etoile_4)}}%; background-color: #a7e453;" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><span class="text-muted ml-3">{{count($affiche_etoile_4)}}</span>
            </div>
            <div class="d-flex align-items-center mb-2">
              <div class="text-nowrap mr-3"><span class="d-inline-block align-middle text-muted">3</span><i class="czi-star-filled font-size-xs ml-1"></i></div>
              <div class="w-100">
                <div class="progress" style="height: 4px;">
                  <div class="progress-bar" role="progressbar" style="width: {{count($affiche_etoile_3)}}%; background-color: #ffda75;" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><span class="text-muted ml-3">{{count($affiche_etoile_3)}}</span>
            </div>
            <div class="d-flex align-items-center mb-2">
              <div class="text-nowrap mr-3"><span class="d-inline-block align-middle text-muted">2</span><i class="czi-star-filled font-size-xs ml-1"></i></div>
              <div class="w-100">
                <div class="progress" style="height: 4px;">
                  <div class="progress-bar" role="progressbar" style="width: {{count($affiche_etoile_2)}}%; background-color: #fea569;" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><span class="text-muted ml-3">{{count($affiche_etoile_2)}}</span>
            </div>
            <div class="d-flex align-items-center">
              <div class="text-nowrap mr-3"><span class="d-inline-block align-middle text-muted">1</span><i class="czi-star-filled font-size-xs ml-1"></i></div>
              <div class="w-100">
                <div class="progress" style="height: 4px;">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: {{count($affiche_etoile_1)}}%;" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><span class="text-muted ml-3">{{count($affiche_etoile_1)}}</span>
            </div>
          </div>

        </div>
        <hr class="mt-4 pb-4 mb-3">
        <div class="row">
          <!-- Reviews list-->
          <div class="col-md-7">
            <div class="d-flex justify-content-end pb-4">
              <div class="form-inline flex-nowrap">

              </div>
            </div>
            <!-- voir les commentaire-->
            @if (Session::has('client'))
                @foreach ($affiche_commentaire_article as $resultat)
                    <div class="product-review pb-4 mb-4 border-bottom">
                      <div class="d-flex mb-3">
                        <div class="media media-ie-fix align-items-center mr-4 pr-2"><img class="rounded-circle" width="80" src="img/shop/reviews/01.jpg" alt="Rafael Marquez"/>
                          <div class="media-body pl-3">
                            <h6 class="font-size-sm mb-0">{{ $resultat->nom }}</h6><span class="font-size-ms text-muted">{{ $resultat->date }}</span>
                          </div>
                        </div>
                        <div>
                          <div class="star-rating">

                              @for ($i = 1; $i <= $resultat->etoile; $i++)
                                  <i class="sr-star czi-star-filled active"></i>
                              @endfor
                              @for ($i = $resultat->etoile + 1; $i <= 5; $i++)
                                  <i class="sr-star czi-star"></i>
                              @endfor

                          </div>
                        </div>
                      </div>
                      <p class="font-size-md mb-2">{{ $resultat->commentaire }}</p>

                      <div class="text-nowrap" id="commentaire-{{$resultat->id}}">
                        <a class="btn-like" data-comment-id="1" href="{{url('CommentLike/'.$resultat->id)}}"><span class="like-count">{{$resultat->like_comment}}</span></a>
                        <a class="btn-dislike" data-comment-id="1" href="{{url('CommentDislike/'.$resultat->id)}}"><span class="dislike-count">{{$resultat->dislike_comment}}</span></a>
                      </div>
                    </div>
                @endforeach
              @else
                <div class="text-center">
                  <button class="btn btn-outline-accent" type="button"><i class="czi-reload mr-2"></i>Veuillez vous connecter pour voir les commentaires</button>
                </div>
              @endif

          </div>

               <!-- pour ecrire les commentaires-->
                <div class="col-md-5 mt-2 pt-4 mt-md-0 pt-md-0">
                  <div class="bg-secondary py-grid-gutter px-grid-gutter rounded-lg">
                          <h3 class="h4 pb-2">Écrire un commentaire</h3>
                          <form class="needs-validation" method="POST" action="{{url('/addtocomment')}}" novalidate>
                            @method('PUT')
                            @csrf

                            <input class="form-control" name="ref_article" type="hidden" value="{{$affiche_info_article->ref_article}}">

                            <div class="form-group">
                              <label for="review-rating">Étoiles<span class="text-danger">*</span></label>
                              <select class="custom-select" name="etoile" required id="review-rating">
                                <option value="">Choisissez une étoile</option>
                                <option value="1">1 étoiles</option>
                                <option value="2">2 étoiles</option>
                                <option value="3">3 étoiles</option>
                                <option value="4">4 étoiles</option>
                                <option value="5">5 étoiles</option>
                              </select>
                              <div class="invalid-feedback">Veuillez choisir la notation !</div>
                            </div>
                            <div class="form-group">
                              <label for="review-text">Commentaire<span class="text-danger">*</span></label>
                              <textarea class="form-control" name="commentaire" rows="6" required id="review-text"></textarea>
                              <div class="invalid-feedback">S'il vous plaît écrivez un commentaire</div><small class="form-text text-muted">Votre commentaire doit comporter au plus 255 caractères.</small>
                            </div>

                            <button class="btn btn-primary btn-shadow btn-block" type="submit">Soumettre un commentaire</button>
                          </form>
                    </div>
                </div>
              </div>



       </div>
     </div>
    <!-- Product carousel (Style with)-->
    <div class="container pt-5">
      <h2 class="h3 text-center pb-4">Meme style</h2>
      <div class="cz-carousel cz-controls-static cz-controls-outside">
        <div class="cz-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 30}}}">
        @if (Session::has('client'))
          @foreach ($affiche_meme_type_meme_categorie as $resultat)
               <!-- Product-->
                <div>
                  <div class="card product-card card-static"><span class="badge badge-{{ $resultat->couleur_statut}} badge-shadow">{{ $resultat->statut}}</span>
                    <button class="btn-wishlist btn-sm" data-toggle="tooltip" data-placement="left" title="Ajouter aux favories"><a href="{{url('/favories',[$resultat->ref_article])}}" ><i class="czi-heart"></i></a></button><a class="card-img-top d-block overflow-hidden" href="{{url('/',[$resultat->ref_article])}}"><img src="{{ asset('img/shop/catalog/'.$resultat->image_article) }}" alt="Product"></a>
                    <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="{{url('/',[$resultat->ref_article])}}">{{$resultat->type_article }}</a>
                      <h3 class="product-title font-size-sm"><a href="{{url('/',[$resultat->ref_article])}}">{{$resultat->libelle_article }}</a></h3>
                      <div class="d-flex justify-content-between">
                        <div class="product-price"><span class="text-accent">{{number_format($resultat->prix,2,",",".") }}<small> Fcfa</small></span>
                        </div>
                        <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i><i class="sr-star czi-star"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
           @endforeach
        @else
              @foreach ($affiche_meme_type_meme_categorie as $resultat)
                <!-- Product-->
                <div>
                  <div class="card product-card card-static"><span class="badge badge-{{ $resultat->couleur_statut}} badge-shadow">{{ $resultat->statut}}</span>
                    <button class="btn-wishlist btn-sm" data-toggle="tooltip" data-placement="left" title="Ajouter aux favories"><a href="#" ><i class="czi-heart"></i></a></button><a class="card-img-top d-block overflow-hidden" href="{{url('/',[$resultat->ref_article])}}"><img src="{{ asset('img/shop/catalog/'.$resultat->image_article) }}" alt="Product"></a>
                    <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="{{url('/',[$resultat->ref_article])}}">{{$resultat->type_article }}</a>
                      <h3 class="product-title font-size-sm"><a href="{{url('/',[$resultat->ref_article])}}">{{$resultat->libelle_article }}</a></h3>
                      <div class="d-flex justify-content-between">
                        <div class="product-price"><span class="text-accent">{{number_format($resultat->prix,2,",",".") }}<small> Fcfa</small></span>
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
    <!-- Toast: Added to Cart-->
    <div class="toast-container toast-bottom-center">
      <div class="toast mb-3" id="cart-toast" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white"><i class="czi-check-circle mr-2"></i>
          <h6 class="font-size-sm text-white mb-0 mr-auto">Article ajouter avec succes!</h6>
          <button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="toast-body">Cet article a été ajouté à votre panier.</div>
      </div>
    </div>
    <!-- Product carousel (You may also like)-->
    <div class="container py-5 my-md-3">
      <h2 class="h3 text-center pb-4">Vous pouvez aimer aussi</h2>
      <div class="cz-carousel cz-controls-static cz-controls-outside">
        <div class="cz-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 30}}}">
          <!-- Product-->
        @if (Session::has('client'))
          @foreach ($affiche_different_type_meme_categorie as $resultat)
               <!-- Product-->
                <div>
                  <div class="card product-card card-static"><span class="badge badge-{{ $resultat->couleur_statut}} badge-shadow">{{ $resultat->statut}}</span>
                    <button class="btn-wishlist btn-sm" data-toggle="tooltip" data-placement="left" title="Ajouter aux favories"><a href="{{url('/favories',[$resultat->ref_article])}}" ><i class="czi-heart"></i></a></button><a class="card-img-top d-block overflow-hidden" href="{{url('/',[$resultat->ref_article])}}"><img src="{{ asset('img/shop/catalog/'.$resultat->image_article) }}" alt="Product"></a>
                    <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="{{url('/',[$resultat->ref_article])}}">{{$resultat->type_article }}</a>
                      <h3 class="product-title font-size-sm"><a href="{{url('/',[$resultat->ref_article])}}">{{$resultat->libelle_article }}</a></h3>
                      <div class="d-flex justify-content-between">
                        <div class="product-price"><span class="text-accent">{{number_format($resultat->prix,2,",",".") }}<small> Fcfa</small></span>
                        </div>
                        <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i><i class="sr-star czi-star"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
          @else
                @foreach ($affiche_different_type_meme_categorie as $resultat)
                <!-- Product-->
                <div>
                  <div class="card product-card card-static"><span class="badge badge-{{ $resultat->couleur_statut}} badge-shadow">{{ $resultat->statut}}</span>
                    <button class="btn-wishlist btn-sm" data-toggle="tooltip" data-placement="left" title="Ajouter aux favories"><a href="#" ><i class="czi-heart"></i></a></button><a class="card-img-top d-block overflow-hidden" href="{{url('/',[$resultat->ref_article])}}"><img src="{{ asset('img/shop/catalog/'.$resultat->image_article) }}" alt="Product"></a>
                    <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="{{url('/',[$resultat->ref_article])}}">{{$resultat->type_article }}</a>
                      <h3 class="product-title font-size-sm"><a href="{{url('/',[$resultat->ref_article])}}">{{$resultat->libelle_article }}</a></h3>
                      <div class="d-flex justify-content-between">
                        <div class="product-price"><span class="text-accent">{{number_format($resultat->prix,2,",",".") }}<small> Fcfa</small></span>
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



@endsection
