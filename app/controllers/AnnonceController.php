<?php

class AnnonceController extends BaseController {

		//création liste d'annonce en fonction des catégories.
        //Tested : works
        public function postAnnonce(){
			//Verification de l'authentification (dans le cas d'un serveur)
            if (! Auth::check()){
                $userController = new UserController;
                $isConnected = $userController->login();
                if(! isset($isConnected['success'])){
                    $result['error'] = "Connexion n'a pas été possible";
                    return Response::json($result);
                }
            }
			//ajout de l'annonce en pending
            $v = new validators_add_annonce;
            $result = $v->add();
            if(isset($result['success'])){
                $annonce = new Annonce();
                $annonce->nom_produit = Input::get('productName');
                $annonce->description = Input::get('description');
                $annonce->prix = Input::get('price');
                $annonce->photo = Input::get('photo');
                $annonce->url = Input::get('url_sell');
                $annonce->dispo = false;
                $annonce->id_utilisateur = Auth::user()->id;
                $annonce->save();

                $result['success'] = "L'annonce a été créée. Un modérateur la validera dès que possible.";
            }else{
                $result['error'] = "Une erreur est survenue. Avez vous tout rentrée ?";
            }
           
            return Response::json($result);
        }
}
        

