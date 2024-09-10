<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Fournisseur;
use App\Models\Commande;
use App\Models\Marque;
use App\Models\DetailArticle;
use App\Models\TailleArticle;

class PagesAjoutController extends Controller
{
    //
    public function NewCategorie(Request $request){


        $categorie = new Categorie();
        $categorie->ref_categorie = "CAT".substr($request->input('libelle_categorie'),0,2 ).substr($request->input('libelle_categorie'),-5,2 );
        $categorie->libelle_categorie = $request->input('libelle_categorie');
        $categorie->save();
 
        return back();

    }

    public function NewMarque(Request $request){


        $marque = new Marque();
        $marque->ref_marque = "MARQ".substr($request->input('libelle_marque'),0,2 );
        $marque->libelle_marque = $request->input('libelle_marque');
        $marque->save();
 
        return back();

    }

    public function NewFournisseur(Request $request){


        $fournisseur = new Fournisseur();
        $fournisseur->ref_fournisseur = "FOURN".substr($request->input('libelle_Fournisseur'),0,2 );
        $fournisseur->libelle_fournisseur = $request->input('libelle_Fournisseur');
        $fournisseur->telephone = $request->input('telephone');
        $fournisseur->save();
 
        return back();

    }

    public function NewDetail(Request $request){


        $detail = new DetailArticle();
        $detail->ref_detail_article =  "DETAIL";
        $detail->libelle1 = $request->input('libelle_1');
        $detail->valeur1 = $request->input('valeur_1');
        $detail->libelle2 = $request->input('libelle_2');
        $detail->valeur2 = $request->input('valeur_2');
        $detail->libelle3 = $request->input('libelle_3');
        $detail->valeur3 = $request->input('valeur_3');
        $detail->libelle4 = $request->input('libelle_4');
        $detail->valeur4 = $request->input('valeur_4');
        $detail->libelle5 = $request->input('libelle_5');
        $detail->valeur5 = $request->input('valeur_5');
        $detail->save();
 
        return back();

    }

    public function NewTaille(Request $request){


        $taille = new TailleArticle();
        $taille->ref_taille_article = $request->input('ref_taille_article');
        $taille->article_id = $request->input('id_article');
        $taille->libelle_taille_article = $request->input('libelle_taille_article');
        $taille->save();
 
        return back();

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

    public function NewArticle(Request $request){
        $val = random_int(1, 10000);

        $imagePaths = [];

        for ($i = 1; $i <= 3; $i++) {
            $imageKey = "image_$i";
            if ($request->hasFile($imageKey)) {
                $image = $request->file($imageKey);
                $imageName = time() . $i . '.' . $image->getClientOriginalExtension();
                
                // Redimensionner l'image avec GD
                $sourcePath = $image->path();
                $destinationPath = public_path('img/shop/catalog/' . $imageName);
                $this->resizeImage($sourcePath, $destinationPath, 235, 235);
                
                $imagePaths[$imageKey] = $imageName;
            }
        }

        $article = new Article();

            $article->image_article = $imagePaths['image_1'] ?? null;
            $article->image2_article = $imagePaths['image_2'] ?? null;
            $article->image3_article = $imagePaths['image_3'] ?? null;
            $article->ref_article = $request->input('ref_article');
            $article->Num_article = "NUM" . time();
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

    private function resizeImage($sourcePath, $destinationPath, $width, $height)
    {
        list($origWidth, $origHeight) = getimagesize($sourcePath);
        
        $src = imagecreatefromstring(file_get_contents($sourcePath));
        $dst = imagecreatetruecolor($width, $height);
        
        // Remplir avec une couleur de fond (blanc dans cet exemple)
        $backgroundColor = imagecolorallocate($dst, 255, 255, 255);
        imagefill($dst, 0, 0, $backgroundColor);
        
        // Calculer les dimensions pour conserver le ratio d'aspect
        $srcRatio = $origWidth / $origHeight;
        $dstRatio = $width / $height;
        
        if ($srcRatio > $dstRatio) {
            // L'image source est plus large
            $newHeight = $height;
            $newWidth = $height * $srcRatio;
            $dstY = 0;
            $dstX = ($width - $newWidth) / 2;
        } else {
            // L'image source est plus haute ou carrée
            $newWidth = $width;
            $newHeight = $width / $srcRatio;
            $dstX = 0;
            $dstY = ($height - $newHeight) / 2;
        }
        
        imagecopyresampled($dst, $src, $dstX, $dstY, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
        
        switch (exif_imagetype($sourcePath)) {
            case IMAGETYPE_PNG:
                imagepng($dst, $destinationPath);
                break;
            case IMAGETYPE_JPEG:
                imagejpeg($dst, $destinationPath);
                break;
            case IMAGETYPE_GIF:
                imagegif($dst, $destinationPath);
                break;
            case IMAGETYPE_WEBP:
                imagewebp($dst, $destinationPath);
                break;
        }
        
        imagedestroy($src);
        imagedestroy($dst);
    }

}
