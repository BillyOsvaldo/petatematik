<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {

	public function index()
	{
		$this->load->view('main');
	}

	public function monitoring_corona()
	{
		$this->load->view('/map/monitoring_corona');
	}
}
