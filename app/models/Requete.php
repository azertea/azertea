<?php

/**
* liste des fonctions du frameWork :
*	- getIdAnnonce : renvoie l'id des annonces ayant un idCatégorie donné
*	- getAnnonceCategorie : renvoie le nom du produit, la description, le prix, la photo, l'url, si l'objet est dispo et l'id utilisateur de toutes les
*			 	   			annonce qui correspondent à l'id de la catégorie en paramètre
*	- getIdCategorie : renvoie les id catégories filles d'un catégorie mise en paramètre 
*	- getCategorie : renvoie le nom des catégorie corresponant aux id mises en paramètre
*	- getIdMotCle : renvoie les id des mot cle passé en paramètre
*	- getCategorieMotCle : renvoie la totale  des catégories correspondant aux mot clé 
*	- getIdCategorieMotCle : renvoie les id  des catégories correspondant aux mot clé 
*	- getAnnonce : renvoie le nom des annonces correspondant à l'id de l'annonce 
*	- getCategorieEnCommun : permet de renvoyer les id des catégories en commun de chaque mot clé mis en paramètre
*	- ajoutProduit : permet d'ajouter un produit
*	- ajoutProduitBoutique : permet de rajouter un produit dans la boutique 
*	- toStringSousCategorie : permet d'écrire la liste des sous catégorie d'une catégorie spécifié par son id
*
*
*
*/
class Requete {

	private $tabCategorie;
	private $iTabCategorie=0;

	/**
	 * objectif : renvoie l'id des annonces ayant un idCatégorie donné
	 *
	 * paramètres: - id_categorie : id de la catégorie correspondant aux annonces
	 *
	 * @return l'id des différentes annonces
	 *
	 * exemple : $idAnnonce = getIdAnnonce(1); ATTENTION, c'est un tableau pour accéder à la valeur, il faut utiliser $idAnnonce[0]
	 */
	public function getIdAnnonce($id_categorie){
		if(is_numeric($id_categorie)){
		    $idAnnonces = DB::table('cat_ann')
		    			->select('id_annonce')
	                    ->where('id_categorie', '=', $id_categorie)
	                    ->get();

	        return $annonces;
   		}
	}

	
	/**
	 * objectif : renvoie le nom du produit, la description, le prix, la photo, l'url, si l'objet est dispo et l'id utilisateur de toutes les
	 *			  annonce qui correspondent à l'id de la catégorie en paramètre
	 *
	 * paramètres: - id_categorie : id de la catégorie correspondant aux annonces
	 *
	 * @return les données des annonces
	 *
	 * exemple : $idAnnonce = getAnnonceCategorie(1); ATTENTION, c'est un tableau pour accéder à la valeur, il faut utiliser $idAnnonce[0] pour accéder à la première annonce
	 *			 donc pour accédé au nom du produit de la première annonce c'est $idAnnonce[0][0]
	 */
	public function getAnnonceCategorie($id_categorie){
		$tabIdAnnonces = getIdAnnonce($id_categorie);
		$annonces;
		$i=0;

		foreach ($tabIdAnnonces as $tabIdAnnonce){
		    $idAnnonces = DB::table('annonce')
		    			->select('id','nom_produit', 'description', 'prix', 'photo', 'URL', 'dispo', 'id_utilisateur')
	                    ->where('id', '=', $tabIdAnnonce)
	                    ->get();
	    	$annonces[$i]=$idAnnonces;
	        $i++;
		}

		return $annonces;
	}


	/**
	*
	* objectif : renvoie les id catégories filles d'un catégorie mise en paramètre
	*
	* paramètres: - id_categorie : id de la catégorie mère
	*
	* @return les catégories filles
	*
	* exemple : $idCategories = getIdCategorie(1); ATTENTION, c'est un tableau pour accéder à la valeur, il faut utiliser $idCategories[0]
	*/
	public function getIdCategorie($id_categorie){
	    $idCategorieFille = DB::table('sous_categorie')
	    			->select('id_fille')
	                ->where('id_mere', '=', $idCategorieFille)
	                ->get();

        /* permet de pouvoir garder en mémoire les différents id de catégorie qui sont passés en paramètre permettant de pouvoir
        	garder un historique de la recherche */
	    $tabCategorie[$iTabCategorie]=$id_categorie;
	    $iTabCategorie++;

		return $idCategorieFille;
	}


