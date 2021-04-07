<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		if (empty($this->session->userdata('user_login'))) {
			$this->session->set_flashdata('login_error', 'กรุณาล็อคอินเพื่อเข้าถึงการใช้งาน');
			redirect(base_url());
		}
	}

	public function index()
    {
		$data['user'] = $this->user_model->getUserDetails($this->session->userdata('user_login')->userID);
        $this->load->view('layout/header');
        $this->load->view('profile',$data);
        $this->load->view('layout/footer');
	}
	public function change_type_user()
	{
		$pass = $this->input->post('pwu');
		if($this->user_model->updateTypeUser($pass)){
			$this->session->set_flashdata('ms_all_success' , 'เปลี่ยนข้อมูลสถานะผู้ใช้ เป็นผู้เขียนเสร็จสิ้น');
		}else{
			$this->session->set_flashdata('ms_all_error' , 'ไม่สามารถแก้ไขได้ รหัสผ่านไม่ถูกต้อง');
		}
		redirect(base_url().'user');
	}

	public function resgister_submit()
	{
		$post = $this->input->post();
		$register = array(
			'userID' => $this->runnum_model->getUser(),
			'useremail' => $this->input->post('email'),
			'userpass' => $this->input->post('password'),
			'usernamea' => $this->input->post('namea'),
			'username' => $this->input->post('name'),
			'userlastname' => $this->input->post('lastname'),
			'userimg' => 'user.jpg',
			'usertelophone' => $this->input->post('telophone'),
			'usercradit' => 0,
			'useraddress' => $this->input->post('address'),
			'useradistrict' => $this->input->post('adistrict'),
			'userprovince' => $this->input->post('province'),
			'userbirthday' => $this->input->post('birthday'),
			'orderpexpirationdate' => date('Y-d-m H:i:s'),
			'sextypename' => $this->input->post('sextype'),
			'usercancel' => 0,
			'usertypeID' => 'UT01',
			'sshareID' => 'SS01'
		) ;
		$this->runnum_model->updateUser();
		if($this->user_model->insertUser($register)){
			$this->session->set_userdata('ms_all_success' , 'ลงทะเบียนเสร็จสิ้นแล้ว');
		}else {
			$this->session->set_userdata('ms_all_error' , 'ไม่สามารถลงทะเบียนได้');
		}
		redirect(base_url());
	}
}
