<?php

class UserController extends BaseController {


        public function getLogin()
        {
                return View::make('user/login');
        }

        public function getInscritpion()
        {
                return View::make('user/inscription');
        }

        public function postLogin()
        {
                $pseudo = Input::get('pseudo');
                $motDePasse = Input::get('motDePasse');

                $user = User::where('login', '=', $pseudo );

                if($user->motDePasse == $motDePasse)
                {
                        // TODO : Demaarer une session ???$
                        $message = "Connexion OK";
                }
                else
                {
                         $message = "Connexion fail";
                }

                // Retour a la page d'accueil
                return Redirect::to('/')->with('message', $message);
                
        }

        public function postInscription()
        {
                // Récuperation des parametres
                $pseudo = Input::post('pseudo');
                $email = Input::post('email');
                $motDePasse = Input::post('motDePasse');

                // TODO : Faire des vérifications ...

                if($ok)
                {
                        // Création de l'user en BDD
                        $user = new User();
                        $user->pseudo = $pseudo;
                        $user->email = $email;
                        $user->motDePasse = $motDePasse;
                        $user->save();

                        // TODO : Mettre en place un systeme de notification
                        $message = "Vous etes bien inscrit";
                }
                else
                {

                         $message = "Erreur lors de l'authentification";
                }
                
                // Redirection sur la page d'accueil
                return Redirect::to('/')->with('message', $message);
        }
}