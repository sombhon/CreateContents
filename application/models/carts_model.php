<?php

class Carts_model extends CI_Model
{

    public function getCartdCount($userID)
    {
        $data = $this->db->where('userID', $userID)->get('tbcart')->row();
        if (!empty($data)) {
            return count($this->db->where('cartID', $data->cartID)->get('tbcartdetails')->result());
        } else {
            return 0;
        }
    }
  
    public function getCartByUserId($userID)
    {
        $this->db->where('userID', $userID);
        return $this->db->get('tbcart')->row();
    }

    public function insertCart_h($data)
    {
        return $this->db->insert('tbcart', $data);
    }

    public function getCartdetails($userID)
    {
        $cartId = $this->db->where('userID', $userID)->get('tbcart')->row();
        if (!empty($cartId)) {
            $cartID = $cartId->cartID;
            return $this->db->where('cartID', $cartID)
                ->get('tbcartdetails')
                ->result();

        } else {
            return false;
        }

    }

    public function deleteCartddetail($userID , $ebookID)
    {
        $cartID = $this->db->where('userID',$userID)->get('tbcart')->row()->cartID;
        return $this->db->where('cartID' , $cartID)->where('ebookID' , $ebookID)->delete('tbcartdetails');
    }
    public function insertCartDetail($data)
    {
        return $this->db->insert('tbcartdetails', $data);

    }
    public function deleteCartdById($cartdId)
    {
        $this->db->where('cartdID' , $cartdId)->delete('tbcartdetails');
    }

    // order table
    public function getOrderwaitpayCount($userID)
    {
        $data = $this->db->where('userID', $userID)
        ->where('operationID', 'waitpay')
        ->get('tborder')->result();
        if (!empty($data)) {
            return count($data);
        } else {
            return 0;
        }
    }
    public function insertOrder($data)
    {
        return $this->db->insert('tborder', $data);
    }
    public function getOrderById($orderId)
    {
        $this->db->where('orderID' ,$orderId);
        return $this->db->get('tborder')->row();
    }
    public function getOrderJdetailsById($orderId)
    {
        $this->db->where('tborder.orderID' ,$orderId);
        $this->db->join('tborderdetails' , 'tborderdetails.orderID = tborder.orderID');
        return $this->db->get('tborder')->result();
    }
    public function getOrderWaitpay($userID)
    {
        $this->db->where('userID' ,$userID)->where('operationID' , 'waitpay');
        $this->db->order_by('orderdate DESC');
        return $this->db->get('tborder')->result();
    }
    public function getOrderApprovalAll()
    {
        $this->db->where('operationID' , 'waitapproval');
        $this->db->order_by('orderdate DESC');
        return $this->db->get('tborder')->result();
    }
    public function getOrderApproval($userID)
    {
        $this->db->where('userID' ,$userID)
        ->where('operationID' , 'waitapproval');
        $this->db->order_by('orderdate DESC');
        return $this->db->get('tborder')->result();
    }
    public function getOrderComplete($userID)
    {
        $this->db->where('userID' ,$userID)->where('operationID' , 'completed');
        $this->db->order_by('orderdate DESC');
        return $this->db->get('tborder')->result();
    }
    public function getOrderCompleteAll()
    {
        $this->db->where('operationID' , 'completed');
        $this->db->order_by('orderdate DESC');
        return $this->db->get('tborder')->result();
    }
    public function getOrderCalcleBill($userID)
    {
        $this->db->where('userID' ,$userID)->where('operationID' , 'cancle_bill');
        $this->db->order_by('orderdate DESC');
        return $this->db->get('tborder')->result();
    }

    public function updateOrderssto_waitapp($orderID)
    {
        $this->db->where('orderID' ,$orderID)
        ->set('operationID' , 'waitapproval');
        $this->db->update('tborder');
        return $this->db->affected_rows() > 0;
    }
    public function updateOrderssto_completed($orderID)
    {
        $this->db->where('orderID' ,$orderID)
        ->set('operationID' , 'completed');
        $this->db->update('tborder');
        return $this->db->affected_rows() > 0;
    }
    // order proofpayment
    
    public function insertProofPayment($data)
    {
        return $this->db->insert('order_proofpayment' , $data);
    }
    
    public function getProofpayByorderID($OrderID)
    {
        $this->db->where('orderID' ,$OrderID);
        return $this->db->get('order_proofpayment')->result();
    }

    // pay income 
    public function insertPaymentIncome($data)
    {
        return $this->db->insert('user_income_payment' , $data);
    }
}
