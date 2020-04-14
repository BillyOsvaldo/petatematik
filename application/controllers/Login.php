<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('users')) {
            redirect('/admin/dashboard');
        }
    }

    public function index()
	{
        $this->load->view('login');
    }
    
    public function auth()
    {
        if (!$this->input->post()) {
            redirect('/login');
        } else {
            $uname = $this->input->post('username');
            $paswd = $this->input->post('password');

            $data = $this->user->credential($uname, $paswd);
            
            if ($data) {
                $this->session->set_userdata('users', $data);
                redirect('/admin/dashboard');
            } else {
                redirect('/login');
            }
        }
    }

}
