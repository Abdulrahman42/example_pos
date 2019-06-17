<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('customers_m');
        $this->load->library('form_validation');
    }

    // menampilkan data dari database
    public function index()
    {
        $data['row'] = $this->customers_m->get();
        $this->template->load('template', 'customer/customer_data', $data);
    }
    // menambah data di database
    public function add()
    {
        $customer = new stdClass();
        $customer->customer_id = null;
        $customer->name = null;
        $customer->gender = null;
        $customer->phone = null;
        $customer->address = null;
        $data = [
            'page' => 'add',
            'row' => $customer
        ];
        $this->template->load('template', 'customer/customer_add', $data);
    }
    // mengubah data customer di database
    public function edit($id)
    {
        $query = $this->customers_m->get($id);
        if ($query->num_rows() > 0) {
            $customer = $query->row();
            $data = [
                'page' => 'edit',
                'row' => $customer
            ];
            $this->template->load('template', 'customer/customer_add', $data);
        } else {
            redirect('auth/blocked');
        }
    }
    // fungsi edit dan tambah data dalam 1 form
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->customers_m->add($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">customer berhasil ditambah!</div>');
        } else if (isset($_POST['edit'])) {
            $this->customers_m->edit($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">customer berhasil diubah!</div>');
        }

        redirect('customers');
    }

    // menghapus data di database
    public function del($id)
    {
        $this->customers_m->del($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">customer berhasil dihapus!</div>');
        redirect('customers');
    }
}
