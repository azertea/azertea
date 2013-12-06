<?php
class validators_user extends BaseValidator
{
    public function login($nbrConnexTentative){
    	
		$rules = array(
		    'password' => 'required',
		    'email' => 'required|email'
		);

		return $this->test($rules);
    }
}