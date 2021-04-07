<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authen extends CI_Controller {

    public function __construct() {
        parent::__construct();
   
    }
    public function index() {
        redirect(base_url()."admin/authen/login");
    }
    public function login()
	{
        if(!empty($this->session->userdata("admin_login"))){
            redirect(base_url()."admin/create");
        }
		$this->load->view('admincreate/login');
		$this->load->view('admincreate/layout/footer');
    }
    
    public function register()
	{
		// $this->load->view('layout/header');
		// $this->load->view('register');
		// $this->load->view('layout/footer');
        
    }

    public function login_check()
	{
        $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );
        $user = $this->employee_model->checklogin($data);
        if(empty($user)){
            $this->session->set_flashdata('login_error' , 'ชื่อผู้ใช้ หรือรหัสผ่านไม่ถูกต้อง !!!');
            redirect(base_url()."admin/authen/login");
        }else {
            $this->session->set_userdata('admin_login' ,$user);
            redirect(base_url()."admin/create");
        }
    }

    public function logout()
	{
        $this->session->unset_userdata('admin_login');
        redirect(base_url());
    }
}
