<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['ebookrecommend'] = $this->ebook_model->getRecommend(4);
		$data['BestSeller'] = $this->ebook_model->getBestSeller(8);
		$data['NewBooks'] = $this->ebook_model->getNewBooks(8);
		$this->load->view('layout/header');
		$this->load->view('homepage' ,$data);
		$this->load->view('layout/footer');
	}
}
