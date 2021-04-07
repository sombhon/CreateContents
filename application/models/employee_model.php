<?php 

class Employee_model extends CI_Model {

    public function checklogin($data)
    {
        $this->db->where('empemail', $data['email']);
        $this->db->where('emppass',$data['password']);
        return $this->db->get('tbemployee')->row();
    }
}

?>