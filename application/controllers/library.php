<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Library extends CI_Controller
{
    public function index()
    {
        $data['mybook'] = $this->library_model->getMyBookByemail($this->session->userdata('user_login')->useremail);
		$this->load->view('layout/header');
        $this->load->view('library_view',$data);
        $this->load->view('layout/footer');
    }
}
