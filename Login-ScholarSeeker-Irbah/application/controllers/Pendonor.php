<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendonor extends CI_Controller {
    	
   function __construct() { 
      parent::__construct();
      $this->load->model("Beasiswa_model");
      $this->load->model("Pendaftaran_model");
      $this->load->model("Profile_model");
      $this->load->helper(array('form', 'url', 'download'));

      $this->load->library('form_validation');

      if($this->session->userdata('role') != "pendonor"){
         redirect('Landing');
      }
   } 
 
   public function index() {
      $data['records'] = $this->Beasiswa_model->getBeasiswa($this->session->userdata('username'));
      
      $this->load->view('page_pendonor', $data); 
   }

   public function profile() {
      $data['profile'] = $this->Profile_model->getProfile($this->session->userdata('username'));
      if(isset($data['profile'])){
         $this->load->view('page_profilePendonor', $data); 
      }
      else{
         echo "Halaman Tambah Profile";
      }
   }

   public function editProfile() {
      $post = $this->input->post();
      $profile = $this->Profile_model;
      $validation = $this->form_validation;
      $validation->set_rules($profile->rules());

      if ($validation->run()) {
         $profile->update();
         $this->session->set_flashdata('success', 'mengedit');
         redirect('Pendonor/profile/'.$post['id_profil']);
      }
   }

   public function addBeasiswa($id_pendonor = null)
   {
      $beasiswa = $this->Beasiswa_model;
      $validation = $this->form_validation;
      $validation->set_rules($beasiswa->rules());

      if ($validation->run()) {
         $beasiswa->add($id_pendonor);
         $this->session->set_flashdata('success', 'menyimpan');
         redirect('Pendonor');
      }
      else {
         $this->session->set_flashdata('success', 'gagal menyimpan');
         redirect('Pendonor');
      }
   }
   
   public function editBeasiswa() {
      $beasiswa = $this->Beasiswa_model;
      $validation = $this->form_validation;
      $validation->set_rules($beasiswa->rules());

      if ($validation->run()) {
         $beasiswa->update();
         $this->session->set_flashdata('success', 'mengedit');
         redirect('Pendonor');
      }
   }

   public function delBeasiswa($id_beasiswa=null) {
      if (!isset($id_beasiswa)) show_404();
        
      if ($this->Beasiswa_model->delete($id_beasiswa)) {
         $this->session->set_flashdata('success', 'menghapus');
         redirect(site_url('Pendonor'));
      }
   }

   public function lihatPendaftar($id_beasiswa){
      $data['pendaftar'] = $this->Pendaftaran_model->getPendaftar($id_beasiswa);

      $this->load->view('page_pendaftar', $data);
   }

   public function downloadBerkas($username, $id_beasiswa){
      $nama_file = 'upload/berkas/'.$username.'.pdf';
      if(file_exists("./upload/berkas/".$username.'.pdf')){
         force_download($nama_file, NULL);
         redirect('Pendonor/lihatPendaftar/'.$id_beasiswa);
      }
      else{
         $this->session->set_flashdata('fail', 'mendownload');
         redirect('Pendonor/lihatPendaftar/'.$id_beasiswa);
      }
   }

   public function lihatProfilePendaftar($username, $id_beasiswa){
      $data['id_beasiswa'] = $id_beasiswa;
      $data['profile'] = $this->Pendaftaran_model->getProfile($username);
      $this->load->view('page_profilePendaftar', $data);
   }

   public function editStatus($id_pendaftaran, $id_beasiswa, $username, $stat) {
      if($stat == "a"){
         $status = "Accepted";
      }
      else if($stat == "r"){
         $status = "Rejected";
      }
      else{
         $status = "Pending";
      }
      if($this->Pendaftaran_model->updateStatus($id_pendaftaran, $id_beasiswa, $username, $status)){
         $this->session->set_flashdata('success', 'mengubah');
         redirect('Pendonor/lihatPendaftar/'.$id_beasiswa);
      }
   }
}