<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function validate($email,$password)
    {
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $result = $this->db->get('users',1);
        return $result;
    }

    public function getUserById($id)
    {
        return $this->db->get_where('users', ["username" => $id])->num_rows();
    }

    public function tambahDataUser()
    {
        $data = [
            "username" => $this->input->post('username', true),
            "email"    => $this->input->post('email', true),
            "password" => md5($this->input->post('password', true)),
            "level"    => $this->input->post('level', true),
            
        ];
        return $this->db->insert('users',$data);
    }
}
