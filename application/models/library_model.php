<?php 

class Library_model extends CI_Model {

    public function insertLibrary($data)
    {
        return $this->db->insert('user_library' ,$data);
    }
    public function getMyBookByemail($email)
    {
        $this->db->where('user_library.useremail' , $email);
        $this->db->join('tbebook' , 'tbebook.ebookID = user_library.ebookID');
        return $this->db->get('user_library')->result();
    }
}

?>