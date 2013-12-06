<?php
//class qui permet de gerer les login et inscription
class UserController extends BaseController {

    //Récuperation adresse mail de la page web et test de la conformité de celle-ci.
    // Tested : not fully working, JS fail
    public function postTestMail(){
        $v = new validators_user;
        $result = $v->testMail();
			//test si l'adresse mail est conforme
        if(isset($result['success'])){
            $result['state'] = "not_exists";
        }else{
            $result['state'] = "exists";
        }
        return Response::json($result);
    }

    //récupération du login et mot de passe et vérification dans la base de données
    // Tested : not fully working, JS fail
    public function postLogin(){
        $v = new validators_user;
        $result = $v->login();
			//test si le couple login mot de passe est correct
        if(isset($result['success'])){
            // Do nothing, he is connected.
        }else{
            $result['error'] = "Couple login mot de passe invalide";
        }
        return Response::json($result);
    }
    
	//Recuperation du login et mot de passe et inscription a la base de données
    // Tested - work
    public function postRegister(){
        $v = new validators_user;
        $result = $v->register();
        if(isset($result['success'])){
            $user = new User;
            $user->email = Input::get('mail');
            $user->pseudo = Input::get('username');
            $user->mdp = Hash::make(Input::get('password'));
            $user->save();
            Auth::loginUsingId($user->id);
        }else{
            $result['error']= "Donnée invalides";
        }
        return Response::json($result);
    }
}