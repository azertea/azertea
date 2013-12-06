<?php
class validators_user extends BaseValidator
{
	public function login(){
        // Add specific rule for the validation of data
        $rules = array(
            'password' => 'required|min:6|max:30',
            'username' => 'required|min:4|connexion'
        );

        Validator::extend('connexion', function($attribute, $value, $parameters)
        {
            $credentialsWithUsername = array('pseudo' => Input::get('username'),
                                        'password' => Input::get('password'));
            return Auth::attempt($credentialsWithUsername);
        });

        return $this->test($rules);
	}


	public function register(){
        Validator::extend('existing_nick', function($attribute, $value, $parameters)
        {
            return ! User::isTakenUsername(Input::get('pseudo'));
        });
        Validator::extend('existing_mail', function($attribute, $value, $parameters)
        {
            return ! User::isTakenMail(Input::get('mail'));
        });

        $rules = array(
            'username' => 'required|existing_nick:no|min:4|max:15',
            'mail' => 'required|existing_mail:no|email',
            'password' => 'required|min:6|max:30',
        );

        return $this->test($rules);
	}

	public function testMail(){
		Validator::extend('existing_mail', function($attribute, $value, $parameters)
        {
            return ! User::isTakenMail(Input::get('mail'));
        });

        $rules = array(
            'mail' => 'required|existing_mail:no|email',
        );

        return $this->test($rules);
	}
}