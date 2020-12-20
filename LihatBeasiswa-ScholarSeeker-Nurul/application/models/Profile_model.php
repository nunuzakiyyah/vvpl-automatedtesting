<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{

    private $_table = "profile";

    public $id_profil;

    public function rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],
            [
                'field' => 'jk',
                'label' => 'Jenis Kelamin',
                'rules' => 'required'
            ],
            [
                'field' => 'tgl_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'required'
            ],
            [
                'field' => 'no_tlp',
                'label' => 'Nomor Telepon',
                'rules' => 'required'
            ],
            [
                'field' => 'jalan',
                'label' => 'Alamat',
                'rules' => 'required'
            ],
            [
                'field' => 'kota',
                'label' => 'Kota',
                'rules' => 'required'
            ],
            [
                'field' => 'provinsi',
                'label' => 'Provinsi',
                'rules' => 'required'
            ],
            [
                'field' => 'negara',
                'label' => 'Negara',
                'rules' => 'required'
            ],
            [
                'field' => 'institusi',
                'label' => 'Institusi',
                'rules' => 'required'
            ],
        ];
    }

    public function getAllProfile()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getProfile($username)
    {
        return $this->db->get_where($this->_table, ["username" => $username])->row();
    }

    public function getById($id_profil)
    {
        return $this->db->get_where($this->_table, ["id_profil" => $id_profil])->row();
    }

    public function add($username)
    {
        $data = array(
            "nama" => "-",
            "jk" => "L",
            "tgl_lahir" => "-",
            "no_tlp" => "-",
            "jalan" => "-",
            "kota" => "-",
            "provinsi" => "-",
            "negara" => "-",
            "institusi" => "-",
            "username" => $username
        );
        $this->db->insert($this->_table, $data);
    }

    public function update()
    {
        $post = $this->input->post();

        if (!empty($_FILES["avatar"]["name"])) {
            $this->id_profil = $post["id_profil"];
            $this->_deleteImage($post["id_profil"]);
            $image = $this->_uploadImage();
        } else {
            $image = $post["old_avatar"];
        }

        $data = array(
            "nama" => $post["nama"],
            "jk" => $post["jk"],
            "tgl_lahir" => $post["tgl_lahir"],
            "no_tlp" => $post["no_tlp"],
            "jalan" => $post["jalan"],
            "kota" => $post["kota"],
            "provinsi" => $post["provinsi"],
            "negara" => $post["negara"],
            "institusi" => $post["institusi"],
            "avatar" => $image
        );

        $this->db->update($this->_table, $data, array('id_profil' => $post["id_profil"]));
    }

    public function updateBerkas()
    {
        if (!empty($_FILES["berkas"]["name"])) {
            $this->_deleteBerkas();
            return $this->_uploadBerkas();
        }
        return false;
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/avatar/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $this->id_profil;
        $config['overwrite']              = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('avatar')) {
            return $this->upload->data("file_name");
        }

        return "user.png";
    }

    private function _deleteImage($id_profil)
    {
        $profile = $this->getById($id_profil);
        if ($profile->avatar != "user.png") {
            $filename = explode(".", $profile->avatar)[0];
            return array_map('unlink', glob(FCPATH . "upload/avatar/$filename.*"));
        }
    }

    private function _uploadBerkas()
    {
        $config['upload_path']          = './upload/berkas/';
        $config['allowed_types']        = 'pdf';
        $config['file_name']            = $this->session->userdata('username');
        $config['overwrite']              = true;
        // $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('berkas')) {
            return TRUE;
        }

        return FALSE;
    }

    private function _deleteBerkas()
    {
        $berkas = $this->session->userdata('username') . ".pdf";
        if ($berkas != "template.pdf") {
            $filename = explode(".", $berkas)[0];
            return array_map('unlink', glob(FCPATH . "upload/berkas/$filename.*"));
        }
    }
}
