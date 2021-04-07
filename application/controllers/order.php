<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('user_login'))) {
            $this->session->set_flashdata('login_error', 'กรุณาเข้าสู่ระบบก่อนเข้าทำรายการ');
            redirect(base_url());
        }
    }

    public function addcart($ebookId)
    {
        if (!empty($this->session->userdata('user_login'))) {
            $ebook  = $this->ebook_model->getEbookById($ebookId);
            $userId = $this->session->userdata('user_login')->userID;
            $cart   = $this->carts_model->getCartByUserId($userId);
            var_dump($cart);
            if (!empty($cart)) {
                $data = array(
                    'cartID'     => $cart->cartID,
                    'ebookID'    => $ebook->ebookID,
                    'ebookprice' => $ebook->ebooknetprice
                );
                if ($this->carts_model->insertCartDetail($data)) {
                    $this->session->set_flashdata('ms_success_right', "เพิ่มสินค้าลงในตะกร้าแล้ว");
                } else {
                    $this->session->set_flashdata('login_error', "ไม่สามารถเพิ่มสิน้คาลงในตะกร้าได้");
                }
            } else {
                $cartID = $this->utility->gencode(10);
                $cart_h = array(
                    'cartID' => $cartID,
                    'userID' => $userId
                );

                $this->carts_model->insertCart_h($cart_h);

                $data = array(
                    'cartID'     => $cartID,
                    'ebookID'    => $ebook->ebookID,
                    'ebookprice' => $ebook->ebooknetprice
                );
                if ($this->carts_model->insertCartDetail($data)) {
                    $this->session->set_flashdata('ms_success_right', "เพิ่มสินค้าลงในตะกร้าแล้ว");
                } else {
                    $this->session->set_flashdata('login_error', "ไม่สามารถเพิ่มสิน้คาลงในตะกร้าได้");
                }
            }
        } else {
            $this->session->set_flashdata('login_error', "กรุณาเข้าสู่ระบบก่อนทำการเลือกซื้อสินค้า");
        }
        redirect(base_url());

    }

    public function order_complete()
    {
        $data['orderComplete'] = $this->carts_model->getOrderComplete($this->session->userdata('user_login')->userID);
        $this->session->set_userdata('menu_order_selected', 'order_complete_select');
        $this->load->view('layout/header');
        $this->load->view('order/order_complete_view', $data);
        $this->load->view('layout/footer');
    }

    public function wait_for_approval()
    {
        $data['approval'] = $this->carts_model->getOrderApproval($this->session->userdata('user_login')->userID);
        $this->session->set_userdata('menu_order_selected', 'approval_select');
        $this->load->view('layout/header');
        $this->load->view('order/approval_wait_view', $data);
        $this->load->view('layout/footer');
    }

    public function payorder()
    {
        $data['accOffice'] = $this->office_model->getAccountOffice();
        $data['payorder']  = $this->carts_model->getOrderWaitpay($this->session->userdata('user_login')->userID);
        $this->session->set_userdata('menu_order_selected', 'payorder_select');
        $this->load->view('layout/header');
        $this->load->view('order/payorder_view', $data);
        $this->load->view('layout/footer');
    }

    public function payorder_submit()
    {
        $post = $this->input->post();
        echo "<pre>";
        var_dump($this->input->post());
        echo "</pre>";

        $image = '';
        $config['upload_path']   = './assets/uploads/images/bill_transform';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->upload->do_upload('fileimage')) {
         $img = $this->upload->data();
         $image = $img['file_name'];
        }else {
            $this->session->set_flashdata('ms_error','ไม่สามารถอัพโหลดภาพได้ ผิดพลาด :'. $this->upload->display_errors() );
            redirect(base_url()."order/payorder");
        }

        $payproof = array(
            'orderID' => $post['billorder'],
            'proofpmdate' => date('Y-m-d H:i:s',strtotime($post['datetime'])),
            'proofpmimg' => $image,
            'proofpmdetails' => $post['comment'],
            'userID' => $this->session->userdata('user_login')->userID,
            'proofpmPrice' => $post['payprice'],
            'proofpm_dateCreate' => date('Y-m-d H:i:s'),
        );
        if($this->carts_model->insertProofPayment($payproof)){
            $this->carts_model->updateOrderssto_waitapp($payproof['orderID']);
            $this->session->set_flashdata('ms_success','บันทึกการชำระเงินแล้ว กรุณารอการยืนยันจากผู้ดูแล');
        }
        redirect(base_url()."order/payorder");
    }

    public function carts()
    {
        $this->session->set_userdata('menu_order_selected', 'carts_select');
        $data['cartdetails']  = $this->carts_model->getCartdetails($this->session->userdata('user_login')->userID);
        $data['scordiscount'] = $this->scorediscount_model->getScdiscountAll();
        if(!$data['cartdetails']){
            $this->session->set_flashdata('ms_all_info' , "กรุณาทำการเลือกสินค้า่อนทำการซื้อ");
            redirect(base_url());
        }
        $this->load->view('layout/header');
        $this->load->view('order/cartselected', $data);
        $this->load->view('layout/footer');
    }

    public function deleteCartselected($cartdId)
    {
        $this->carts_model->deleteCartdById($cartdId);
        redirect(base_url() . "order/carts");
    }

    public function carts_submit()
    {
        $post          = $this->input->post();
        $bill_ID       = $this->utility->gencode(20);
        $pricefull     = 0;
        $priceDiscount = 0;
        $pricepay      = 0;
        if (!isset($post['ebookId'])) {
            $this->session->set_flashdata('login_error', 'กรุณาเลือกหนังสือที่ต้องการก่อนทำการเลือกซื้อ');
            redirect(base_url());

        }
        if (isset($post['email'])) {
            if (!$this->user_model->email_isHas($post['email'])) {
                $this->session->set_flashdata('login_error', 'email ผู้รับไม่ถูกต้อง');
                redirect(base_url() . "order/carts");
            } else {
                $bill['useremail'] = $post['email'];
            }
        } else {
            $bill['useremail'] = $this->session->userdata('user_login')->useremail;
        }

        foreach ($this->input->post('ebookId') as $ebookId) {
            $ebook       = $this->ebook_model->getEbookById($ebookId);
            $bill_detail = array(
                'orderID'             => $bill_ID,
                'ebookID'             => $ebook->ebookID,
                'orderdFullprice'     => $ebook->ebookprice,
                'orderdDiscountprice' => $ebook->ebookpricediscount,
                'orderdNetprice'      => $ebook->ebooknetprice
            );
            $pricefull += $ebook->ebookprice;
            $priceDiscount += $ebook->ebookpricediscount;
            $pricepay += $ebook->ebooknetprice;
            $this->db->insert('tborderdetails', $bill_detail);

            $this->carts_model->deleteCartddetail($this->session->userdata('user_login')->userID, $bill_detail['ebookID']);
        }

        $bill['orderID']              = $bill_ID;
        $bill['orderdate']            = date('Y-m-d H:i:s', time());
        $bill['userID']               = $this->session->userdata('user_login')->userID;
        $bill['ordertotalprice']      = $pricefull;
        $bill['orderdiscount']        = $priceDiscount;
        $bill['ordernetprice']        = $pricepay;
        $bill['operationID'] = 'waitpay';

        if (isset($post['discount'])) {
            $discountId = $this->utility->decode($post['discount']);
            if (!$this->scorediscount_model->scoreDis_isHas($discountId)) {
                $this->session->set_flashdata('login_error', 'ไม่พบส่วนลดที่เลือก');
                redirect(base_url() . "order/carts");
            }
            $discount                    = $this->scorediscount_model->getScoreDiscountById($discountId);
            $bill['ordernetprice']       = $pricepay - $this->utility->calcDiscountPer($pricefull , $discount->scoreper);
            $bill['orderdiscountoffice'] = $this->utility->calcDiscountPer($pricefull , $discount->scoreper);
        }
        if($this->carts_model->insertOrder($bill)){
            $this->session->set_flashdata('ms_success', 'ทำการสั่งซื้อเสร็จสิ้น รอการชำระ !! ');
        }

        redirect(base_url()."order/payorder");
    }
}
