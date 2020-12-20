<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beasiswa_model extends CI_Model
{

  private $_table = "beasiswa";

  public $id_beasiswa;

  public function rules()
  {
    return [
      [
        'field' => 'judul',
        'label' => 'Judul',
        'rules' => 'required'
      ],
      [
        'field' => 'tgl_mulai',
        'label' => 'Tanggal Mulai',
        'rules' => 'required'
      ],
      [
        'field' => 'tgl_selesai',
        'label' => 'Tanggal Selesai',
        'rules' => 'required'
      ],
      [
        'field' => 'deskripsi',
        'label' => 'Deskripsi',
        'rules' => 'required'
      ],
      [
        'field' => 'jenis',
        'label' => 'Jenis',
        'rules' => 'required'
      ]
    ];
  }

  public function getAllBeasiswa()
  {
    return $this->db->get($this->_table)->result();
  }

  public function getFiveBeasiswa()
  {
    return $this->db->get($this->_table, 5)->result();
  }

  public function getBeasiswa($username_pendonor)
  {
    return $this->db->get_where($this->_table, ["username_pendonor" => $username_pendonor])->result();
  }

  public function getById($id_beasiswa)
  {
    return $this->db->get_where($this->_table, ["id_beasiswa" => $id_beasiswa])->row();
  }

  public function add($username_pendonor)
  {
    $post = $this->input->post();

    $this->id_beasiswa = uniqid();
    $data = array(
      "id_beasiswa" => $this->id_beasiswa,
      "judul" => $post["judul"],
      "deskripsi" => $post["deskripsi"],
      "tgl_mulai" => $post["tgl_mulai"],
      "tgl_selesai" => $post["tgl_selesai"],
      "jenis" => $post["jenis"],
      "poster" => $this->_uploadImage(),
      "username_pendonor" => $username_pendonor
    );

    $this->db->insert($this->_table, $data);
  }

  public function update()
  {
    $post = $this->input->post();

    if (!empty($_FILES["poster"]["name"])) {
      $this->id_beasiswa = $post["id_beasiswa"];
      $this->_deleteImage($post["id_beasiswa"]);
      $image = $this->_uploadImage();
    } else {
      $image = $post["old_poster"];
    }

    $data = array(
      "judul" => $post["judul"],
      "deskripsi" => $post["deskripsi"],
      "tgl_mulai" => $post["tgl_mulai"],
      "tgl_selesai" => $post["tgl_selesai"],
      "poster" => $image,
      "jenis" => $post["jenis"],
    );

    $this->db->update($this->_table, $data, array('id_beasiswa' => $post["id_beasiswa"]));
  }

  public function delete($id_beasiswa)
  {
    $this->_deleteImage($id_beasiswa);
    return $this->db->delete($this->_table, array("id_beasiswa" => $id_beasiswa));
  }

  private function _uploadImage()
  {
    $config['upload_path']          = './upload/poster/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['file_name']            = $this->id_beasiswa;
    $config['overwrite']            = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('poster')) {
      return $this->upload->data("file_name");
    }

    return "default_beasiswa.jpg";
  }

  private function _deleteImage($id_beasiswa)
  {
    $beasiswa = $this->getById($id_beasiswa);
    if ($beasiswa->poster != "default_beasiswa.jpg") {
      $filename = explode(".", $beasiswa->poster)[0];
      return array_map('unlink', glob(FCPATH . "upload/poster/$filename.*"));
    }
  }
}
