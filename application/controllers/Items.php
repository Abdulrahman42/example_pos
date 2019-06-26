<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Items extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['items_m', 'categorys_m', 'units_m']);
        $this->load->library('form_validation');
    }

    // menampilkan data dari database
    public function index()
    {
        $data['row'] = $this->items_m->get();
        $this->template->load('template', 'product/item/item_data', $data);
    }
    // menambah data di database
    public function add()
    {
        $item = new stdClass();
        $item->item_id = null;
        $item->barcode = null;
        $item->price = null;
        $item->stock = null;
        $item->name =  null;
        $item->category_id =  null;
        $query_category = $this->categorys_m->get();
        $query_unit = $this->units_m->get();
        $unit[null] = '-Pilih-';
        foreach ($query_unit->result() as $u) {

            $unit[$u->unit_id] = $u->name;
        };
        $data = [
            'page' => 'add',
            'row' => $item,
            'category' => $query_category,
            'unit' => $unit,
            'selectedunit' => null
        ];
        $this->template->load('template', 'product/item/item_add', $data);
    }
    // mengubah data item di database
    public function edit($id)
    {
        $query = $this->items_m->get($id);
        if ($query->num_rows() > 0) {
            $item = $query->row();
            $query_category = $this->categorys_m->get();
            $query_unit = $this->units_m->get();
            $unit[null] = '-Pilih-';
            foreach ($query_unit->result() as $u) {

                $unit[$u->unit_id] = $u->name;
            };
            $data = [
                'page' => 'edit',
                'row' => $item,
                'category' => $query_category,
                'unit' => $unit,
                'selectedunit' => $item->unit_id
            ];
            $this->template->load('template', 'product/item/item_add', $data);
        } else {
            redirect('auth/blocked');
        }
    }
    // fungsi edit dan tambah data dalam 1 form
    public function process()
    {
        $config['upload_path']   = './uploads/product/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 2048;
        $config['file_name']     = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if ($this->items_m->check_barcode($post['barcode'])->num_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Barcode telah digunakan!</div>');
                redirect('items/add');
            } else {
                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {
                        $post['image'] = $this->upload->data('file_name');
                        $this->items_m->add($post);
                        if ($this->db->affected_rows() > 0) {

                            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">item berhasil ditambah!</div>');
                        }
                        redirect('items');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">item gagal ditambah!</div>');
                        redirect('items/add');
                    }
                } else {
                    $post['image'] = null;
                    $this->items_m->add($post);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">item berhasil ditambah!</div>');
                    redirect('items');
                }
            }
        } else if (isset($_POST['edit'])) {
            if ($this->items_m->check_barcode($post['barcode'], $post['id'])->num_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Barcode telah digunakan!</div>');
                redirect('items/edit/' . $post['id']);
            } else {
                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {
                        $item = $this->items_m->get($post['id'])->row();
                        if ($item->image != null) {
                            $target_file = './uploads/product/' . $item->image;
                            unlink($target_file);
                        }
                        $post['image'] = $this->upload->data('file_name');
                        $this->items_m->edit($post);
                        if ($this->db->affected_rows() > 0) {

                            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">item berhasil diubah!</div>');
                        }
                        redirect('items');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">item gagal ditambah!</div>');
                        redirect('items/edit');
                    }
                } else {
                    $post['image'] = null;
                    $this->items_m->edit($post);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">item berhasil diubah!</div>');
                    redirect('items');
                }
                // $this->items_m->edit($post);
                // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">item berhasil diubah!</div>');
            }
        }

        redirect('items');
    }

    // menghapus data di database
    public function del($id)
    {
        $this->items_m->del($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">item berhasil dihapus!</div>');
        redirect('items');
    }
}
