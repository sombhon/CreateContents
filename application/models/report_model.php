<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{
    public function getOrderCompleteAll()
    {
        $this->db->where('operationID' , 'completed');
        $this->db->order_by('orderdate DESC');
        return $this->db->get('tborder')->result();
    }    
    public function getSumWaitpay($value = 0)
    {
        $this->db->select_sum('ordernetprice');
        $this->db->where('operationID' , 'waitpay');
        return $this->db->get('tborder')->row();
    }    
    public function getSumwaitapproval($value = 0)
    {
        $this->db->select_sum('ordernetprice');
        $this->db->where('operationID' , 'waitapproval');
        return $this->db->get('tborder')->row();
    }
    public function getSumCompleted($value = 0)
    {
        $this->db->select_sum('ordernetprice');
        $this->db->where('operationID' , 'completed');
        return $this->db->get('tborder')->row();
    }
    public function getSumCancle_bill($value = 0)
    {
        $this->db->select_sum('ordernetprice');
        $this->db->where('operationID' , 'cancle_bill');
        return $this->db->get('tborder')->row();
    }
    public function getSumDiccountuser($value = 0)
    {
        $this->db->select_sum('orderdiscount');
        // $this->db->where('operationID' , 'completed');
        return $this->db->get('tborder')->row();
    }
    public function getSumDiccountoffice($value = 0)
    {
        $this->db->select_sum('ordernetprice');
        // $this->db->where('operationID' , 'completed');
        return $this->db->get('tborder')->row();
    }

    
    
}
