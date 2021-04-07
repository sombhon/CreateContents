<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Create extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata("admin_login"))) {
            redirect(base_url() . "admin/authen/login");
        }
    }

    public function index()
    {
        $this->load->view('admincreate/layout/header');
        $this->load->view('admincreate/dashboard');
        $this->load->view('admincreate/layout/footerdashboard');
    }

    // order_bill
    public function orderWait_for_approval()
    {
        $data['approval'] = $this->carts_model->getOrderApprovalAll();
        $this->session->set_userdata('menu_order_selected', 'approval_select');
        $this->load->view('admincreate/layout/header');
        $this->load->view('admincreate/order/order_wait_approval', $data);
        $this->load->view('admincreate/layout/footerdashboard');
    }

    public function orderWait_for_approva_confirm($orderID)
    {
        $orDetails = $this->carts_model->getOrderJdetailsById($orderID);
        foreach ($orDetails as $ordetail) {
            $data = array(
                'useremail'         => $ordetail->useremail,
                'ebookID'           => $ordetail->ebookID,
                'libra_receivedate' => date('Y-m-d H:i:s')
            );
            //เพิ่มข้อมูลหนังสือไปยังผู้รับ
            $this->library_model->insertLibrary($data);

            ////// คำนวณรายได้ให้กับผู้เขียน ///////
            // ดึงเรทการจ่าย และรหัสผู้เขียน จากหนังสือที่ซื้อ
            $user = $this->user_model->getuserByebookID($ordetail->ebookID);

            // คำนวณจ่ายจาก ยอดขายสุทธิ  = ยอดขายสุทธิ * เปอเซนส่วนแบงค์ /100 จะได้อัตราจ่ายต่อเปอร์เซ็นต์ส่วนแบ่ง
            $payment = $ordetail->orderdNetprice * $user->sshareper / 100;

            $dataPayment = array(
                'paymentdate'        => date('Y-m-d H:i:s'),
                'ebookIDsales'       => $ordetail->ebookID,
                'ebookprice'         => $ordetail->orderdFullprice,
                'ebookpricediscount' => $ordetail->orderdDiscountprice,
                'paymentIncome'      => $payment,
                'userID'             => $user->userID
            );

            // บันทึกประวัติการจ่าย
            $this->carts_model->insertPaymentIncome($dataPayment);

            //อัพเดตเงินผู้ใช้
            $this->user_model->moneyup_cradit($user->userID, $payment);
        }

        //เปลี่ยนสถานะการสั่งซื้อ
        if ($this->carts_model->updateOrderssto_completed($orderID)) {
            $this->session->flashdata('ms_success', 'บันทึกเสร็จสิ้น');
        } else {
            $this->session->flashdata('ms_error', 'ไม่สามารถยืนยันได้');
        }
        redirect(base_url() . "admin/create/orderWait_for_approval");
    }

    public function orderProof_pay()
    {
        $this->session->set_userdata('menu_order_selected', 'payproof_select');
        $this->load->view('admincreate/layout/header');
        $this->load->view('admincreate/order/order_wait_approval');
        $this->load->view('admincreate/layout/footerdashboard');
    }

    // order_bill

    public function report()
    {
        $data['reports'] = $this->report_model->getOrderCompleteAll();
        $this->load->view('admincreate/layout/header');
        $this->load->view('admincreate/reports/report',$data);
        $this->load->view('admincreate/layout/footerdashboard');
    }

    public function recommend()
    {
        $data['ebooks'] = $this->ebook_model->getEbookAll();
        $this->load->view('admincreate/layout/header');
        $this->load->view('admincreate/recommend', $data);
        $this->load->view('admincreate/layout/footerdashboard');
    }

    public function recommend_submit()
    {
        for ($i = 1; $i < 6; $i++) {
            echo $this->input->post('ebook_'.$i);
            $data = array(
                'empID' => $this->session->userdata('admin_login')->empID,
                'ebookID' =>  $this->input->post('ebook_'.$i)
            );
            $this->ebook_model->updateEbookrecommend($i,$data);
        }
        redirect(base_url().'admin/create/recommend');

    }

    public function user()
    {
        $data['userall'] = $this->user_model->getUserAll();
        $this->load->view('admincreate/layout/header');
        $this->load->view('admincreate/user', $data);
        $this->load->view('admincreate/layout/footerdashboard');
    }

    public function insertSalesshare()
    {
        $ssharedata = array(
            'sshareID'     => $this->runnum_model->getSalesshare(),
            'ssharename'   => $this->input->post('ssharename'),
            'sshareper'    => $this->input->post('sshareper'),
            'ssharedetail' => $this->input->post('ssharedetail')
        );

        if ($this->salesshare_model->insert_salesshare($ssharedata)) {
            $this->runnum_model->updateSalesshare();
            $this->session->set_flashdata('ms_success', "บันทึกข้อมูลส่วนแบ่งยอดขาย \"" . $this->input->post('ssharename') . "\" สำเร็จแล้ว");
        } else {
            $this->session->set_flashdata('ms_error', "ไม่สามารถบันทึกข้อมูลได้");
        }
        redirect(base_url() . "admin/create/salesshare");
    }

    public function editSalesshare_submit()
    {
        $ssharedata = array(
            'sshareID'     => $this->input->post('sshareID'),
            'ssharename'   => $this->input->post('ssharename'),
            'sshareper'    => $this->input->post('sshareper'),
            'ssharedetail' => $this->input->post('ssharedetail')
        );
        if ($this->salesshare_model->update_salesshare($ssharedata)) {
            $this->session->set_flashdata('ms_success', "แก้ไขข้อมูลสำเร็จ");
        } else {
            $this->session->set_flashdata('ms_error', "ไม่สามารถแก้ไขข้อมูลได้");
        }
        redirect(base_url() . "admin/create/salesshare");
    }

    public function deleteSalesshare($scoreId)
    {
        if ($this->salesshare_model->delete_salesshare($scoreId)) {
            $this->session->set_flashdata('ms_success', "ลบข้อมูลสำเร็จ");
        } else {
            $this->session->set_flashdata('ms_error', "ไม่สามารถลบข้อมูลได้");
        }
        redirect(base_url() . "admin/create/salesshare");
    }

    public function insertScorediscount()
    {
        $scoredata = array(
            'scorename'    => $this->input->post('scorename'),
            'scorenum'     => $this->input->post('scorenum'),
            'scoreper'     => $this->input->post('scoreper'),
            'scoredetails' => $this->input->post('scoredetails')
        );
        if ($this->scorediscount_model->insert_ScoreDiscount($scoredata)) {
            $this->session->set_flashdata('ms_success', "บันทึกข้อมูลส่วนลด \"" . $this->input->post('scorename') . "\" สำเร็จแล้ว");
        } else {
            $this->session->set_flashdata('ms_error', "ไม่สามารถบันทึกข้อมูลได้");
        }
        redirect(base_url() . "admin/create/discount_member");
    }

    public function deleteScorediscount($scoreId)
    {
        if ($this->scorediscount_model->delete_ScoreDiscount($scoreId)) {
            $this->session->set_flashdata('ms_success', "ลบข้อมูลสำเร็จ");
        } else {
            $this->session->set_flashdata('ms_error', "ไม่สามารถลบข้อมูลได้");
        }
        redirect(base_url() . "admin/create/discount_member");
    }

    public function ebook_type()
    {
        $this->load->view('admincreate/layout/header');
        $this->load->view('admincreate/ebook_type');
        $this->load->view('admincreate/layout/footerdashboard');
    }

    public function ebook_type_insert()
    {
        $data = array(
            'ebooktypeID'        => $this->runnum_model->getRunEtype(),
            'ebooktypename'      => $this->input->post('ebooktypename'),
            'ebooktypedetails'   => $this->input->post('ebooktypedetail'),
            'ebooktype_isActive' => 'y'
        );
        if ($this->ebook_model->insertEbookType($data)) {
            $this->runnum_model->updateRunEtype();
            $this->session->set_flashdata("ms_etype_success", "บันทึกข้อมูลสำเร็จ");
        } else {
            $this->session->set_flashdata("ms_etype_error", "ไม่สามารถบันทึกข้อมูลได้");
        }
        redirect(base_url() . "admin/create/ebook_type");
    }

    public function ebook_type_update()
    {
        $data = array(
            'ebooktypeID'        => $this->input->post('ebooktypeID'),
            'ebooktypename'      => $this->input->post('ebooktypename'),
            'ebooktypedetails'   => $this->input->post('ebooktypedetail'),
            'ebooktype_isActive' => 'y'
        );
        if ($this->ebook_model->updateEbookType($data)) {
            $this->session->set_flashdata("ms_etype_success", "แก้ไขข้อมูลสำเร็จ");
        } else {
            $this->session->set_flashdata("ms_etype_error", "ไม่สามารถบันทึกข้อมูลได้");
        }
        redirect(base_url() . "admin/create/ebook_type");
    }

    public function deleteEbooktype()
    {
        if ($this->ebook_model->deleteEbookType($this->input->get('etypeid'))) {
            $this->session->set_flashdata("ms_etype_success", "ลบข้อมูลสำเร็จ");
        } else {
            $this->session->set_flashdata("ms_etype_error", "ไม่สามารถบันทึกข้อมูลได้");
        }
        redirect(base_url() . "admin/create/ebook_type");
    }

    public function discount_member()
    {
        $this->load->view('admincreate/layout/header');
        $this->load->view('admincreate/discount_member');
        $this->load->view('admincreate/layout/footerdashboard');
    }

    public function salesshare()
    {
        $this->load->view('admincreate/layout/header');
        $this->load->view('admincreate/salesshare');
        $this->load->view('admincreate/layout/footerdashboard');
    }

    public function grouppage_web()
    {
        $this->load->view('admincreate/layout/header');
        $this->load->view('admincreate/grouppage_web');
        $this->load->view('admincreate/layout/footerdashboard');
    }

    public function page_web()
    {
        $this->load->view('admincreate/layout/header');
        $this->load->view('admincreate/page_web');
        $this->load->view('admincreate/layout/footerdashboard');
    }

    public function type_user()
    {
        $this->load->view('admincreate/layout/header');
        $this->load->view('admincreate/type_user');
        $this->load->view('admincreate/layout/footerdashboard');
    }
}
