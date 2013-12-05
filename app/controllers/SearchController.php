<?php

class SearchController extends BaseController {
	public function postSearch(){
		$phraseRecherche= Input::get('search'); //recuperation de la phrase de recherche du front end
		$motCle= explode (' ', $phraseRecherche);//traitement
//appel des categorie de la base de donnee
		View::make($motCle);//envoi des categorie de la base de donnee a Front end
	}
}
