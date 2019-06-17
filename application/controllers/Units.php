<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Units extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('units_m');
        $this->load->library('form_validation');
    }

    // menampilkan data dari database
    public function index()
    {
        $data['row'] = $this->units_m->get();
        $this->template->load('template', 'product/unit/unit_data', $data);
    }
    // menambah data di database
    public function add()
    {
        $unit = new stdClass();
        $unit->unit_id = null;
        $unit->name = null;
        $data = [
            'page' => 'add',
            'row' => $unit
        ];
        $this->template->load('template', 'product/unit/unit_add', $data);
    }
    // mengubah data unit di database
    public function edit($id)
    {
        $query = $this->units_m->get($id);
        if ($query->num_rows() > 0) {
            $unit = $query->row();
            $data = [
                'page' => 'edit',
                'row' => $unit
            ];
            $this->template->load('template', 'product/unit/unit_add', $data);
        } else {
            redirect('auth/blocked');
        }
    }
    // fungsi edit dan tambah data dalam 1 form
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->units_m->add($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">unit berhasil ditambah!</div>');
        } else if (isset($_POST['edit'])) {
            $this->units_m->edit($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">unit berhasil diubah!</div>');
        }

        redirect('units');
    }

    // menghapus data di database
    public function del($id)
    {
        $this->units_m->del($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">unit berhasil dihapus!</div>');
        redirect('units');
    }
}
