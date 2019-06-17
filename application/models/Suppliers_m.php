<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suppliers_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('supplier');
        if ($id != null) {
            $this->db->where('supplier_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $data = [
            'name' => $post['supplier_name'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'description' => $post['description']

        ];
        $this->db->insert('supplier', $data);
    }
    public function edit($post)
    {
        $data = [
            'name' => $post['supplier_name'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'description' => $post['description'],
            'updated' => date('Y-m-d H:i:s')

        ];
        $this->db->where('supplier_id', $post['id']);
        $this->db->update('supplier', $data);
    }
    public function del($id)
    {
        $this->db->where('supplier_id', $id);
        $this->db->delete('supplier');
    }
}
