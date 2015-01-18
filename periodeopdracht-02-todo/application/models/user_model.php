<?php

class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get($id)
    {
        // geef user-object met opgegeven $id   
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->row();
    }
    
    

    function getAccount($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        
        $query = $this->db->get('users');
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return null;
        }
    }
    
    function emailVrij($email)
    {
        // is email al dan niet aanwezig
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        if ($query->num_rows() == 0) {
            return true;
        } else {
            return false;
        }
    }
    
    function insert($email, $password, $salt)
    {
        // voeg nieuwe user toe
        $user = new stdclass();
        $user->email = $email;
        $user->password = sha1($password);
        $user->salt = $salt;
        $this->db->insert('users', $user);
        return $this->db->insert_id();
    }

    function wachtwoordCheck($password){
        if (strlen($password) >= 8) {
            return true;
        }
        else
        {
            return false;
        }
    }




}

?>