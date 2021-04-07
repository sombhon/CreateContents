<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function view($ebookId)
    {
		$data['ebook'] = $this->ebook_model->getEbookById($ebookId);
		$this->load->view('layout/header');
        $this->load->view('product_view' ,$data);
        $this->load->view('layout/footer');
    }
}
