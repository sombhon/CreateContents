<?php

class Salesshare_model extends CI_Model
{

    public function getSalesshareAll()
    {
        return $this->db->get('tbsalesshare')->result();
    }

    public function getsalesshareById($saleId)
    {
        $this->db->where('sshareID', $saleId);
        return $this->db->get('tbsalesshare')->row();
    }

    public function insert_salesshare($saleData)
    {
        return $this->db->insert('tbsalesshare', $saleData);
    }

    public function update_salesshare($saleData)
    {
        $this->db->where('sshareID' , $saleData['sshareID']);
        $this->db->set('ssharename' , $saleData['ssharename'])
        ->set('sshareper' , $saleData['sshareper'])
        ->set('ssharedetail' , $saleData['ssharedetail']);

        return $this->db->update('tbsalesshare');
    }

    public function delete_salesshare($saleId)
    {
        $this->db->where('sshareID', $saleId);
        return $this->db->delete('tbsalesshare');
    }
}
