<?php
class Splace extends CI_Model
{
    public function searcher($P_name)
    {
        $this->db->like('P_name', $P_name);
        $query = $this->db->get('tb_place');
        return $query->result();
    }
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
}
