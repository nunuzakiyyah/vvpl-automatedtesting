<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->model("Profile_model");
        $this->load->helper(array('form','url','download'));
        $this->load->library('session');
        $this->load->library('form_validation');
    }
    
	public function index()
	{
        $data['profile'] = $this->Profile_model->getProfile($this->session->userdata('username'));
        if(isset($data['profile'])){
            $this->load->view('page_profile', $data); 
        }
        else{
            echo "Hiya belum ada profil.";
        }
    }
    
    public function getUserByid($id){
        return $this->db->get_where('users',["username" => $id])->num_rows();
    }

    public function addProfile($username = null){
        $profile = $this->Profile_model;
        $validation = $this -> form_validation;
    }

    public function editProfile() {
        $post = $this->input->post();
        $validation = $this->form_validation;
        $validation->set_rules($this->Profile_model->rules());
  
        if ($validation->run()) {
            $this->Profile_model->update();
            $this->session->set_flashdata('success', 'mengedit');
            redirect('Profile');
        }
     }

     public function uploadBerkas(){
        if($this->Profile_model->updateBerkas()){
            $this->session->set_flashdata('success', 'mengupload');
            redirect('Profile');
        }
        $this->session->set_flashdata('fail', 'mengupload');
        redirect('Profile');
     }

     public function downloadBerkas($username){
        $nama_file = 'upload/berkas/'.$username.'.pdf';
        if(file_exists("./upload/berkas/".$username.'.pdf')){
           force_download($nama_file, NULL);
           redirect('Profile');
        }
        else{
           $this->session->set_flashdata('fail', 'mendownload');
           redirect('Profile');
        }
     }
}