<?php

class User_model extends CI_Model
{

    public function checklogin($data)
    {
        $this->db->where('useremail', $data['email']);
        $this->db->where('userpass', $data['password']);
        return $this->db->get('tbuser')->row();
    }

    public function insertUser($data)
    {
        return $this->db->insert('tb_user' ,$data);
    }
    public function email_isHas($email)
    {
        $this->db->where('useremail', $email);
        return count($this->db->get('tbuser')->result()) > 0 ;
    }

    public function getReword($userID)
    {
        $this->db->where('userID', $userID);
        return $this->db->get('user_rewardpoints')->row_array();
    }

    public function getUserDetails($userId)
    {
        $this->db->where('userID', $userId);
        return $this->db->get('tbuser')->row();
    }

    public function moneyup_cradit($userId , $money)
    {
        $user = $this->db->where('userID', $userId)->get('tbuser')->row();
        if($user){
            $this->db->where('userId' ,$userId)->set('usercradit' , $user->usercradit + $money);
            $this->db->update('tbuser');
            return $this->db->affected_rows() > 1;
        }else {
            return false;
        }
    }

    public function getuserByebookID($ebookID)
    {
        //กำหนดเพิ่มได้ แต่ห้ามลบ
        $this->db->select('tbuser.userID , tbsalesshare.sshareper')
        ->where('tbebook.ebookID' , $ebookID)
        ->join('tbebook' , 'tbebook.userID = tbuser.userID')
        ->join('tbsalesshare' , 'tbsalesshare.sshareID = tbuser.sshareID');
        return $this->db->get('tbuser')->row();
    }
    public function getUserAll()
    {
        $this->db->join('tbusertype', 'tbusertype.usertypeID = tbuser.usertypeID');
        return $this->db->get('tbuser')->result();
    }
    public function updateTypeUser($password)
    {
        $this->db->where('userID', $this->session->userdata('user_login')->userID)
            ->where('userpass', $password);
        $this->db->set('userTypeID', 'UT02');
        $this->db->update('tbuser');
        return $this->db->affected_rows() > 0;
    }
}
