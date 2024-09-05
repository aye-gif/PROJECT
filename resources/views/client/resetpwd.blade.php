{{-- partie haut de page --}}
@extends('header-fooster')

@section('contenue')
{{-- partie corps de page --}}
    <!-- Page title-->
    <!-- Page Content--><br><br><br>
    <section class="vh-xxl-100">
        <div class="container h-100 d-flex px-0 px-sm-4">
            <div class="row justify-content-center align-items-center m-auto">
                <div class="col-12">
                    <div class="row g-0">
                        <!-- Vector Image -->
                        <div class="col-12 col-lg-4 d-md-flex align-items-center order-2 order-lg-1 mb-1">
                            
                        </div>
    
                        <!-- Information -->
                        <div class=" col-12  col-lg-12 order-1 mb-5">
                            <div class="card border-0 box-shadow">
                                <div class="card-body">
                                  <h2 class="h4 mb-1">Changez votre mot de passe !</h2>
                                  {{-- <div class="py-3">
                                    <h3 class="d-inline-block align-middle font-size-base font-weight-semibold mb-2 mr-2">Avec compte social :</h3>
                                    <div class="d-inline-block align-middle"><a class="social-btn sb-google mr-2 mb-2" href="#" data-toggle="tooltip" title="Sign in with Google"><i class="czi-google"></i></a><a class="social-btn sb-facebook mr-2 mb-2" href="#" data-toggle="tooltip" title="Sign in with Facebook"><i class="czi-facebook"></i></a><a class="social-btn sb-twitter mr-2 mb-2" href="#" data-toggle="tooltip" title="Sign in with Twitter"><i class="czi-twitter"></i></a></div>
                                  </div> --}}
                                  <hr>
                                      @if (Session::has('error'))
                                          <div class="alert alert-danger">
                                            {{Session::get('error')}}
                                          </div>
                                      @endif
                                      <br><br>
                                  <form class="needs-validation" action="{{url('/client/password/reset' )}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="token" id="token" value="{{ $token }}">
                                    <div class="input-group-overlay form-group">
                                        <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-locked"></i></span></div>
                                        <div class="password-toggle">
                                          <input class="form-control prepended-form-control" type="password" name="password" placeholder="Password" required>
                                          <label class="password-toggle-btn">
                                            <input class="custom-control-input" type="checkbox"><i class="czi-eye password-toggle-indicator"></i><span class="sr-only">Montrer le mot de passe</span>
                                          </label>
                                        </div>
                                      </div>
                                    <div class="input-group-overlay form-group">
                                      <div class="input-group-prepend-overlay"><span class="input-group-text"><i class="czi-locked"></i></span></div>
                                      <div class="password-toggle">
                                        <input class="form-control prepended-form-control" type="password" name="password_confirmation" placeholder="Confirmer Password" required>
                                        <label class="password-toggle-btn">
                                          <input class="custom-control-input" type="checkbox"><i class="czi-eye password-toggle-indicator"></i><span class="sr-only">Montrer le mot de passe</span>
                                        </label>
                                      </div>
                                    </div>
                                    <hr class="mt-4">
                                    <div class="text-right pt-4">
                                      <button class="btn btn-primary" type="submit">Réinitialiser</button>
                                    </div>
                                  </form>
                    
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br><br>
    <!-- Footer-->
    <!-- Footer-->
    @endsection