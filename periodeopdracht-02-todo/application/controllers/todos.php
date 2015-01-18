<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class todos extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');

	}

	public function add() {
		$data['title'] = 'Item Toevoegen';
		$data['user'] = $this->authex->getUserInfo();
		$this->load->view('todo_add', $data);


	}

	public function toevoegen() {
		
		$info = new stdclass();


		$info->todo = $this->input->post('todo');
		$user = $this->authex->getUserInfo();
		$info->userid = $user->id;

		$this->load->model('todo_model');
		$this->todo_model->insert($info);
		redirect('welcome/todos');

	}

	public function afvinken($id) {
		
		$this->load->model('todo_model');
		$todo = $this->todo_model->get($id);
		if ($todo->done == 0) {
			$todo->done = 1;
			$this->session->set_flashdata('melding', 'Alright! Dat is geschrapt.');
		}
		else
		{
			$todo->done = 0;
			$this->session->set_flashdata('melding', 'Ai ai, nog meer werk...');
		}

		$this->todo_model->update($todo);
		redirect('welcome/todos');
		
		

	}

	public function delete($id){
		$this->load->model('todo_model');
		$todo = $this->todo_model->get($id);
		$this->session->set_flashdata('melding', 'Het item "'.$todo->todo.'" werd verwijderd.');
		$this->todo_model->delete($id);
		redirect('welcome/todos');

	}


}

?>

