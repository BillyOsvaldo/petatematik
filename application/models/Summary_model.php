<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Summary_model extends CI_Model {

    public function all() 
    {
        $this->db->select('summary.id,name,odp,selesai_pemantauan,dalam_pemantauan,
            pdp,pdp_negatif,pdp_sembuh,pdp_dirawat,pdp_meninggal,positif,
            positif_dirawat,positif_sembuh,positif_meninggal');
        $this->db->from('summary');
        $this->db->join('subdistrict', 'summary.id=subdistrict.id');
        $data = $this->db->get();

        return $data->result();
    }

    public function find($id)
    {
        $this->db->select('summary.id,name,odp,selesai_pemantauan,dalam_pemantauan,
            pdp,pdp_negatif,pdp_sembuh,pdp_dirawat,pdp_meninggal,positif,
            positif_dirawat,positif_sembuh,positif_meninggal');
        $this->db->from('summary');
        $this->db->join('subdistrict', 'summary.id=subdistrict.id');
        $this->db->where('md5(summary.id)', $id);
        $data = $this->db->get();

        return $data->row();
    }

    public function count($field) {
        $this->db->select("SUM($field) AS count");
        $data = $this->db->get('summary');
        
        return $data->row();
    }

    public function update($id, $data = array()) 
    {
        $this->db->where('md5(id)', $id);
        $this->db->update('summary', $data);
    }
}
