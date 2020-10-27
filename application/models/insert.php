<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class insert extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    public function insertMember()
    {
        $data = array(
            "M_user"     => $this->input->post('m_user'),
            "M_email"    => $this->input->post('m_email'),
            "M_fullname" => $this->input->post('m_fullname'),
            "M_password" => md5($this->input->post('m_password')),
            "M_sex"      => $this->input->post('m_rd1'),
            "M_address"  => $this->input->post('m_address'),
            "M_age"      => $this->input->post('m_age'),
            "M_tel"      => $this->input->post('m_tel'),
        );
        $this->db->insert('tb_member', $data);
        redirect(base_url('first/one'));
    }
    public function insertStaff()
    {
        $data = array(
            "S_user"     => $this->input->post('m_user'),
            "S_email"    => $this->input->post('m_email'),
            "S_name"     => $this->input->post('m_name'),
            "S_password" => md5($this->input->post('m_password')),
            "S_sex"      => $this->input->post('m_rd1'),
            "S_address"  => $this->input->post('m_address'),
            "S_age"      => $this->input->post('m_age'),
            "S_status"   => $this->input->post('m_rd2'),
            "S_tel"      => $this->input->post('m_tel'),
        );
        $this->db->insert('tb_staff', $data);
        redirect(base_url('first/dtstaff'));
    }
    public function insertPlace()
    {
        $data = array(
            "P_name"      => $this->input->post('p_name'),
            "P_location"  => $this->input->post('p_location'),
            "P_province"  => $this->input->post('p_province'),
            "P_details"   => $this->input->post('p_details'),
            "P_latitude"  => $this->input->post('p_latitude'),
            "P_longitude" => $this->input->post('p_longitude'),
        );
        $this->db->insert('tb_place', $data);
        redirect(base_url('first/dtplace'));
    }

}
