<?php
class smember extends CI_Model
{
    public function searcher($M_user)
    {
        $this->db->like('$M_user', $M_user);
        $query = $this->db->get('tb_member');
        return $query->result();
    }
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
}
