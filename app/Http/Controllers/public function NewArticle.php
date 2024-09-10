public function NewArticle(Request $request){ 

        $val = random_int(1, 10000);

        $image = $request->file('image_1');
        $image2 = $request->file('image_2');
        $image3 = $request->file('image_3');

        if ($request->hasFile('image_1')) {
            $imageName = time().'1'.'.'.$image->getClientOriginalExtension();
            $image->move(public_path('img/shop/catalog'), $imageName);
            
        }

        if ($request->hasFile('image_2')) {
            $imageName1 = time().'2'.'.'.$image2->getClientOriginalExtension();
            $image2->move(public_path('img/shop/catalog'), $imageName1);
            
        }

        if ($request->hasFile('image_3')) {
            $imageName2 = time().'3'.'.'.$image3->getClientOriginalExtension();
            $image3->move(public_path('img/shop/catalog'), $imageName2);
            
        }
        
        $article = new Article();
         
        
        $article->image_article = $imageName;
        $article->image2_article = $imageName1;
        $article->image3_article = $imageName2;
        $article->ref_article = $request->input('ref_article');
        $article->Num_article = "NUM".time();
        $article->detail_id = $request->input('id_detail');
        $article->categorie_id = $request->input('id_categorie');
        $article->marque_id = $request->input('id_marque');
        $article->fournisseur_id = $request->input('id_fournisseur');
        $article->type_article = $request->input('type_article');
        $article->libelle_article = $request->input('libelle_article');
        $article->prix = $request->input('prix_1');
        $article->prix_2 = $request->input('prix_2');
        $article->statut = $request->input('statut');
        $article->couleur_statut = $request->input('couleur_statut');
        $article->disponibilite = "stock disponible";

        $article->save();
 
        return redirect('/admin/ListeArticle');

    }

    // public function NewArticle(Request $request){

//     $val = random_int(1, 10000);

//     $imagePaths = [];

//     for ($i = 1; $i <= 3; $i++) {
//         $imageKey = "image_$i";
//         if ($request->hasFile($imageKey)) {
//             $image = $request->file($imageKey);
//             $imageName = time() . $i . '.' . $image->getClientOriginalExtension();
            
//             // Redimensionner l'image
//             $img = Image::make($image->path());
//             $img->resize(800, null, function ($constraint) {
//                 $constraint->aspectRatio();
//                 $constraint->upsize();
//             });
            
//             $img->save(public_path('img/shop/catalog/' . $imageName));
            
//             $imagePaths[$imageKey] = $imageName;
//         }
//     }

//     $article = new Article();

//     $article->image_article = $imagePaths['image_1'] ?? null;
//     $article->image2_article = $imagePaths['image_2'] ?? null;
//     $article->image3_article = $imagePaths['image_3'] ?? null;
//     $article->ref_article = $request->input('ref_article');
//     $article->Num_article = "NUM" . time();
//     $article->detail_id = $request->input('id_detail');
//     $article->categorie_id = $request->input('id_categorie');
//     $article->marque_id = $request->input('id_marque');
//     $article->fournisseur_id = $request->input('id_fournisseur');
//     $article->type_article = $request->input('type_article');
//     $article->libelle_article = $request->input('libelle_article');
//     $article->prix = $request->input('prix_1');
//     $article->prix_2 = $request->input('prix_2');
//     $article->statut = $request->input('statut');
//     $article->couleur_statut = $request->input('couleur_statut');
//     $article->disponibilite = "stock disponible";

//     $article->save();

//     return redirect('/admin/ListeArticle');
// }

// public function NewArticle(Request $request){
//     $val = random_int(1, 10000);

//     $imagePaths = [];

//     for ($i = 1; $i <= 3; $i++) {
//         $imageKey = "image_$i";
//         if ($request->hasFile($imageKey)) {
//             $image = $request->file($imageKey);
//             $imageName = time() . $i . '.' . $image->getClientOriginalExtension();
            
//             // Redimensionner l'image avec GD
//             $sourcePath = $image->path();
//             $destinationPath = public_path('img/shop/catalog/' . $imageName);
//             $this->resizeImage($sourcePath, $destinationPath, 800);
            
//             $imagePaths[$imageKey] = $imageName;
//         }
//     }

//     $article = new Article();

//     $article->image_article = $imagePaths['image_1'] ?? null;
//     $article->image2_article = $imagePaths['image_2'] ?? null;
//     $article->image3_article = $imagePaths['image_3'] ?? null;
//     $article->ref_article = $request->input('ref_article');
//     $article->Num_article = "NUM" . time();
//     $article->detail_id = $request->input('id_detail');
//     $article->categorie_id = $request->input('id_categorie');
//     $article->marque_id = $request->input('id_marque');
//     $article->fournisseur_id = $request->input('id_fournisseur');
//     $article->type_article = $request->input('type_article');
//     $article->libelle_article = $request->input('libelle_article');
//     $article->prix = $request->input('prix_1');
//     $article->prix_2 = $request->input('prix_2');
//     $article->statut = $request->input('statut');
//     $article->couleur_statut = $request->input('couleur_statut');
//     $article->disponibilite = "stock disponible";

//     $article->save();

//     return redirect('/admin/ListeArticle');
// }

// private function resizeImage($sourcePath, $destinationPath, $width)
// {
//     list($origWidth, $origHeight) = getimagesize($sourcePath);
//     $ratio = $origWidth / $origHeight;
//     $height = $width / $ratio;

//     $src = imagecreatefromstring(file_get_contents($sourcePath));
//     $dst = imagecreatetruecolor($width, $height);
//     imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $origWidth, $origHeight);
//     imagedestroy($src);

//     switch (exif_imagetype($sourcePath)) {
//         case IMAGETYPE_PNG:
//             imagepng($dst, $destinationPath);
//             break;
//         case IMAGETYPE_JPEG:
//             imagejpeg($dst, $destinationPath);
//             break;
//         case IMAGETYPE_GIF:
//             imagegif($dst, $destinationPath);
//             break;
//         case IMAGETYPE_WEBP:
//             imagewebp($dst, $destinationPath);
//             break;
//     }
//     imagedestroy($dst);
// }