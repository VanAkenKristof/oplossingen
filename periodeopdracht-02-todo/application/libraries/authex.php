<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Authex {

    public function __construct()
    {
        $CI = & get_instance();
        
        $CI->load->model('user_model');
    }

    function loggedIn() 
    {
        // gebruiker is aangemeld als sessievariabele user_id bestaat
        $CI = & get_instance();
        if ($CI->session->userdata('user_id')) {
            return true;
        } else {
            return false;
        }
    }
    
    function getUserInfo() 
    {
        // geef user-object als gebruiker aangemeld is
        $CI = & get_instance();
        if (! $this->loggedIn()) {
            return null;
        } else {
            $id = $CI->session->userdata('user_id');
            return $CI->user_model->get($id);
        }
    }

    function login($email, $password) 
    {
        // gebruiker aanmelden met opgegeven email en wachtwoord
        $CI = & get_instance();
        $user = $CI->user_model->getAccount($email, $password);
        if ($user == null) {
            return false;
        } else {

            $CI->session->set_userdata('user_id', $user->id);
            return true;
        }
    }

    function logout() 
    {
        // uitloggen, dus sessievariabele wegdoen
        $CI = & get_instance();
        $CI->session->unset_userdata('user_id');
    }

    function register($email, $password, $salt) 
    {
        // nieuwe gebruiker registreren als email nog niet bestaat
        $CI = & get_instance();

        //teller legende: 0 = beide juist | 1 = email fout | 2 = wachtwoord fout | 3 = beide fout
        $teller = 0;

        if (!$CI->user_model->emailVrij($email)) {
            $teller += 1;
        }

        if (!$CI->user_model->wachtwoordCheck($password)) {
            $teller += 2;
        }

        if ($teller == 0) {
            $CI->user_model->insert($email, $password, $salt);
        }

        
        return $teller;
    }
    
    

}