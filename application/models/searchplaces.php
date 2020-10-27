<?php
Class searchplaces Extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function search($keyword)
    {
        $this->db->like('P_name',$keyword);
        $this->db->like('P_province',$keyword);
        $query = $this->db->get('tb_place');
        return $query->result();
    }
}
 ?>
