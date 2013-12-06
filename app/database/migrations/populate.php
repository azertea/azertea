<?php
class Populate {
	/**
	* Populates the base
	* @return void
	*/
	public static function populate(){
		//particuliers
		DB::table('particulier')->insert(array(	'nom' => 'BONHOURE',
												'prenom' => 'Pierre',
												'telephone' => '0657654599'
											));
		DB::table('particulier')->insert(array(	'nom' => 'SAUVERE',
												'prenom' => 'Benoit',
												'telephone' => '0698678567'
											));
		DB::table('particulier')->insert(array(	'nom' => 'BUY',
												'prenom' => 'Willy',
												'telephone' => '0668647483'
											));
		DB::table('particulier')->insert(array(	'nom' => 'DU MANOIR',
												'prenom' => 'Wladimir',
												'telephone' => '0632857634'
											));

		//entreprises
		DB::table('entreprise')->insert(array(	'n_Siret' => 40483304800022,
												'nom' => 'Amazon',
												'entreprise' => true
											));
		DB::table('entreprise')->insert(array(	'n_Siret' => 49867876889022,
												'nom' => 'CDiscount',
												'entreprise' => true
											));
		DB::table('entreprise')->insert(array(	'n_Siret' => 47567576777822,
												'nom' => 'Fnac',
												'entreprise' => false
											));

		//utilisateurs
		// mdp = azerty en SHA-512
		DB::table('utilisateurs')->insert(array('pseudo' => 'AzerTea',
												'email' => 'azer@tea.com',
												'mdp' => 'df6b9fb15cfdbb7527be5a8a6e39f39e572c8ddb943fbc79a943438e9d3d85ebfc2ccf9e0eccd9346026c0b6876e0e01556fe56f135582c05fbdbb505d46755a'
												 'est_valide' => true,
												 'id_particulier' => 1
												));
		DB::table('utilisateurs')->insert(array('pseudo' => 'speudonime',
												'email' => 'azer@tea.com',
												'mdp' => 'df6b9fb15cfdbb7527be5a8a6e39f39e572c8ddb943fbc79a943438e9d3d85ebfc2ccf9e0eccd9346026c0b6876e0e01556fe56f135582c05fbdbb505d46755a',
												 'est_valide' => true,
												 'id_particulier' => 2
												 ));
		DB::table('utilisateurs')->insert(array('pseudo' => 'abcdef',
												'email' => 'azer@tea.com',
												'mdp' => 'df6b9fb15cfdbb7527be5a8a6e39f39e572c8ddb943fbc79a943438e9d3d85ebfc2ccf9e0eccd9346026c0b6876e0e01556fe56f135582c05fbdbb505d46755a',
												 'est_valide' => true,
												 'id_particulier' => 3
												 ));
		DB::table('utilisateurs')->insert(array('pseudo' => 'Wlad',
												'email' => 'azer@tea.com',
												'mdp' => 'df6b9fb15cfdbb7527be5a8a6e39f39e572c8ddb943fbc79a943438e9d3d85ebfc2ccf9e0eccd9346026c0b6876e0e01556fe56f135582c05fbdbb505d46755a',
												 'est_valide' => false,
												 'id_particulier' => 4
												 ));
		DB::table('utilisateurs')->insert(array('pseudo' => 'Amazon',
												'email' => 'amazon@amazon.com',
												'mdp' => 'df6b9fb15cfdbb7527be5a8a6e39f39e572c8ddb943fbc79a943438e9d3d85ebfc2ccf9e0eccd9346026c0b6876e0e01556fe56f135582c05fbdbb505d46755a',
												 'est_valide' => true,
												 'n_Siret' => 40483304800022
												 ));
		DB::table('utilisateurs')->insert(array('pseudo' => 'CDiscount',
												'email' => 'CDiscount@CDiscount.com',
												'mdp' => 'df6b9fb15cfdbb7527be5a8a6e39f39e572c8ddb943fbc79a943438e9d3d85ebfc2ccf9e0eccd9346026c0b6876e0e01556fe56f135582c05fbdbb505d46755a',
												 'est_valide' => true,
												 'n_Siret' => 49867876889022
												 ));
		DB::table('utilisateurs')->insert(array('pseudo' => 'Fnac',
												'email' => 'Fnac@Fnac.com',
												'mdp' => 'df6b9fb15cfdbb7527be5a8a6e39f39e572c8ddb943fbc79a943438e9d3d85ebfc2ccf9e0eccd9346026c0b6876e0e01556fe56f135582c05fbdbb505d46755a',
												 'est_valide' => true,
												 'n_Siret' => 47567576777822
												 ));

		//annonces
		DB::table('annonce')->insert(array('nom_produit'=>'Nokia 3310', 
											'description'=>'Qu\'il est beau mon 3310.',
											'prix' => 15.0,
											'photo' => '/public/upload/annonces/1.jpg',
											 'dispo' => true,
											 'id_utilisateur' => 1
											));
		DB::table('annonce')->insert(array('nom_produit'=>'Reparation portable', 
											'description'=>'Qu\'il est beau mon reparation',
											'prix' => 99.99,
											'photo' => '/public/upload/annonces/2.jpg',
											 'URL' => 'http://amazon.fr',
											 'dispo' => true,
											 'id_utilisateur' => 5
											));
		DB::table('annonce')->insert(array('nom_produit'=>'Nexus 4', 
											'description'=>'Qu\'il est beau mon telephone.',
											'prix' => 237.76,
											'photo' => '/public/upload/annonces/3.jpg',
											 'URL' => 'http://amazon.fr',
											 'dispo' => true,
											 'id_utilisateur' => 5
											));
		DB::table('annonce')->insert(array('nom_produit'=>'Compact 1', 
											'description'=>'Qu\'il est beau mon compact.',
											'prix' => 80.0,
											'photo' => '/public/upload/annonces/4.jpg',
											 'URL' => 'http://CDiscount.com',
											 'dispo' => true,
											 'id_utilisateur' => 6
											));	
		DB::table('annonce')->insert(array('nom_produit'=>'Compact 2', 
											'description'=>'Qu\'il est beau mon compact.',
											'prix' => 100.0,
											'photo' => '/public/upload/annonces/5.jpg',
											 'URL' => 'http://CDiscount.com',
											 'dispo' => true,
											 'id_utilisateur' => 6
											));	
		DB::table('annonce')->insert(array('nom_produit'=>'Reflex TROCHER', 
											'description'=>'Qu\'il est beau mon TROPCHER.',
											'prix' => 4500.0,
											'photo' => '/public/upload/annonces/6.jpg',
											 'URL' => 'http://CDiscount.com',
											 'dispo' => true,
											 'id_utilisateur' => 6
											));	
		DB::table('annonce')->insert(array('nom_produit'=>'Etanche TROPCOOL', 
											'description'=>'Qu\'il est beau mon TROPCOOL.',
											'prix' => 1500.0,
											'photo' => '/public/upload/annonces/7.jpg',
											 'URL' => 'http://CDiscount.com',
											 'dispo' => true,
											 'id_utilisateur' => 6
											));	

		DB::table('annonce')->insert(array('nom_produit'=>'Developpement photo', 
											'description'=>'Qu\'il est beau mon TROPCOOL.',
											'prix' => 1500.0,
											'photo' => '/public/upload/annonces/8.jpg',
											 'dispo' => true,
											 'id_utilisateur' => 3
											));	
		//categories
		DB::table('categorie')->insert(array('nom'=>'acheter telephone'));
		DB::table('categorie')->insert(array('nom'=>'smartphone'));
		DB::table('categorie')->insert(array('nom'=>'telephone normal'));
		DB::table('categorie')->insert(array('nom'=>'reparer telephone'));
		DB::table('categorie')->insert(array('nom'=>'acheter appareil'));
		DB::table('categorie')->insert(array('nom'=>'Transportable'));
		DB::table('categorie')->insert(array('nom'=>'Avancé'));
		DB::table('categorie')->insert(array('nom'=>'Etanche'));
		DB::table('categorie')->insert(array('nom'=>'Reflex'));
		DB::table('categorie')->insert(array('nom'=>'developper photos'));
		//logs de recherche
		DB::table('recherche')->insert(array(	'id_utilisateur'=>'1',
												'keywordlist' => '1-2-4'
											));

		//annonce premium
		DB::table('premium')->insert(array(	'id_annonce' => 1));

		//mot clef
		DB::table('mot_clef')->insert(array( 'nom' => 'telephone'));
		DB::table('mot_clef')->insert(array( 'nom' => 'mort'));
		DB::table('mot_clef')->insert(array( 'nom' => 'photos'));
		DB::table('mot_clef')->insert(array( 'nom' => 'vacances'));
		DB::table('mot_clef')->insert(array( 'nom' => 'mer'));
		//sous categ

		DB::table('sous_categorie')->insert(array(	'id_mere' => 1,
													'id_fille' => 2
												));
		DB::table('sous_categorie')->insert(array(	'id_mere' => 1,
													'id_fille' => 3
												));
		DB::table('sous_categorie')->insert(array(	'id_mere' => 5,
													'id_fille' => 6
												));
		DB::table('sous_categorie')->insert(array(	'id_mere' => 5,
													'id_fille' => 7
												));
		DB::table('sous_categorie')->insert(array(	'id_mere' => 7,
													'id_fille' => 8
												));
		DB::table('sous_categorie')->insert(array(	'id_mere' => 7,
													'id_fille' => 9
												));

		//lien categorie - annonce
		DB::table('cat_ann')->insert(array(	'id_annonce' => 3,	
											'id_categorie' => 2
											));
		DB::table('cat_ann')->insert(array(	'id_annonce' => 1,	
											'id_categorie' => 3
											));
		DB::table('cat_ann')->insert(array(	'id_annonce' => 2,	
											'id_categorie' => 4
											));	


		DB::table('cat_ann')->insert(array(	'id_annonce' => 4,	
											'id_categorie' => 6
											));	

		DB::table('cat_ann')->insert(array(	'id_annonce' => 5,	
											'id_categorie' => 6
											));

		DB::table('cat_ann')->insert(array(	'id_annonce' => 6,	
											'id_categorie' => 9
											));	

		DB::table('cat_ann')->insert(array(	'id_annonce' => 7,	
											'id_categorie' => 8
											));

		DB::table('cat_ann')->insert(array(	'id_annonce' => 8,	
											'id_categorie' => 10
											));	

		//lien mot clef - categorie
		DB::table('MC_cat')->insert(array(	'id_MC' => 1,	
											'id_categorie' => 1,
											'poids' => 4
											));
		DB::table('MC_cat')->insert(array(	'id_MC' => 1,	
											'id_categorie' => 4,
											'poids' => 2
											));		
		DB::table('MC_cat')->insert(array(	'id_MC' => 2,	
											'id_categorie' => 1,
											'poids' => 10
											));
		DB::table('MC_cat')->insert(array(	'id_MC' => 2	
											'id_categorie' => 4,
											'poids' => 6
											));			
		DB::table('MC_cat')->insert(array(	'id_MC' => 3
											'id_categorie' => 10,
											'poids' => 6
											));		
		DB::table('MC_cat')->insert(array(	'id_MC' => 3
											'id_categorie' => 10,
											'poids' => 6
											));	
		DB::table('MC_cat')->insert(array(	'id_MC' => 4
											'id_categorie' => 10,
											'poids' => 4
											));		
		DB::table('MC_cat')->insert(array(	'id_MC' => 4
											'id_categorie' => 8,
											'poids' => 2
											));	
		DB::table('MC_cat')->insert(array(	'id_MC' => 5
											'id_categorie' => 8,
											'poids' => 4
											));	
	}
}
?>