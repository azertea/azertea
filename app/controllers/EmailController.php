<?php
class EmailController extends BaseController
{
        static function inscription($nom,$email)
        {
                // data for send the mail to the user
                $data=array('nom'=>$nom,'email'=>$email);
                Mail::send('emails.inscription', $data, function ($message) use ($data) {
                        $message->subject('Bienvenue sur UFound !');
                        $message->from('noreply@ufound.fr', 'UFound');
                        $message->to($data['email']);
                });
        }
}