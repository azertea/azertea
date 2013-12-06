<?php

class SearchController extends BaseController {
    public function postSearch(){
        $v = new validators_search;
        $result = $v->search();
        if(isset($result['success'])){
        	$motCle= explode (' ', Input::get('search'));
        	//BDD
        	$result = array('success'=>'true','categorie'=>array('0'=> 'Categorie 1','1'=> 'Categorie 2','2'=> 'Categorie 3',));
        }else{
            $result['error'] = "Couple login mot de passe invalide";
        }
        return Response::json($result);
    }
    public function postTree(){
        $v = new validators_search;
        $result = $v->tree();
        if(isset($result['success'])){
        	//BDD
        	$result = array('success'=>'true','categorie'=>array('0'=> 'Categorie 1','1'=> 'Categorie 2','2'=> 'Categorie 3',));
        }else{
            $result['error'] = "Couple login mot de passe invalide";
        }
        return Response::json($result);
    }
    public function postProduit(){
        $v = new validators_search;
        $result = $v->produit();
        if(isset($result['success'])){
        	//BDD
        	$result = array('success'=>'true','categorie'=>array('0'=> 'Categorie 1','1'=> 'Categorie 2','2'=> 'Categorie 3',));
        }else{
            $result['error'] = "Couple login mot de passe invalide";
        }
        return Response::json($result);
    }
}
