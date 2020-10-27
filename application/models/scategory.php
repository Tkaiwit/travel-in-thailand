<?php
class scategory extends CI_Model
{
    public function searcher($C_name)
    {
        $this->db->like('C_name', $C_name);
        $query = $this->db->get('tb_category');
        return $query->result();
    }
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
}
