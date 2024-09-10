
{{-- partie haut de page --}}
@extends('header-fooster')

@section('contenue')
{{-- partie corps de page --}}
     <!-- Page title-->
    <!-- Page Content-->
    {{-- @if (Session::has('CommandeValidate'))
          <div class="alert alert-success text-center">
              {{Session::get('CommandeValidate')}}
          </div>
    @endif --}}
    <div class="container pb-5 mb-sm-4">
      <div class="pt-5">
        <div class="card py-3 mt-sm-3">
          <div class="card-body text-center">
            <h2 class="h4 pb-3">Nous vous remercions pour votre commande</h2>
            <p class="font-size-sm mb-2">Votre commande a été passée et bien traitée</p>
            <p class="font-size-sm mb-2">Assurez-vous de noter votre numéro de commande, qui est <span class='font-weight-medium text-primary'>{{Session('numero')}}</span></p>
            <p class="font-size-sm">Vous recevrez par whatsapp chaque jour un message avec un lien pour proceder aux differents paiement, <u>tu peux maintenant :</u></p><a class="btn btn-secondary mt-3 mr-3" href="{{url('/')}}">Retourner faire les courses</a><a class="btn btn-primary mt-3" href="{{url('/client/order/'.Session::get('numero'))}}"><i class="fas fa-credit-card"></i>&nbsp;Passer au paiement</a>
          </div>
        </div>
      </div>
    </div>
@endsection  