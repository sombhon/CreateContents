<?php

class Ebook_model extends CI_Model
{
    public function getEbookById($ebookId)
    {
        $this->db->select('tbuser.usernamea , tbebook.*');
        $this->db->where('tbebook.ebookID', $ebookId);
        $this->db->join('tbuser', 'tbebook.userID = tbuser.userID');
        return $this->db->get('tbebook')->row();
    }

    public function getEbookAll()
    {
        $this->db->join('tbuser', 'tbuser.userID = tbebook.userID');
        return $this->db->get('tbebook')->result();
    }

    public function getEbookByType($TypeId, $limit = 50)
    {
        $this->db->where('tbebook.ebooktypeID', $TypeId);
        $this->db->join('tbebooktype', 'tbebooktype.ebooktypeID = tbebook.ebooktypeID');
        $this->db->order_by('tbebook.ebookdate DESC');
        $this->db->limit($limit);
        return $this->db->get('tbebook')->result();
    }

    public function getRecommend($limit = 0)
    {
        $this->db->join('ebook_recommend', 'ebook_recommend.ebookID = tbebook.ebookID');
        $this->db->order_by('tbebook.ebookdate DESC');
        $this->db->limit($limit);
        return $this->db->get('tbebook')->result();
    }

    public function getEbookCountAll()
    {
        return count($this->db->get('tbebook')->result());
    }

    public function getEbookType()
    {
        $this->db->where('ebooktype_isActive', 'y');
        return $this->db->get('tbebooktype')->result();
    }

    public function getETypeById($ETypeId)
    {
        $this->db->where('ebooktypeID', $ETypeId);
        $this->db->where('ebooktype_isActive', 'y');
        return $this->db->get('tbebooktype')->row();
    }

    public function getBestSeller($limit = 0)
    {
        $this->db->order_by('ebooknumsales DESC');
        $this->db->limit($limit);
        return $this->db->get('tbebook')->result();
    }

    public function getNewBooks($limit = 0)
    {
        $this->db->order_by('ebookdate DESC');
        $this->db->limit($limit);
        return $this->db->get('tbebook')->result();
    }

    public function insertEbookType($data)
    {
        return $this->db->insert('tbebooktype', $data);
    }

    public function updateEbookType($data)
    {
        $this->db->where('ebooktypeID', $data['ebooktypeID']);
        $this->db->set('ebooktypename', $data['ebooktypename'])
            ->set('ebooktypedetails', $data['ebooktypedetails']);
        return $this->db->update('tbebooktype');
    }

    public function deleteEbookType($ETypeId)
    {
        $this->db->where('ebooktypeID', $ETypeId);
        return $this->db->delete('tbebooktype');
    }

    public function updateEbookrecommend($id, $data)
    {
        $this->db->where('recomID', $id);
        $this->db->update('ebook_recommend', $data);
    }
}
