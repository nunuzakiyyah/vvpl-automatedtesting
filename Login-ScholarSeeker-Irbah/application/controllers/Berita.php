<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
    	
   function __construct() { 
      parent::__construct();
      $this->load->model("Berita_model");
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->load->library('session');
   } 
 
   public function index() {
      if($this->session->userdata('role') == "admin"){
         $data['records'] = $this->Berita_model->getAllBerita();
         $this->load->view('page_berita', $data); 
      }else{
        redirect("Landing");
      }
   }

   public function daftarBerita(){
      $data['news'] = $this->Berita_model->getAllBerita();
      $this->load->view('berita_view', $data); 
   }

   public function detailBerita($id_berita){

   }

   public function profile() {
      $this->load->view('profile');
   }

   public function addBerita($penulis = null)
   {
      $berita = $this->Berita_model;
      $validation = $this->form_validation;
      $validation->set_rules($berita->rules());

      if ($validation->run()) {
         $berita->add($penulis);
         $this->session->set_flashdata('success', 'menyimpan');
         redirect('Berita');
      }
      else {
         $this->session->set_flashdata('success', 'gagal menyimpan');
         redirect('Berita');
      }
   }
   
   public function editBerita() {
      $berita = $this->Berita_model;
      $validation = $this->form_validation;
      $validation->set_rules($berita->rules());

      if ($validation->run()) {
         $berita->update();
         $this->session->set_flashdata('success', 'mengedit');
         redirect('Berita');
      }
   }

   public function delBerita($id_berita=null) {
      if (!isset($id_berita)) show_404();
        
      if ($this->Berita_model->delete($id_berita)){
         $this->session->set_flashdata('success', 'menghapus');
         redirect(site_url('Berita'));
      }
   }
}