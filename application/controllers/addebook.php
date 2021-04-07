<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Addebook extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->session->userdata("user_login");
		$this->load->view('layout/header');
        $this->load->view('addebook_view',$data);
        $this->load->view('layout/footer');
    }
}