	/**
	 * objectif : renvoie le nom des catégorie corresponant aux id mises en paramètre
	 *
	 * paramètres: - id_categorie : id des catégories
	 *
	 * @return les nom des catégories
	 *
	 * exemple : $idCategories = getCategorie(1); ATTENTION, c'est un tableau pour accéder à la valeur, il faut utiliser $getCategorie[0] pour accéder à la première categorie
	 *			 donc pour accédé au nom de la première catégorie c'est $idCategories[0][0]
	 */
	public function getCategorie($id_categorie){
		$tabIdCategories = getCategorie($id_categorie);
		$categories;
		$i=0;

		foreach ($tabIdCategories as $tabIdCategorie){
		    $donneeCategorie = DB::table('categorie')
		    			->select('id','nom')
	                    ->where('id', '=', $tabIdCategorie)
	                    ->get();
	    	$categories[$i]=$donneeCategorie;
	        $i++;
		}

		return $categories;
	}

	/**
	*
	* objectif : renvoie les id des mot cle passé en paramètre
	*
	* paramètres: - motCle : mot clé de recherche
	*
	* @return les id des mots clé passés en paramètre
	*
	* exemple : $idMotCle = getIdMotCle(1); ATTENTION, c'est un tableau pour accéder à la valeur, il faut utiliser $idMotCle[0]
	*/
	public function getIdMotCle($motCles){
		foreach ($motCles as $motCle) {
			$idMotCle = DB::table('mot_clef')
	    			->select('id')
	                ->where('nom', '=', $motCle)
	                ->get();

		}
		return $idMotCle;
	   
	}

	/**
	*
	* objectif : renvoie les id, l'id des mots clé et le poid des catégories correspondant aux mot clé
	*
	* paramètres: - id_mot_cles : mot clé de recherche
	*
	* @return les catégories correspondant aux mot clé
	*
	* exemple : $idCategorie = getCategorieMotCle(1); ATTENTION, c'est un tableau pour accéder à la valeur, il faut utiliser $getCategorieMotCle[0]
	*/
	public function getCategorieMotCle($id_mot_cles){

		foreach ($id_mot_cles as $id_mot_cle) {
			$idCategorie = DB::table('MC_cat')
	    			->select('id_categorie','id_MC','poids')
	                ->where('id_MC', '=', $id_mot_cle)
	                ->get();

		}
		return $idCategorie;
	   
	}

	/**
	*
	* objectif : renvoie les id  des catégories correspondant aux mot clé
	*
	* paramètres: - id_mot_cles : mot clé de recherche
	*
	* @return les catégories correspondant aux mot clé
	*
	* exemple : $idCategorie = getIdCategorieMotCle(1); ATTENTION, c'est un tableau pour accéder à la valeur, il faut utiliser $idCategorie[0]
	*/
	public function getIdCategorieMotCle($id_mot_cles){

		foreach ($id_mot_cles as $id_mot_cle) {
			$idCategorie = DB::table('MC_cat')
	    			->select('id_categorie')
	                ->where('id_MC', '=', $id_mot_cle)
	                ->get();

		}
		return $idCategorie;
	   
	}

	/**
	*
	* objectif : renvoie le nom du mot clé  partir de son id
	*
	* paramètres: - id_mot_cles : mot clé de recherche
	*
	* @return la liste des mot cles orrespondant
	*
	* exemple : $motCle = getMotCle(1); ATTENTION, c'est un tableau pour accéder à la valeur, il faut utiliser $motCle[0]
	*/
	public function getMotCle($id_mot_cles){
		$motCle = array();
		foreach ($id_mot_cles as $id_mot_cle) {
			$m = DB::table('mot_clef')
	    			->select('id')
	                ->where('nom', $id_mot_cle)
	                ->get();

	        if(!empty($m)){
	        	$motCle[] = $m;
	        }
		}
		return $motCle;
	   
	}

