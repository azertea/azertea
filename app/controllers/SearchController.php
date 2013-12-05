<?php

class SearchController extends BaseController {
	public function postSearch(){
		 //recuperation de la phrase de recherche du front end
		$phraseRecherche= Input::get('search');

		$motCle= explode (' ', $phraseRecherche);//traitement

		//appel des categorie de la base de donnee

        $result = array('success'=>'true','categorie'=>array('0'=> 'Categorie 1','1'=> 'Categorie 2','2'=> 'Categorie 3',));
        return Response::json($result);
	}
}
