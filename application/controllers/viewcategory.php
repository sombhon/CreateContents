<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Viewcategory extends CI_Controller
{

    public function index()
    {
        if (!empty($this->input->get('category'))) {
            $ebook['name'] = $this->input->get("categoryname");
            $ebook['ebookList'] = $this->ebook_model->getEbookByType($this->input->get('category'));
            $this->load->view('layout/header');
            $this->load->view('category_view', $ebook);
            $this->load->view('layout/footer');
        }
    }
}
