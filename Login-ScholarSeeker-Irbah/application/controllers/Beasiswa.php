<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beasiswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Beasiswa_model");
		$this->load->model("Pendaftaran_model");
		$this->load->library('session');
	}

	public function index()
	{
		$data['beasiswa'] = $this->Beasiswa_model->getAllBeasiswa();
		$this->load->view('beasiswa_view', $data);
	}

	public function detailBeasiswa($id)
	{
		$data['beasiswa'] = $this->Beasiswa_model->getById($id);
		$data['username'] = $this->session->userdata('username');
		$this->load->view('page_beasiswa', $data);
	}

	public function daftar($id_beasiswa)
	{
		
        $post = $this->input->post();

        $data = array(
            "username" => $post["username"],
            "id_beasiswa" => $post["id_beasiswa"]
		);
		
		$validate = $this->Pendaftaran_model->checkDuplicate($data);
		if ($validate->num_rows() == 0) {
			$data = array(
				"status" => "Pending",
				"tanggal" => date('Y-m-d'),
				"username" => $post["username"],
				"id_beasiswa" => $post["id_beasiswa"]
			);

			$this->Pendaftaran_model->add($data);
			$this->session->set_flashdata('success', 'mendaftar');
			redirect('Beasiswa/detailBeasiswa/' . $id_beasiswa);
		}
		$this->session->set_flashdata('fail', 'sudah mendaftar');
		redirect('Beasiswa/detailBeasiswa/' . $id_beasiswa);
	}
}
