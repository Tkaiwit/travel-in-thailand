<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class edit extends CI_Model {

   public function getuser()
   {
   	$this->load->database();
   	$data = $this->db->get('M_user');
   	return $data->result();
   }

   public function deletemember($id)
   {
   		$this->load->database();
   		$this->db->where('M_user',$id);
   		$this->db->delete();
   		return true;
   }

}