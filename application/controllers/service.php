<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	public function index()
	{
		redirect(base_url()."admin/authen");
    }
}
