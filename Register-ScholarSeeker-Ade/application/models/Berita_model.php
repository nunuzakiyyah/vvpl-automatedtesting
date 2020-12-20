<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

  private $_table = "berita";
  
  public $id_berita;

  public function rules(){
    return [
      [
        'field' => 'judul',
        'label' => 'Judul',
        'rules' => 'required'
      ],
      [
        'field' => 'isi',
        'label' => 'Isi',
        'rules' => 'required'
      ],
      [
        'field' => 'tanggal',
        'label' => 'Tanggal',
        'rules' => 'required'
      ]
    ];
  }

  public function getAllBerita(){
    return $this->db->get($this->_table)->result();
  }

   public function getFiveBerita(){
    return $this->db->get($this->_table, 5)->result();
   }

  public function getById($id_berita) {
    return $this->db->get_where($this->_table, ["id_berita" => $id_berita])->row();
  }

  public function add($penulis){
    $post = $this->input->post();

    $this->id_beasiswa = uniqid();
    $data = array(
      "judul" => $post["judul"],
      "isi" => $post["isi"],
      "tanggal" => $post["tanggal"],
      "view" => 0,
      "gambar" => $this->_uploadImage($post["judul"]),
      "penulis" => $penulis
    );

    $this->db->insert($this->_table, $data);
  }

  public function update()
  {
    $post = $this->input->post();
    
    if (!empty($_FILES["gambar"]["name"])) {
      $this->id_berita = $post["id_berita"];
      $this->_deleteImage($post["id_berita"]);
      $image = $this->_uploadImage($post["judul"]);
    } else {
      $image = $post["old_poster"];
    }

    $data = array(
      "judul" => $post["judul"],
      "isi" => $post["isi"],
      "gambar" => $image
    );
    
    $this->db->update($this->_table, $data, array('id_berita' => $post["id_berita"]));
  }

  public function updateView($id_berita)
  {
    $data = array(
      "view" => +1
    );
    $this->db->update($this->_table, $data, array('id_berita' => $id_berita));
  }

  public function delete($id_berita)
  {
    $this->_deleteImage($id_berita);
    return $this->db->delete($this->_table, array("id_berita" => $id_berita));
  }

  private function _uploadImage($judul)
  {
    $config['upload_path']          = './upload/gambar/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $judul;
    $config['overwrite']			      = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('gambar')) {
        return $this->upload->data("file_name");
    }

    return "default_news.jpg";
  }

  private function _deleteImage($id_berita)
  {
    $berita = $this->getById($id_berita);
    if ($berita->gambar != "default_news.jpg") {
      $filename = explode(".", $berita->gambar)[0];
      return array_map('unlink', glob(FCPATH."upload/gambar/$filename.*"));
    }
  }
}