<?php

class ProductController extends BaseController {

		public function getProductList()
        {
			$recep=Input::get('');
            $result = array(); // Requete toutes annonces pour id categorie donné
            return Response::json($result);
        }


        public function getProductAdd()
        {
               
        }
        public function postProductAdd()
        {
            $userController = new UserController;
            $isConnected = $userController;
            if(isset($result['success'])){
                $v = new validators_connexion;
                $result = $v->login();
                if(isset($result['success'])){
                    $annonce = new Annonce();
                    $annonce->nomProduit = Input::get('productName');
                    $annonce->description = Input::get('description');
                    $annonce->prix = Input::get('price');
                    $annonce->photo = Input::get('photo');
                    $annonce->url = Input::get('url_sell');
                    $annonce->dispo = false;
                    $annonce->touch();

                    $result['success'] = "L'annonce a été créée. Un modérateur la validera dès que possible.";
                }else{
                    TentativeConnexion::add(IP);
                    $result['error'] = "Une erreur est survenue. Avez vous tout rentrée ?";
                }
            }else{
                $result['error'] = "Connexion impossible";
            }
            return Response::json($result);
        }

        public function getProductSend()
        {
               
        }
        public function postProductSend()
        {
               
        }

        public function getProduct()
        {

        }
}
        

