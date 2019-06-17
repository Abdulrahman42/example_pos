<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suppliers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('suppliers_m');
        $this->load->library('form_validation');
    }

    // menampilkan data dari database
    public function index()
    {
        $data['row'] = $this->suppliers_m->get();
        $this->template->load('template', 'supplier/supplier_data', $data);
    }
    // menambah data di database
    public function add()
    {
        $supplier = new stdClass();
        $supplier->supplier_id = null;
        $supplier->name = null;
        $supplier->phone = null;
        $supplier->address = null;
        $supplier->description = null;
        $data = [
            'page' => 'add',
            'row' => $supplier
        ];
        $this->template->load('template', 'supplier/supplier_add', $data);
    }
    // mengubah data supplier di database
    public function edit($id)
    {
        $query = $this->suppliers_m->get($id);
        if ($query->num_rows() > 0) {
            $supplier = $query->row();
            $data = [
                'page' => 'edit',
                'row' => $supplier
            ];
            $this->template->load('template', 'supplier/supplier_add', $data);
        } else {
            redirect('auth/blocked');
        }
    }
    // fungsi edit dan tambah data dalam 1 form
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->suppliers_m->add($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Supplier berhasil ditambah!</div>');
        } else if (isset($_POST['edit'])) {
            $this->suppliers_m->edit($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Supplier berhasil diubah!</div>');
        }

        redirect('suppliers');
    }

    // menghapus data di database
    public function del($id)
    {
        $this->suppliers_m->del($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Supplier berhasil dihapus!</div>');
        redirect('suppliers');
    }
}
