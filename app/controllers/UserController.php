<?php

class UserController extends BaseController {

        public function postTestMail(){
            $v = new validators_connexion;
            $result = $v->testMail();
            if(isset($result['success'])){
                $result['state'] = "not_exists";
            }else{
                $result['state'] = "exists";
            }
	        return Response::json($result);
	    }
        public function postLogin(){
            $v = new validators_connexion;
            $result = $v->login();
            if(isset($result['success'])){
                User::connexion(Auth::user()->id);
            }else{
                TentativeConnexion::add(IP);
                $result['error'] = "Couple login mot de passe invalide";
            }
	        return Response::json($result);
	    }
	    
	    public function postRegister(){
	        $v = new validators_connexion;
	        $result = $v->register();
	        if(isset($result['success'])){
	            $user = new User;
	            $user->email = Input::get('mail');
	            $user->username = Input::get('username');
	            $user->password = Hash::make(Input::get('password'));
	            $user->save();
	            Auth::loginUsingId($user->id);
	            User::connexion($user->id);
	        }else{
	            $result['error']= "Donnée invalides";
	        }
	        return Response::json($result);
	    }
}