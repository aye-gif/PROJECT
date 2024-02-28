{{-- partie haut de page --}}
@extends('header-fooster')

@section('contenue')
    {{-- partie corps de page --}}
    <!-- Page title-->
    <!-- Page Content-->
    @if (Session::has('validate'))
              <div class="alert alert-success text-center">
                {{Session::get('validate')}}
              </div>
    @endif
    <div class="container py-4 py-lg-5 my-4">
      <div class="row">
        <div class="col-md-6">
          <div class="card border-0 box-shadow">
            <div class="card-body">
              <h2 class="h4 mb-1">S'identifier</h2>
              <div class="py-3">
                <h3 class="d-inline-block align-middle font-size-base font-weight-semibold mb-2 mr-2">Avec compte social :</h3>
                <div class="d-inline-block align-middle"><a class="social-btn sb-google mr-2 mb-2" href="#" data-toggle="tooltip" title="Sign in with Google"><i class="czi-google"></i></a><a class="social-btn sb-facebook mr-2 mb-2" href="#" data-toggle="tooltip" title="Sign in with Facebook"><i class="czi-facebook"></i></a><a class="social-btn sb-twitter mr-2 mb-2" href="#" data-toggle="tooltip" title="Sign in with Twitter"><i class="czi-twitter"></i></a></div>
              </div>
              <hr>
              <h3 class="font-size-base pt-4 pb-2">Ou via le formulaire ci-dessous</h3>
                  @if (Session::has('error'))
                      <div class="alert alert-danger">
                        {{Session::get('error')}}
                      </div>
                  @endif
              <form class="needs-validation" action="{{url('accessaccount' )}}" method="POST">
                @csrf
                <div class="input-group-overlay form-group">
                  <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-mail"></i></span></div>
                  <input class="form-control prepended-form-control" type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group-overlay form-group">
                  <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-locked"></i></span></div>
                  <div class="password-toggle">
                    <input class="form-control prepended-form-control" type="password" name="password" placeholder="Password" required>
                    <label class="password-toggle-btn">
                      <input class="custom-control-input" type="checkbox"><i class="czi-eye password-toggle-indicator"></i><span class="sr-only">Montrer le mot de passe</span>
                    </label>
                  </div>
                </div>
                <div class="d-flex flex-wrap justify-content-between">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" checked id="remember_me">
                    <label class="custom-control-label" for="remember_me">Souviens-toi de moi</label>
                  </div><a class="nav-link-inline font-size-sm" href="{{url('/client/PasswordForget')}}">Mot de passe oublié?</a>
                </div>
                <hr class="mt-4">
                <div class="text-right pt-4">
                  <button class="btn btn-primary" type="submit"><i class="czi-sign-in mr-2 ml-n21"></i>S'identifier</button>
                </div>
              </form>

            </div>
          </div>
        </div>

        <div class="col-md-6 pt-4 mt-3 mt-md-0">
          <h2 class="h4 mb-3">Pas de compte? S'inscrire</h2>
          <div class="py-3">
            <h3 class="d-inline-block align-middle font-size-base font-weight-semibold mb-2 mr-2">Avec compte social :</h3>
            <div class="d-inline-block align-middle"><a class="social-btn sb-google mr-2 mb-2" href="#" data-toggle="tooltip" title="S'inscris avec Google"><i class="czi-google"></i></a><a class="social-btn sb-facebook mr-2 mb-2" href="#" data-toggle="tooltip" title="S'inscris avec Facebook"><i class="czi-facebook"></i></a><a class="social-btn sb-twitter mr-2 mb-2" href="#" data-toggle="tooltip" title="S'inscris avec Twitter"><i class="czi-twitter"></i></a></div>
          </div>
          <p class="font-size-sm text-muted mb-4">L'inscription prend moins d'une minute mais vous donne un contrôle total sur vos commandes.</p>
           @if (count($errors) > 0 )
               <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{$error}}</li>
                      @endforeach
                  </ul>
               </div>
           @endif
           @if (Session::has('status'))
              <div class="alert alert-success text-center">
                {{Session::get('status')}}
              </div>
           @endif
          <form action="{{url('createaccount')}}" method="POST">
            @csrf
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-fn">Nom de famille</label>
                  <input class="form-control" type="text" name="nom" required id="reg-fn">
                  <div class="invalid-feedback">Entrez votre Nom de famille s'il vous plait!</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-ln">Prénoms</label>
                  <input class="form-control" type="text" name="prenoms" required id="reg-ln">
                  <div class="invalid-feedback">Veuillez entrer vos Prénoms!</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-email">Adresse e-mail</label>
                  <input class="form-control" type="email" name="email" required id="reg-email">
                  <div class="invalid-feedback">Veuillez saisir une adresse e-mail valide!</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="phone">Numéro de téléphone</label>
                  <input class="form-control" type="tel" name="telephone" required id="reg-phone">
                  <div class="invalid-feedback">Veuillez entrer votre numéro de téléphone!</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-password">Mot de passe</label>
                  <input class="form-control" type="password" name="password" required id="reg-password">
                  <div class="invalid-feedback"><small>Votre mot de passe doit comporter entre 8 et 20 caractères, contenir des lettres et des chiffres et ne doit pas contenir d’espaces, de caractères spéciaux ou d’emoji</small></div>
                </div>
              </div>
            </div>
            <div class="text-right">
              <button class="btn btn-primary" type="submit"><i class="czi-user mr-2 ml-n1"></i>S'inscrire</button>
            </div>
          </form>
        </div>
      </div>

    </div>
    @endsection