<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Packread extends CI_Controller
{

    public function index()
    {
		$this->load->view('layout/header');
        $this->load->view('packread/packread');
        $this->load->view('layout/footer');
    }
}
