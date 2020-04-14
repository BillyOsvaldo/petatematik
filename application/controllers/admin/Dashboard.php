<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('users')) {
			redirect('/login');
		}
	}
	
	public function index()
	{
		$data = array(
			'container' => 'admin/dashboard',
			'data' => $this->summary->all()
		);
		$this->load->view('layouts/app', $data);
	}
}
