<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model
{

    private $_table = "pendaftaran";

    public function rules()
    {
        return [
            [
                'field' => 'status',
                'label' => 'Status',
                'rules' => 'required'
            ],
            [
                'field' => 'tanggal',
                'label' => 'Tanggal',
                'rules' => 'required'
            ]
        ];
    }

    public function getApplication($username)
    {
        $this->db->select('status, tanggal, pendaftaran.id_beasiswa, judul');
        $this->db->from('pendaftaran');
        $this->db->join('beasiswa', 'pendaftaran.id_beasiswa = beasiswa.id_beasiswa');
        $this->db->where('username', $username);
        $query = $this->db->get();
        return $query->result();
    }

    public function getPendaftar($id_beasiswa)
    {
        return $this->db->get_where($this->_table, ["id_beasiswa" => $id_beasiswa])->result();
    }

    public function getProfile($username)
    {
        return $this->db->get_where('profile', ["username" => $username])->row();
    }

    public function add($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function checkDuplicate($data)
    {
        return $this->db->get_where($this->_table, $data);
    }

    public function updateStatus($id_pendaftaran, $id_beasiswa, $username, $status)
    {
        $post = $this->input->post();

        $data = array(
            "status" => $status
        );

        $where = array(
            'id_pendaftaran' => $id_pendaftaran,
            'username' => $username,
            'id_beasiswa' => $id_beasiswa
        );

        return $this->db->update($this->_table, $data, $where);
    }
}
