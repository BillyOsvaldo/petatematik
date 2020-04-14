<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subdistrict_model extends CI_Model {

    public function find($id) 
    {
        $this->db->where('md5(id)', $id);
        $data = $this->db->get('subdistrict');

        return $data->row();
    }
}
