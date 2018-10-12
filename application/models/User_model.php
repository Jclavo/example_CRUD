<?php

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_user($id = '')
    {
        if ($id === '') {
            //$query = $this->db->query('SELECT id, name, email FROM user');
            $query = $this->db->query('CALL sp_get_user');
            //$this->db->call_function('sp_get_user');
            
        } else {
            $query = $this->db->query("SELECT id, name, email FROM user WHERE id='" . $id . "'");
        }
        return $query->result_array();

        // $query = $this->db->get_where('news', array('slug' => $slug));
        // return $query->row_array();
    }

    public function create_user($name, $email)
    {
        return $this->db->query("insert into user (name,email) values ('" . $name . "','" . $email . "')");
    }

    public function delete_user($id)
    {
        return $this->db->query("delete from user where id ='" . $id . "'");
    }
    
    public function update_user($id, $name, $email)
    {
        return $this->db->query("UPDATE user SET name='" . $name . "', email='" . $email . "'  WHERE id='" . $id . "'");
    }
}
