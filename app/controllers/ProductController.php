<?php

class ProductController extends BaseController {

		//création liste d'annonce en fonction des catégories.
		public function getProductList()
        {
			$recep=Input::get('');
            $result = array(); // Requete toutes annonces pour id categorie donné
            return Response::json($result);
        }


        public function getProductAdd()
        {
               
        }
		//Ajout d'une annonce par un utilisateur.
        public function postProductAdd()
        {
			//Verification de l'authentification (dans le cas d'un serveur)
            if (! Auth::check())
                $userController = new UserController;
                $isConnected = $userController->login();
                if(! isset($result['success'])){
                    $result['error'] = "Connexion n'a pas été possible";
                    return Response::json($result);
                }
            }
			//ajout de l'annonce en pending
            $v = new validators_add_annonce;
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
                $result['error'] = "Une erreur est survenue. Avez vous tout rentrée ?";
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
        

