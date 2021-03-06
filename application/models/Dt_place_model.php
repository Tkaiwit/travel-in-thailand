<?php
/*
 * Generated by CRUDigniter v3.0 Beta
 * www.crudigniter.com
 */

class Dt_place_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get tb_place by P_id
     */
    function get_tb_place($P_id)
    {
        return $this->db->get_where('tb_place',array('P_id'=>$P_id))->row_array();
    }

    /*
     * Get all tb_place
     */
    function get_all_tb_place()
    {
        return $this->db->get('tb_place')->result_array();
    }

    /*
     * function to add new tb_place
     */
    function add_tb_place($params)
    {
        $this->db->insert('tb_place',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update tb_place
     */
    function update_tb_place($P_id,$params)
    {
        $this->db->where('P_id',$P_id);
        $response = $this->db->update('tb_place',$params);
        if($response)
        {
            return "tb_place updated successfully";
        }
        else
        {
            return "Error occuring while updating tb_place";
        }
    }

    /*
     * function to delete tb_place
     */
    function delete_tb_place($P_id)
    {
        $response = $this->db->delete('tb_place',array('P_id'=>$P_id));
        if($response)
        {
            return "tb_place deleted successfully";
        }
        else
        {
            return "Error occuring while deleting tb_place";
        }
    }
}
