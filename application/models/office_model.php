<?php

class Office_model extends CI_Model
{
    public function getAccountOffice()
    {
        $this->db->where('acc_isActive' , 'y');
        return $this->db->get('office_account')->result();
    }
}
