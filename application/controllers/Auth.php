<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        check_already_login();
        $this->load->view('login');
    }
    public function login()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {
            $this->load->model('user_m');
            $query = $this->user_m->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $data = [
                    'userid' => $row->user_id,
                    'level' => $row->level
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong username or password!</div>');
                redirect('auth');
            }
        }
    }
    public function logout()
    {
        $data = ['userid', 'leve;'];
        $this->session->unset_userdata($data);
        redirect('auth');
    }
}
