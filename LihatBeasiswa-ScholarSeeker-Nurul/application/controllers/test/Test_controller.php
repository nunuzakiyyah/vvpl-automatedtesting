<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');

        $this->load->model('Pendaftaran_model');
    }

    private function _daftar_beasiswa($data)
	{
        $post = $data;
        $data = array(
            "username" => $post["username"],
            "id_beasiswa" => $post["id_beasiswa"]
		);
		
		$validate = $this->Pendaftaran_model->checkDuplicate($data);
		if ($validate->num_rows() == 0) {
			$data = array(
				"status" => $post["username"],
				"tanggal" => $post["username"],
				"username" => $post["username"],
				"id_beasiswa" => $post["id_beasiswa"]
			);

			return $this->Pendaftaran_model->add($data);
		}
		return false;
	}

    public function daftar_beasiswa_test()
    {
        $data = array(
            "status" => "Pending",
            "tanggal" => date('Y-m-d'),
            "username" => 'mahasiswa',
            "id_beasiswa" => '5cb6b3a2bd67d'
        );
        
        $test = $this->_daftar_beasiswa($data);
        $expected_result = true;
        $test_name = 'Pendaftaran Beasiswa';

        echo $this->unit->run($test, $expected_result, $test_name);
    }
}
