<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function credential($uname, $paswd) 
    {
        $this->db->where('username', $uname);
        $this->db->where('password', md5($paswd));
        $data = $this->db->get('users');

        return $data->row();
    }
}
