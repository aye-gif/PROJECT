{{-- partie haut de page --}}
@extends('../header-fooster')

{{-- partie corps de page --}}

 @section('contenue')

    <!-- Page title-->
    <!-- Page Title-->
    <section class="container pt-lg-3 mb-4 mb-sm-5">
      <div class="row">
        @foreach ($affiche_article_par_categorie as $article)
            <div class="col-lg-3 col-6 px-0 px-sm-2 mb-sm-4">
              <div class="card product-card"><span class="badge badge-{{ $article->couleur_statut}} badge-shadow">{{ $article->statut}}</span>
                <button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Ajouter aux favories"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{url('/',[$article->ref_article])}}"><img src="{{ asset('img/shop/catalog/'.$article->image_article) }}" alt="Product"></a>
                <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="{{url('/',[$article->id])}}">{{$article->type_article }}</a>
                  <h3 class="product-title font-size-sm"><a href="{{url('/',[$article->id])}}">{{$article->libelle_article }}</a></h3>
                  <div class="d-flex justify-content-between">
                    <div class="product-price"><span class="text-accent">{{number_format($article->prix,2,",",".") }}<small> Fcfa</small></span>
                    </div>
                    <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i><i class="sr-star czi-star"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        @endforeach
        
      </div>
    </section>
    <!-- Toast: Added to Cart-->
    <div class="toast-container toast-bottom-center">
      <div class="toast mb-3" id="cart-toast" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white"><i class="czi-check-circle mr-2"></i>
          <h6 class="font-size-sm text-white mb-0 mr-auto">Added to cart!</h6>
          <button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="toast-body">This item has been added to your cart.</div>
      </div>
    </div>
    @endsection 