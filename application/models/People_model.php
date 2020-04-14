<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class People_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $this->db->order_by('id', 'DESC');
        $data = $this->db->get('peoples');

        return $data->result();
    }

    public function find($id)
    {
        $this->db->where('md5(id)', $id);
        $data = $this->db->get('peoples');

        return $data->row();
    }

    public function create($data = array())
    {
        $this->db->insert('peoples', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data = array())
    {
        $this->db->where('md5(id)', $id);
        $this->db->update('peoples', $data);
    }

    public function delete($id)
    {
        $this->db->where('md5(id)', $id);
        $this->db->delete('peoples');
    }
}  
