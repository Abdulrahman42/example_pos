<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('user_m');
        $this->load->library('form_validation');
    }
    // manampilkan data user
    public function index()
    {
        $data['row'] = $this->user_m->get();
        $this->template->load('template', 'user/user_data', $data);
    }
    // menambahkan data user
    public function add()
    {
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
    // mengubah data user
    public function edit($id)
    {
        $this->form_validation->set_rules('fullname', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|callback_username_check');
        // $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password1]', [
        //     'matches' => 'Password dont match!',
        //     'min_length' => 'Password too short'
        // ]);
        // $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password]');
        $this->form_validation->set_rules('address', 'Address', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->user_m->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'user/user_edit', $data);
            } else {
                // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data tidak ditemukan!</div>');

                redirect('auth/blocked');
            }
        } else {

            $post = $this->input->post(null, TRUE);
            $this->user_m->edit($post);
            if ($this->db->affected_rows() > 0) { }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil diubah!</div>');
            redirect('user');
        }
    }
    // mengecek username yang sudah ada
    function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE username='$post[username]' AND user_id !='$post[user_id]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', 'This {field} already used, please change!');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    // menghapus user
    public function del()
    {
        $id = $this->input->post('user_id');
        $this->user_m->del($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil dihapus!</div>');
        redirect('user');
    }
}
