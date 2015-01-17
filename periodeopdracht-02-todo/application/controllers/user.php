<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        
    }

    public function registreer() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $salt = sha1(mt_rand(10000, 99999) . time() . $email);
        
        $teller = $this->authex->register($email, $password, $salt);

        switch ($teller) {
            case '0':
            $this->klaar($email, $password);
            break;
            
            case '1':
            $this->bestaat();
            break;
            
            case '2':
            $this->wachtwoordFout();
            break;
            
            case '3':
            $this->beideFout();
            break;

        }

    }

    public function bestaat() {
        $data['title'] = 'Registreren';
        $data['melding1'] = 'E-Mail bestaat al, probeer opnieuw A.U.B.';
        $data['user'] = $this->authex->getUserInfo();
        $this->load->view('registreer', $data);
    }

    public function klaar($email, $password) {
        $data['title'] = 'Registreren';
        $data['user'] = $this->authex->getUserInfo();

        if ($this->authex->login($email, sha1($password))) {
            $this->session->set_flashdata('melding', 'Pfieuw, het aanmelden is goed verlopen. Welkom!');
            redirect('welcome/dashboard');
        } else {
            $this->session->set_flashdata('melding', 'Oeps, je gebruikersnaam en/of paswoord waren niet juist. Probeer opnieuw');
            redirect('welcome/login');
        }
    }    

    public function wachtwoordFout() {
        $data['title'] = 'Registreren';
        $data['melding2'] = 'The password must be at least 8 characters.';
        $data['user'] = $this->authex->getUserInfo();
        $this->load->view('registreer', $data);
    }

    public function beideFout() {
        $data['title'] = 'Registreren';
        $data['melding1'] = 'E-Mail bestaat al, probeer opnieuw A.U.B.';
        $data['melding2'] = 'The password must be at least 8 characters.';
        $data['user'] = $this->authex->getUserInfo();
        $this->load->view('registreer', $data);
    }




}

/* End of file user.php */
/* Location: ./applications/tvshop/controllers/user.php */