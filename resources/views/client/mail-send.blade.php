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
                            <div class="p-2 p-sm-2">
                                <div class="text-center">
                                    <!-- Logo -->
                                    <a href="{{url('/')}}">
                                        <img class="h-100px mb-0"  width="142" src="../../img/Logo.png" alt="VirtuallStore"/>  
                                    </a><br>
                                    <!-- Title -->
                                    <h4 class="mb-0 fw-light">Vous avez recu un lien par mail pour renitialiser votre password !</h4>
                                </div>
                                <div id="errorContainer" class="text-danger text-center p-4"></div>
    
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