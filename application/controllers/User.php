<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('user_m');
    }

    public function index()
    {


        $data['row'] = $this->user_m->get();
        $this->template->load('template', 'user/user_data', $data);
    }
    public function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fullname', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password1]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password]');
        $this->form_validation->set_rules('address', 'Address', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'user/user_add');
        } else {

            $post = $this->input->post(null, TRUE);
            $this->user_m->add($post);
            if ($this->db->affected_rows() > 0) { }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil ditambah!</div>');
            redirect('user');
        }
    }
}
