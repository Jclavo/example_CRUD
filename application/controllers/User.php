<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $this->load->view('user/user');
    }

    public function get_user()
    {
        $id = $this->input->get('id');
        $data['user'] = $this->user_model->get_user($id);
        echo json_encode($data);
    }

    public function create_user()
    {
        $name = $this->input->get('name');
        $email = $this->input->get('email');

        $data['status'] = $this->user_model->create_user($name, $email);
        echo json_encode($data);
    }

    public function delete_user()
    {
        $id = $this->input->get('id');
        $data['status'] = $this->user_model->delete_user($id);
        echo json_encode($data);
    }

    public function update_user()
    {
        $id = $this->input->get('id');
        $name = $this->input->get('name');
        $email = $this->input->get('email');

        $data['status'] = $this->user_model->update_user($id, $name, $email);
        echo json_encode($data);
    }
}
