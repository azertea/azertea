<?php

class SearchController extends BaseController {
    public function postSearch(){
        $v = new validators_search;
        $result = $v->search();
        if(isset($result['success'])){
        	$motCle= explode (' ', Input::get('search'));
        	//BDD
        	$result = array('success'=>'true',
        					'categories'=>array(
        						array('id' => 1,
        							'name' = > 'Categorie 1'),
        						array('id' => 8,
        							'name' = > 'Categorie 2'),
        						array('id' => 654,
        							'name' = > 'Categorie 2'),);
        }else{
            $result['error'] = "Recherche invalide";
        }
        return Response::json($result);
    }
    public function postTree(){
        $v = new validators_search;
        $result = $v->tree();
        if(isset($result['success'])){
        	//BDD
        	$result = array('success'=>'true',
        					'categories'=>array(
        						array('id' => 1,
        							'name' = > 'Categorie 1'),
        						array('id' => 8,
        							'name' = > 'Categorie 2'),
        						array('id' => 654,
        							'name' = > 'Categorie 2'),);
        }else{
            $result['error'] = "Couple login mot de passe invalide";
        }
        return Response::json($result);
    }
    public function postAnnonce(){
        $v = new validators_search;
        $result = $v->produit();
        if(isset($result['success'])){
        	//BDD
        	$result = array('success'=>'true',
        					'annonces'=>array(
        						array('id' => 1,
        							'slug' => 'le-nom-de-la-page',
        							'name' = > 'Nom de produit',
        							'price' = > '12.45€',
        							'description'= > 'Lorem lipsum',
        							'img'= > 'http://ecx.images-amazon.com/images/I/51XhAhK9ISL._SY300_.jpg',
        							),);
        }else{
            $result['error'] = "Annonce";
        }
        return Response::json($result);
    }
}
