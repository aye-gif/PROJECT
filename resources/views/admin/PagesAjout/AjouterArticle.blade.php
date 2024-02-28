@include('admin.header')

    <!-- =======================
    Content START -->
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
                                <a href="{{url('#AjoutArticle')}}" class="btn btn-sm btn-primary mb-0">AJOUTER</a>
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
                                            <th scope="col" class="border-0">Rèference article</th>
                                            <th scope="col" class="border-0">Numéro article</th>
                                            <th scope="col" class="border-0 rounded-end text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <!-- Table body START -->
                                    <tbody class="border-top-0">
                                        <!-- Table item -->
                                        @foreach ($affiche_article as $resultat)
                                            <tr>
                                                <td> <h6 class="mb-0">{{$resultat->id}}</h6> </td>
                                                <td> <h6 class="mb-0"><a href="#">{{$resultat->ref_article}}</a></h6> </td>
                                                <td> <h6 class="mb-0"><a href="#">{{$resultat->ref_categorie}}</a></h6></td>
                                                <td class="text-center"> 
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
            <div class="d-flex justify-content-center">
                {!! $affiche_article->links('custom') !!}
            </div>
        </div>
    </section>
    <!-- =======================
    Content END -->
    <!-- =======================
    Content START -->
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
    
                                <!-- Edit profile button -->
                                <div class="position-absolute top-0 end-0 p-3">
                                    <a href="#" class="text-primary-hover" data-bs-toggle="tooltip" data-bs-title="Edit profile">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </div>
    
                                <!-- Card body START -->
                                <div class="card-body p-3">
                                    
                                    <!-- Sidebar menu item START -->
                                    <ul class="nav nav-pills-primary-soft flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#"><i class="bi bi-person fa-fw me-2"></i>Mes articles</a>
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
                                            <a class="nav-link" href="{{url('admin/AjouterMarque')}}"><i class="bi bi-wallet fa-fw me-2"></i>Marques</a>
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
    
                    <div class="vstack gap-4" id="AjoutArticle">
    
                        <!-- Personal info START -->
                        <div class="card border">
                            <!-- Card header -->
                            <div class="card-header border-bottom">
                                <h4 class="card-header-title">Ajouter un article</h4>
                            </div>
    
                            <!-- Card body START -->
                            <div class="card-body">
                                <!-- Form START -->
                                <form class="row g-3" action="{{url('admin/NewArticle')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- image article 1 -->
                                    <div class="col-12">
                                        <div class="input-group mb-3">
                                            <input type="hidden" class="form-control" id="inputGroupFile02" name="id" value="" required>
                                            <input type="file" class="form-control" id="inputGroupFile02" name="image_1" required>
                                            <label class="input-group-text" for="inputGroupFile02">Image 1</label>
                                        </div>  
                                    </div>
                                    
                                    <!-- image article 2 -->
                                    <div class="col-12">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="inputGroupFile02" name="image_2" required>
                                            <label class="input-group-text" for="inputGroupFile02">Image 2</label>
                                        </div>  
                                    </div>

                                    <!-- image article 3 -->
                                    <div class="col-12">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="inputGroupFile02" name="image_3" required>
                                            <label class="input-group-text" for="inputGroupFile02">Image 3</label>
                                        </div>  
                                    </div>

                                    <!-- type article -->
                                    <div class="col-md-6">
                                        <label class="form-label">Réference article<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Réference article" name="ref_article" required>
                                    </div>

                                    <!-- Reference categorie -->
                                    <div class="col-md-6">
                                        <label class="form-label">Réference Categorie<span class="text-danger">*</span></label>
                                        <select class="form-select js-choice" name="ref_categorie" required>
                                            <option value="">Sélectionner une catégorie</option>

                                            @foreach ($affiche_categorie as $resultat)
                                                <option value="{{$resultat->ref_categorie}}">{{$resultat->libelle_categorie}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>

                                    <!-- Reference marques -->
                                    <div class="col-md-6">
                                        <label class="form-label">Réference marque<span class="text-danger">*</span></label>
                                        <select class="form-select js-choice" name="ref_marque" required>
                                            <option value="">Sélectionner une marque</option>

                                            @foreach ($affiche_marque as $resultat)
                                                <option value="{{$resultat->ref_marque}}">{{$resultat->libelle_marque}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>

                                    <!-- Reference fournisseurs -->
                                    <div class="col-md-6">
                                        <label class="form-label">Réference fournisseurs<span class="text-danger">*</span></label>
                                        <select class="form-select js-choice" name="ref_fournisseur" required>
                                            <option value="">Sélectionner un fournisseurs</option>

                                            @foreach ($affiche_fournisseur as $resultat)
                                                <option value="{{$resultat->ref_fournisseur}}">{{$resultat->libelle_fournisseur}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
    
                                    <!-- type article -->
                                    <div class="col-md-6">
                                        <label class="form-label">Type article<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Type article" name="type_article" required>
                                    </div>
    
                                    <!-- libelle article -->
                                    <div class="col-md-12">
                                        <label class="form-label">Libélle article<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="libélle article" name="libelle_article" required>
                                    </div>
                                    
                                    <!-- prix 1 article -->
                                    <div class="col-md-6">
                                        <label class="form-label">Prix 1<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Prix 1 article" name="prix_1" required>
                                    </div>

                                    <!-- prix 2 article -->
                                    <div class="col-md-6">
                                        <label class="form-label">Prix 2<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Prix 2 article" name="prix_2" required>
                                    </div>
                                    
                                    <!-- statut -->
                                    <div class="col-md-6">
                                        <label class="form-label">Statut<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Statut" name="statut" required>
                                    </div>

                                    <!-- couleur statut -->
                                    <div class="col-md-6">
                                        <label class="form-label">Couleur statut<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Couleur statut" name="couleur_statut" required>
                                    </div>
    
                                    <!-- Button -->
                                    <div class="col-12 text-center">
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