	/**
	*
	* objectif : renvoie le nom des annonces correspondant à l'id de l'annonce
	*
	* paramètres: - idAnnonces : id de l'annonce
	*
	* @return les annonces correspondant aux id mises en paramètre
	*
	* exemple : $nomAnnonce = getAnnonce(1); ATTENTION, c'est un tableau pour accéder à la valeur, il faut utiliser $nomAnnonce[0]
	*/
	public function getAnnonce($idAnnonces){

		foreach ($idAnnonces as $idAnnonce) {
			$nomAnnonce = DB::table('annonce')
	    			->select('id','nom_produit','description','prix','photo','URL','dispo','id_utilisateur')
	                ->where('id', '=', $idAnnonce)
	                ->get();

		}
		return $nomAnnonce;
	   
	}

	/**
	*
	* objectif : permet de renvoyer les id des catégories en commun de chaque mot clé mis en paramètre
	*
	* paramètres: /
	*
	* @return les cat&gories recherché par l'utilisateur
	*
	* exemple : $histoCatégorie = getHistorique(); ATTENTION, c'est un tableau pour accéder à la valeur, il faut utiliser $histoCatégorie[0]
	*/
	public function getCategorieEnCommun($idMotCles)
	{
		$tabIdCategories = getIdCategorieMotCle($idMotCles);
		$tabCategorieTotal = $tabIdCategories[0];

		foreach ($tabIdCategories as $tabIdCategorie) {
			$tabCategorieTotal = array_intersect($tabCategorieTotal, $tabIdCategorie);
		}

		return $tabCategorieTotal;
	}

	/**
	*
	* objectif : renvoie l'historique de toutes les recherche de catégorie qu'a fait l'utilisateur
	*
	* paramètres: /
	*
	* @return les cat&gories recherché par l'utilisateur
	*
	* exemple : $histoCatégorie = getHistorique(); ATTENTION, c'est un tableau pour accéder à la valeur, il faut utiliser $histoCatégorie[0]
	*/
	public function getHistorique(){

		return $tabCategorie;
	   
	}


	/**
	*
	* objectif : permet d'ajouter un produit
	*
	* paramètres: - nom_produit
	*			  - description
	*			  - prix
	*			  - photo
	*			  - URL
	*			  - dispo
	*			  - id_utilisateur
	*
	* @return 1 si OK
	*
	*/
	public function ajoutProduit($nom_produit ,$description ,$prix ,$photo ,$URL ,$dispo ,$id_utilisateur ){

		DB::table('annonce')->insert(
	    	array('nom_produit' => $nom_produit, 'description' => $description, 'prix' => $prix, 'photo' => $photo, 'URL' => $URL, 'dispo' => 'false',  'id_utilisateur' =>$id_utilisateur)
		);
	   	return 1;
	}

	/**
	*
	* objectif : permet de rajouter un produit dans la boutique
	*
	* paramètres: - idProduit
	*
	* @return 1 si OK
	*
	*/
	public function ajoutProduitBoutique($idProduit){

		DB::table('annonce')
            ->where('id', $idProduit)
            ->update(array('dispo' => 'true'));
	   	return 1;
	}

	/**
	*
	* objectif : permet d'écrire la liste des sous catégorie d'une catégorie spécifié par son id
	*
	* paramètres: - idCategorie de la catégorie mère
	*
	*/
	public function toStringSousCategorie($idCategorie){
		$ensembleIdCategorieFille = getIdCategorie($idCategorie);
		foreach ($ensembleIdCategorieFille as $idFille ) {
			$infoCategorie = getCategorie($idFille[0]);
			print("id: ".$infoCategorie[0].", label: ".$infoCategorie[1].", type: \"folder\"");
		}
	}
}


?>

