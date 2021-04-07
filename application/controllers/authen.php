<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authen extends CI_Controller {

	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('homepage');
		$this->load->view('layout/footer');
    }
    public function login()
	{
		$this->load->view('layout/header');
		$this->load->view('login');
		$this->load->view('layout/footer');
    }
    
    public function register()
	{
		$this->load->view('layout/header');
		$this->load->view('register');
		$this->load->view('layout/footer');
        
    }

    public function login_check()
	{
        $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );
        $user = $this->user_model->checklogin($data);
        if(empty($user)){
            $this->session->set_flashdata('login_error' , 'ชื่อผู้ใช้ หรือรหัสผ่านไม่ถูกต้อง !!!');
            redirect(base_url()."authen/login");
        }else {
            $this->session->set_userdata('user_login' ,$user);
            redirect(base_url());
            
        }
    }

    public function logout()
	{
        $this->session->unset_userdata('user_login');
        redirect(base_url());
    }
}
