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
            $query = $this->db->query('CALL usp_user_get');
            
        } else {
                $sql = 'CALL usp_user_getbyid(?)';
                $query = $this->db->query($sql,array($id));
        }
        return $query->result_array();

    }

    public function create_user($name, $email)
    {
        $sql = 'CALL usp_user_add(?,?)';
        return $this->db->query($sql,array($name,$email));        
    }

    public function delete_user($id)
    {
           $sql = 'CALL usp_user_delete(?)';
           return $this->db->query($sql,array($id)); 
    }
    
    public function update_user($id, $name, $email)
    {
//         return $this->db->query("UPDATE user SET name='" . $name . "', email='" . $email . "'  WHERE id='" . $id . "'");
//         call usp_user_update('27','cokero','cokero@gmail.com');
        
        $sql = 'CALL usp_user_update(?,?,?)';
        return $this->db->query($sql,array($id,$name,$email)); 
        
    }
}
