<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }
    // mengambil data di database
    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    // menambah data di database
    public function add($post)
    {
        $data = [
            'name' => $this->input->post('fullname'),
            'username' => $this->input->post('username'),
            'password' => sha1($post['password']),
            'address' => $this->input->post('address'),
            'level' => $this->input->post('level')

        ];
        $this->db->insert('user', $data);
    }
    // menghapus data di database
    public function del($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }

    // mengubah data di database

    public function edit($post)
    {
        $data = [
            'name' => $this->input->post('fullname'),
            'username' => $this->input->post('username'),
            // 'password' => sha1($post['password']),
            'address' => $this->input->post('address'),
            'level' => $this->input->post('level')

        ];
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $data);
    }
}
