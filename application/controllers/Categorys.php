<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categorys extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('categorys_m');
        $this->load->library('form_validation');
    }

    // menampilkan data dari database
    public function index()
    {
        $data['row'] = $this->categorys_m->get();
        $this->template->load('template', 'product/category/category_data', $data);
    }
    // menambah data di database
    public function add()
    {
        $category = new stdClass();
        $category->category_id = null;
        $category->name = null;
        $data = [
            'page' => 'add',
            'row' => $category
        ];
        $this->template->load('template', 'product/category/category_add', $data);
    }
    // mengubah data category di database
    public function edit($id)
    {
        $query = $this->categorys_m->get($id);
        if ($query->num_rows() > 0) {
            $category = $query->row();
            $data = [
                'page' => 'edit',
                'row' => $category
            ];
            $this->template->load('template', 'product/category/category_add', $data);
        } else {
            redirect('auth/blocked');
        }
    }
    // fungsi edit dan tambah data dalam 1 form
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->categorys_m->add($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">category berhasil ditambah!</div>');
        } else if (isset($_POST['edit'])) {
            $this->categorys_m->edit($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">category berhasil diubah!</div>');
        }

        redirect('categorys');
    }

    // menghapus data di database
    public function del($id)
    {
        $this->categorys_m->del($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">category berhasil dihapus!</div>');
        redirect('categorys');
    }
}
