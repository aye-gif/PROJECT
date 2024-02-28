@include('admin.header')

    <section class="pt-0">
        <div class="container vstack gap-4">
            
            <!-- Booking table START -->
            <div class="row">
                <div class="col-12">
                    <div class="card border rounded-3">
                        <!-- Card header START -->
                        <div class="card-header border-bottom">
                            <div class="d-sm-flex justify-content-between align-items-center">
                                <h5 class="mb-2 mb-sm-0">Liste des Catégories</h5>
                                <a href="" class="btn btn-sm btn-primary mb-0">AJOUTER</a>
                            </div>
                        </div>
                        <!-- Card header END -->

                        <!-- Card body START -->
                        <div class="card-body">
                           

                            <!-- Hotel room list START -->
                            <div class="table-responsive border-0">
                                <table class="table align-middle p-4 mb-0 table-hover table-shrink">
                                    <!-- Table head -->
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" class="border-0 rounded-start">#</th>
                                            <th scope="col" class="border-0">Rèference marque</th>
                                            <th scope="col" class="border-0">libellé marque</th>
                                            <th scope="col" class="border-0 rounded-end text-center"></th>
                                            <th scope="col" class="border-0 rounded-end text-center"></th>
                                            <th scope="col" class="border-0 rounded-end text-center"></th>
                                        </tr>
                                    </thead>

                                    <!-- Table body START -->
                                    <tbody class="border-top-0">
                                        <!-- Table item -->
                                        @foreach ($affiche_marque as $resultat)
                                            <tr>
                                                <td> <h6 class="mb-0">{{$resultat->id}}</h6> </td>
                                                <td> <h6 class="mb-0"><a href="#">{{$resultat->ref_marque}}</a></h6> </td>
                                                <td> <h6 class="mb-0"><a href="#">{{$resultat->libelle_marque}}</a></h6></td>
                                                <td> <h6 class="mb-0"><a href="#"></a></h6></td>
                                                <td colspan="3" class="text-center"> 
                                                    <a href="" class="btn btn-sm btn-primary mb-0">Modifier</a>
                                                    <a href="" class="btn btn-sm btn-danger mb-0">Supprimer</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <!-- Table body END -->
                                </table>
                            </div>
                            <!-- Hotel room list END -->
                        </div>
                        <!-- Card body END -->
                    </div>
                </div>
            </div>	
            <!-- Booking table END -->
        </div>
    </section>
    
    <section class="pt-3">
        <div class="container">
            <div class="row">
    
                <!-- Sidebar START -->
                <div class="col-lg-4 col-xl-3">
                    <!-- Responsive offcanvas body START -->
                    <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="offcanvasSidebar" >
                        <!-- Offcanvas header -->
                        <div class="offcanvas-header justify-content-end pb-2">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
                        </div>
    
                        <!-- Offcanvas body -->
                        <div class="offcanvas-body p-3 p-lg-0">
                            <div class="card bg-light w-100">
    
                                <!-- Card body START -->
                                <div class="card-body p-3">
                                    
                                    <!-- Sidebar menu item START -->
                                    <ul class="nav nav-pills-primary-soft flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('admin/AjouterArticle')}}"><i class="bi bi-person fa-fw me-2"></i>Mes articles</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('admin/AjouterCategorie')}}"><i class="bi bi-ticket-perforated fa-fw me-2"></i>Catégories</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('admin/AjouterDetail')}}"><i class="bi bi-people fa-fw me-2"></i>Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('admin/AjouterTaille')}}"><i class="bi bi-people fa-fw me-2"></i>Taille article</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="{{url('admin/AjouterMarque')}}"><i class="bi bi-wallet fa-fw me-2"></i>Marques</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('admin/AjouterFournisseur')}}"><i class="bi bi-heart fa-fw me-2"></i>Fournisseur</a>
                                        </li>
                                       
                                    </ul>
                                    <!-- Sidebar menu item END -->
                                </div>
                                <!-- Card body END -->
                            </div>
                        </div>
                    </div>	
                    <!-- Responsive offcanvas body END -->	
                </div>
                <!-- Sidebar END -->
    
                <!-- Main content START -->
                <div class="col-lg-8 col-xl-9">
    
                    <!-- Offcanvas menu button -->
                    <div class="d-grid mb-0 d-lg-none w-100">
                        <button class="btn btn-primary mb-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                            <i class="fas fa-sliders-h"></i> Menu
                        </button>
                    </div>
    
                    <div class="vstack gap-4">
    
    
                        <!-- Personal info START -->
                        <div class="card border">
                            <!-- Card header -->
                            <div class="card-header border-bottom">
                                <h4 class="card-header-title">Ajouter une marque</h4>
                            </div>
    
                            <!-- Card body START -->
                            <div class="card-body">
                                <!-- Form START -->
                                <form class="row g-3" action="{{url('admin/NewMarque')}}" method="POST">
                                    @csrf
                                    <!-- reference -->
                                    <div class="col-md-6">
                                        <label class="form-label">Réference Marque<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control"  placeholder="Réference Marque" name="ref_marque" disabled>
                                    </div>
    
                                    <!-- libelle -->
                                    <div class="col-md-6">
                                        <label class="form-label">Libelle Marque<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="libelle marque" name="libelle_marque">
                                    </div>
    
                                    <!-- Button -->
                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn btn-primary mb-0">Ajouter</button>
                                    </div>
                                </form>
                                <!-- Form END -->
                            </div>
                            <!-- Card body END -->
                        </div>
                        <!-- Personal info END -->
    
                    </div>
                </div>
                <!-- Main content END -->
    
            </div>
        </div>
    </section>
    <!-- =======================
    Content END -->
    
    </main>
    <!-- **************** MAIN CONTENT END **************** -->
@include('admin.fooster')