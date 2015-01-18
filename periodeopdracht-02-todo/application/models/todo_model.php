<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class todo_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');

	}

	function getTodosUser($userid) {

		$this->db->where('userid', $userid);
		$query = $this->db->get('todos');
		return $query->result();
	}

	
	function insert($todo)
	{
		$this->db->insert('todos', $todo);
		return $this->db->insert_id();
	}

	function get($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('todos');
		return $query->row();
	}

	    function update($todos)
    {
        $this->db->where('id', $todos->id);
        $this->db->update('todos', $todos);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('todos');
    }

}

?>