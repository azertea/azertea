<?php

class SearchController extends BaseController {
    //Tested and work
    public function postSearch(){
        $v = new validators_search;
        $result = $v->search();
        if(isset($result['success'])){
        	$motCle= explode (' ', Input::get('search'));
        	//BDD
            //get
            $request = new Requete;
            $idMotCle = $request->getMotCle($motCle);
            $r = array();
            foreach ($idMotCle as $key => $v) {
                $r[] = $request->getCategorieMotCle($v[0]);
            }
            

        	$result = array('success'=>'true',
        					'categories'=>$r);
        }else{
            $result['error'] = "Recherche invalide";
        }
        return Response::json($result);
    }
    //Tested and work
    public function postTree(){
        $v = new validators_search;
        $result = $v->tree();
        if(isset($result['success'])){
        	//BDD
            $result = array('success'=>'true',
                            'categories'=>array(
                                array('id' => '1',
                                    'name' => 'Categorie 1'),
                                array('id' => '8',
                                    'name' => 'Categorie 2'),
                                array('id' => '654',
                                    'name' => 'Categorie 2')));
        }else{
            $result['error'] = "OMG";
        }
        return Response::json($result);
    }
    //Tested and work
    public function postAnnonce(){
        $v = new validators_search;
        $result = $v->produit();
        if(isset($result['success'])){
        	//BDD
        	$result = array('success'=>'true',
        					'annonces'=>array(
        						array('id' => 1,
        							'slug' => 'le-nom-de-la-page',
        							'name' => 'Nom de produit',
        							'price' => '12.45€',
        							'description'=> 'Lorem lipsum',
        							'img'=> 'http://ecx.images-amazon.com/images/I/51XhAhK9ISL._SY300_.jpg'
        							)));
        }else{
            $result['error'] = "Impossible de récuperer les annonces";
        }
        return Response::json($result);
    }
}
