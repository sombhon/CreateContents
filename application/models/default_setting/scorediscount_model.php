<?php

class Scorediscount_model extends CI_Model
{

    public function getScdiscountAll()
    {
        return $this->db->get('tbscorediscount')->result();
    }

    public function getScoreDiscountById($scorId)
    {
        $this->db->where('scoreID', $scorId);
        return $this->db->get('tbscorediscount')->row();
    }

    public function scoreDis_isHas($scorId)
    {
        $this->db->where('scoreID', $scorId);
        return count($this->db->get('tbscorediscount')->result()) > 0;
    }

    public function insert_ScoreDiscount($scorData)
    {
        return $this->db->insert('tbscorediscount', $scorData);
    }

    public function delete_ScoreDiscount($scoreId)
    {
        $this->db->where('scoreID', $scoreId);
        return $this->db->delete('tbscorediscount');
    }
}
