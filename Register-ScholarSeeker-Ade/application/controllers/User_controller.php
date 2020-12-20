<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model "Mahasiswa_model"
        //load library form validation

        $this->load->model('User_model');
        $this->load->library('form_validation');
    }
    public function Register()
    {
        //from library form_validation, set rules for nama, nim, email = required
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('level', 'level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register_view');
        } else {
            $this->load->model('Profile_model');
            $this->User_model->tambahDataUser();
            $this->Profile_model->add($this->input->post('username'));
            $this->session->set_flashdata('alert', 'Sukses Regis');
            redirect('Landing/login');
        }
    }

    public function Signin()
    {
        $email    = $this->input->post('email', TRUE);
        $password = md5($this->input->post('password', TRUE));
        $validate = $this->User_model->validate($email, $password);
        if ($validate->num_rows() == 1) {
            $data  = $validate->row_array();
            $name  = $data['username'];
            $email = $data['email'];
            $level = $data['level'];
            $newdata = array(
                'username'  => $name,
                'email'     => $email,
                'role'      => $this->role($level),
                'logged_in' => TRUE
            );

            $this->session->set_userdata($newdata);
            redirect('Landing');
        } else {
            $this->session->set_flashdata('alert', 'Fail Login');
            redirect('Landing/login');
        }
    }

    public function Logout()
    {
        $this->session->sess_destroy();
        redirect('Landing');
    }

    public function role($level)
    {
        if ($level == 3) {
            return 'admin';
        } elseif ($level == 2) {
            return 'pendonor';
        } else {
            return 'mahasiswa';
        }
    }
}
