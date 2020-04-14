<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('users')) {
			redirect('/login');
		}
	}
	
	public function edit($id)
	{
		$data = array(
            'container' => 'admin/data',
            'data' => $this->summary->find($id)
		);
		$this->load->view('layouts/app', $data);
    }
    
    public function update($id)
    {
        $data = $this->input->post();
        $this->summary->update($id, $data);
        redirect('/admin/dashboard');
	}
}
