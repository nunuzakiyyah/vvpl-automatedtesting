<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('Beasiswa_model');
        $this->load->model('Berita_model');
        $data['beasiswa'] = $this->Beasiswa_model->getFiveBeasiswa();
        $data['news'] = $this->Berita_model->getFiveBerita();
        $this->load->view('home_page', $data);
    }

    public function login()
    {
        $this->load->view('login_view');
    }

    public function register()
    {
        $this->load->library('form_validation');
        $this->load->view('register_view');
    }
}
