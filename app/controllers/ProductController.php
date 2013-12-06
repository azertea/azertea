<?php

class ProductController extends BaseController {

		public function getProductList()
        {
            $result = array(); // Requete toutes annonces pour id categorie donné
            return Response::json($result);
        }


        public function getProductAdd()
        {
               
        }
        public function postProductAdd()
        {
                $nomProduit = Input::post('nomProduit');
                $description = Input::post('description');
                $prix = Input::post('prix');
                $photo = Input::post('photo');
                $url = Input::post('description');

                if($ok)
                {
                        // Création de l'user en BDD
                        $annonce = new Annonce();
                        $annonce->nomProduit = $nomProduit;
                        $annonce->description = $description;
                        $annonce->prix = $prix;
                        $annonce->photo = $photo;
                        $annonce->url = $url;
                        $annonce->dispo = false;
                        $annonce->save();

                        // TODO : Mettre en place un systeme de notification
                        $message = "L'annonce a été créée. Un modérateur la validera dès que possible.";
                }
                else
                {

                         $message = "Erreur lors de la création de l'annonce";
                }
                
                // Redirection sur la page d'accueil
                return Redirect::to('/')->with('message', $message);
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
        

