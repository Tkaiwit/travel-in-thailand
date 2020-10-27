<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     //get the username & password from tbl_usrs
     function get_user($M_user, $M_password)
     {
          $sql = "select * from tb_member where M_user = '" . $M_user . "' and M_password = '" . md5($M_password) . "' and M_status = 'active'";
          $query = $this->db->query($sql);
          return $query->num_rows();
     }
}?>