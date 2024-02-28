{{-- partie haut de page --}}
@extends('header-fooster')

@section('contenue')
{{-- partie corps de page --}}
    <!-- Page title-->
    <!-- Page Content-->
    <div class="container py-4 py-lg-5 my-4">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <h2 class="h3 mb-4">Vous avez oublié votre mot de passe ?</h2>
          <p class="font-size-md">Changez votre mot de passe en trois étapes faciles. Cela permet de sécuriser votre nouveau mot de passe.</p>
          <ol class="list-unstyled font-size-md">
            <li><span class="text-primary mr-2">1.</span>Remplissez votre adresse e-mail ci-dessous.</li>
            <li><span class="text-primary mr-2">2.</span>Nous vous enverrons un code temporaire par e-mail.</li>
            <li><span class="text-primary mr-2">3.</span>Utilisez le code pour changer votre mot de passe sur notre site Web sécurisé.</li>
          </ol>
          <div class="card py-2 mt-4">
            <form class="card-body needs-validation" novalidate>
              <div class="form-group">
                <label for="recover-email">Entrez votre adresse e-mail</label>
                <input class="form-control" type="email" id="recover-email" required>
                <div class="invalid-feedback">Veuillez fournir une adresse e-mail valide.</div>
              </div>
              <button class="btn btn-primary" type="submit">Obtenir un nouveau mot de passe</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer-->
    <!-- Footer-->
    @endsection