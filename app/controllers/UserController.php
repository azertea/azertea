<?php

class UserController extends BaseController {


        public function postTestMail()
        {
            // Récuperation des parametres
            $email = Input::post('email');
            $motDePasse = Input::post('motDePasse');

            $count = User::where('email', '=', $email)->count();
            if($count==0)
            {
                  $message = 'Inscription';  
            }
            else
            {
                    $message = 'Connexion';
            }
            $result = $message;
            return Response::json($result);
        }


        public function getLogin()
        {
                return View::make('user/login');
        }

        public function getInscription()
        {
                return View::make('user/inscription');
        }

        public function postLogin()
        {
                $pseudo = Input::get('pseudo');
                $motDePasse = Input::get('motDePasse');

                $result = array();
                $v = new validator_user();
                $result[""]
                $user = User::where('login', '=', $pseudo );

                if($user->motDePasse == $motDePasse)
                {
                        // TODO : Demaarer une session ???$
                        $result['message'] = "Connexion OK";
                }
                else
                {
                        $result['message'] = "Connexion fail";
                }

                // Retour a la page d'accueil
                return Response::json($result);
                
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