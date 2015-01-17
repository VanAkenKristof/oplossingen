<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['title'] = 'Home';
		$data['user'] = $this->authex->getUserInfo();

		$this->load->view('home', $data);
	}

	public function login()
	{
		$data['title'] = "Inloggen";
		$data['user'] = $this->authex->getUserInfo();
		$data['melding'] = $this->session->flashdata('melding');

		$this->load->view('login', $data);

	}

	public function aanmelden()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		if ($this->authex->login($email, sha1($password))) {
			$this->session->set_flashdata('melding', 'Pfieuw, het aanmelden is goed verlopen. Welkom!');
			redirect('welcome/dashboard');
		} else {
			$this->session->set_flashdata('melding', 'Oeps, je gebruikersnaam en/of paswoord waren niet juist. Probeer opnieuw');
			redirect('welcome/login');
		}
	} 

	public function dashboard()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->authex->getUserInfo();
		$data['melding'] = $this->session->flashdata('melding');
		$this->load->view('dashboard', $data);
	}

	public function registreer()
	{
		$data['title'] = 'Registreer';
		$data['user'] = $this->authex->getUserInfo();

		$this->load->view('registreer', $data);
	}

	public function logout()
	{
		$this->authex->logout();
		redirect('welcome/index');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */