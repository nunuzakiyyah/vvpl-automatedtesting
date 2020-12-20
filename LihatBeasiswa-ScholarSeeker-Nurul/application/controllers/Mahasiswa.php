<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
    	
    function __construct() { 
        parent::__construct();
        $this->load->model("Profile_model");
        $this->load->model("Pendaftaran_model");
        $this->load->helper(array('form', 'url', 'download'));

        $this->load->library('form_validation');

        if($this->session->userdata('role') != "mahasiswa"){
            redirect('Landing');
        }
    }

    public function index() {
        $data['apps'] = $this->Pendaftaran_model->getApplication($this->session->userdata('username'));
        
        $this->load->view('page_application.php', $data);
    }
}