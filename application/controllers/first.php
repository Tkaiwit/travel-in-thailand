<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class First extends CI_Controller {

    public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->model('Dt_board_model');
          $this->load->model('Dt_place_model');
          $this->load->model('File');
          $this->load->model('Dt_rv_model');
          $this->load->model('relate');
          $this->load->model('splace');
          $this->load->model('smember');
          $this->load->model('scategory');
          $this->load->model('supplace');
          $this->load->model('dplace');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->database();
          $this->load->library('grocery_CRUD');
          $this->load->library('image_CRUD');
          $this->g_crud   = new grocery_CRUD();
          $this->g_i_crud = new image_CRUD();
          $this->load->library('form_validation');
          $this->load->model('login_model');
          $this->load->model('Edit_place_model');
          $this->load->model('Edit_category_model');
          $this->load->model('Edit_member_model');
          $this->load->model('Edit_promember_model');
          $this->load->model('Edit_passmember_model');
          $this->load->model('searchplaces');
     }
     public function checkpassword(){
        $password = md5($this->input->post('txt_password'));
        $query = $this->db->query("SELECT * FROM tb_member WHERE M_password='$password'");
        if($query->num_rows() > 0){
            $row = $query->row();
        }else{
          $this->session->set_flashdata('msg', '<label for="M_status">รหัสผ่านไม่ถูกต้อง</label>');
        }
        redirect('first/editprofilemember');
     }
     public function checklogin() {
        $username = $this->input->post('txt_username');
        $password = md5($this->input->post('txt_password'));
        $query = $this->db->query("SELECT * FROM tb_member WHERE M_user='$username' AND M_password='$password'");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $userid = $row->M_fullname;
            $user = $row->M_user;
            $M_status = $row->M_status;
            $this->session->set_userdata('txt_username', $username);
            $this->session->set_userdata('M_fullname', $userid);
            $this->session->set_userdata('M_user', $user);
            $this->session->set_userdata('M_status', $M_status);
            if($M_status ==1){
              $this->load->view('layout/header');
              $this->load->view('member');
              $this->load->view('layout/footer');
            }elseif ($M_status ==2) {
              $this->load->view('layout/header');
              $this->load->view('staff');
              $this->load->view('layout/footer');
            }elseif ($M_status ==3){
              $this->load->view('layout/header');
              $this->load->view('admin');
              $this->load->view('layout/footer');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" style="font-size:14px">Invalid username and password!</div>');
            // $this->load->view('login_view');
            redirect('');
        }
    }

    public function logout(){
      $this->session->sess_destroy();
      redirect(base_url());
    }

    public function index() {
        $this->load->view('login_view');
    }

    public function regsiter() {
        $this->load->view('regsiter');
    }

    public function general($kw=""){
      $data['P_name'] = $this->input->post('P_name');
        $this->load->view('layout/header');
        $this->load->view('general',$data);
        $this->load->view('layout/footer');
    }public function reviews(){
        $this->load->view('layout/header');
        $this->load->view('reviews');
        $this->load->view('layout/footer');
    }
    public function place($id){
        $data['id'] = $id;
        $this->load->view('layout/header');
        $this->load->view('place',$data);
        $this->load->view('layout/footer');
    }
    public function placemember($id){
        $data['id'] = $id;
        $this->load->view('layout/header');
        $this->load->view('placemember',$data);
        $this->load->view('layout/footer');
    }

    function vtopic($B_id)
    {
        $data['B_id'] = $B_id;
        $data['tb_board'] = $this->Dt_board_model->get_tb_board($B_id);
        $this->load->view('layout/header');
        $this->load->view('view_topic',$data);
        $this->load->view('layout/footer');
    }
    public function insertcomment(){
        $id = $this->input->post('B_id');

        $data = array(
            "BC_topic" => $this->input->post('BC_topic'),
            "BC_detail" => $this->input->post('BC_detail'),
            "M_fullname" => $this->input->post('M_fullname'),
            "B_id" => $this->input->post('B_id'),
            );
        $this->db->insert('tb_board_comment',$data);

        $sql = "UPDATE tb_board SET B_reply=B_reply+1 WHERE B_id=$id";
      //  $sql = "UPDATE tb_board SET B_reply=B_reply+1 WHERE B_id=$this->input->post('B_id')";
        $this->db->query($sql);

        redirect(base_url('first/vtopic/'.$id));
    }
    public function webboard() {
        $this->load->view('layout/header');
        $this->load->view('webboard');
        $this->load->view('layout/footer');
    }
    public function new_topic() {
        $this->load->view('layout/header');
        $this->load->view('new_topic');
        $this->load->view('layout/footer');
    }
    public function inserttopic(){
        $data = array(
            "B_topic" => $this->input->post('topic'),
            "B_detail" => $this->input->post('detail'),
            "M_fullname" => $this->input->post('M_fullname')
            );
        $this->db->insert('tb_board',$data);
        redirect(base_url('first/webboard'));
    }
    ////////////////////////////////////////////////////////////////
    ///////////////////เพิ่มลบแก้ไขสถานที่///////////////////////////////
    ///////////////////////////////////////////////////////////////
    public function addplace(){



        $this->load->library('googlemaps');
        $config['center'] = '15.241728, 104.845566';
        $config['zoom'] = 'auto';
        $this->googlemaps->initialize($config);

        // $marker = array();
        // $marker['position'] = '';
        // $this->googlemaps->add_marker($marker);
        //
        // $marker = array();
        // $marker['position'] = '';
        // $this->googlemaps->add_marker($marker);

        $data['map'] = $this->googlemaps->create_map();
        $this->load->view('layout/header');
        $this->load->view('addplace',$data);
        $this->load->view('layout/footer');
    }
    public function insertPlace(){
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'jpg|png|mpg|gif|docx|doc|zip|pdf|mp3|wmv|flv|avi|mp4';
        $config['max_size']      = '0';
        $config['max_width']     = '0';
        $config['max_height']    = '0';
        $config['overwrite']     = true;
        $config['remove_spaces'] = true;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('p_img')) {
            echo $this->upload->display_errors("เลือกสิโว้ย");
        } else {
      $data = array(
        "P_name" => $this->input->post('p_name'),
        "P_img"   => $_FILES['p_img']['name'],
        "P_location" => $this->input->post('p_location'),
        "P_province" => $this->input->post('p_province'),
        "P_details" => $this->input->post('p_details'),
        "P_latitude" => $this->input->post('p_latitude'),
        "P_zoom" => $this->input->post('p_zoom'),
        "C_id" => $this->input->post('C_id'),
        "P_longitude" => $this->input->post('p_longitude')
      );
      $this->db->insert('tb_place',$data);
        redirect(base_url('first/searchplace'));
    }
  }
    public function searchplace($kw = ""){
      $data['P_name'] = $this->input->post('P_name');
        $this->load->view('layout/header');
        $this->load->view('searchplace', $data);
        $this->load->view('layout/footer');
    }
    public function dtplace($P_id){
        $query = $this->db->query("SELECT * FROM tb_place WHERE P_id='$P_id'");
        foreach ($query->result() as $row){
         $id=$row->P_id;
        //$sql = $this->db->query(SELECT * FROM tb_place);
        $this->load->library('googlemaps');
        $config['center'] = "$row->P_latitude,$row->P_longitude";
        $config['zoom'] = "$row->P_zoom";
        $this->googlemaps->initialize($config);
        $marker = array();
        $marker['position'] = "$row->P_latitude,$row->P_longitude";
        // echo "$row->P_latitude"."**ไง**";
        // echo "$row->P_longitude"."**จบ**";
        // echo "$row->P_zoom";
        }
        $this->googlemaps->add_marker($marker);
        $data['map'] = $this->googlemaps->create_map();
        $data['$P_id'] = $P_id;
        $data['tb_place'] = $this->Dt_place_model->get_tb_place($P_id);
        $this->load->view('layout/header');
        $this->load->view('dtplace',$data);
        $this->load->view('layout/footer');
    }
    public function updateplace($kw = ""){
      $data['P_name'] = $this->input->post('P_name');
      // print_r($data);
      // exit;
        $this->load->view('layout/header');
        $this->load->view('updateplace',$data);
        $this->load->view('layout/footer');
    }
    function edit_place($P_id)
    {

        // check if the tb_place exists before trying to edit it
        $data['tb_place'] = $this->Edit_place_model->get_tb_place($P_id);

        if(isset($data['tb_place']['P_id']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('P_name','P Name','required|max_length[50]');
            $this->form_validation->set_rules('P_location','P Location','required|max_length[120]');
            $this->form_validation->set_rules('P_province','P Province','required');
            $this->form_validation->set_rules('P_details','P Details','required');
            $this->form_validation->set_rules('P_latitude','P Latitude','required|max_length[60]');
            $this->form_validation->set_rules('P_longitude','P Longitude','required|max_length[60]');
            $this->form_validation->set_rules('P_zoom','P zoom','required|max_length[60]');
            $this->form_validation->set_rules('C_id','C Id','required|max_length[5]');

            if($this->form_validation->run())
            {
              $config['upload_path']   = './uploads/';
              $config['allowed_types'] = 'jpg|png|mpg|gif|docx|doc|zip|pdf|mp3|wmv|flv|avi|mp4';
              $config['max_size']      = '0';
              $config['max_width']     = '0';
              $config['max_height']    = '0';
              $config['overwrite']     = true;
              $config['remove_spaces'] = true;

              $this->load->library('upload', $config);
              if (!$this->upload->do_upload('p_img')) {
                  echo $this->upload->display_errors("เลือกสิโว้ย++++++++");
              } else {
                $params = array(
                    'P_name' => $this->input->post('P_name'),
                    "P_img"   => $_FILES['p_img']['name'],
                    'P_location' => $this->input->post('P_location'),
                    'P_province' => $this->input->post('P_province'),
                    'P_details' => $this->input->post('P_details'),
                    'P_latitude' => $this->input->post('P_latitude'),
                    'P_longitude' => $this->input->post('P_longitude'),
                    'P_zoom' => $this->input->post('P_zoom'),
                    'C_id' => $this->input->post('C_id'),
                );

                $this->Edit_place_model->update_tb_place($P_id,$params);
                redirect('first/updateplace');
            }
          }
            else
            {
                $this->load->view('layout/header');
                $this->load->view('editplace',$data);
                $this->load->view('layout/footer');
            }
        }
        else
            show_error('The tb_place you are trying to edit does not exist.');
    }
    public function deleteplace($id){
      $this->db->delete('tb_place',array('P_id'=>$id));
      redirect(base_url('first/dropplace'));
    }
    public function dropplace($kw=""){
      $data['P_name'] = $this->input->post('P_name');
        $this->load->view('layout/header');
        $this->load->view('deleteplace',$data);
        $this->load->view('layout/footer');
    }
    ////////////////////////////////////////////////////////////////
    ///////////////////จบการเพิ่มลบแก้ไขสถานที่////////////////////////////
    ///////////////////////////////////////////////////////////////

    ///////////////////////////////////////////////////////////////
    //////////////////เพิ่มลบแก้ไขประเภท////////////////////////////////
    //////////////////////////////////////////////////////////////
    public function addcategory(){
      $this->load->view('layout/header');
      $this->load->view('addcategory');
      $this->load->view('layout/footer');
    }
    public function insertCategory(){
        $data = array(
            "C_id" => $this->input->post('c_id'),
            "C_name" => $this->input->post('c_name')
            );
        $this->db->insert('tb_category',$data);
        redirect(base_url('first/searchcategory'));
    }
    public function searchcategory($kw=""){
      $data['C_name'] = $this->input->post('C_name');
      $this->load->view('layout/header');
      $this->load->view('searchcategory',$data);
      $this->load->view('layout/footer');
    }
    public function updatecategory($kw=""){
      $data['C_name'] = $this->input->post('C_name');
      $this->load->view('layout/header');
      $this->load->view('updatecategory',$data);
      $this->load->view('layout/footer');
    }
     function edit_category($C_id)
    {
        // check if the tb_category exists before trying to edit it
        $data['tb_category'] = $this->Edit_category_model->get_tb_category($C_id);

        if(isset($data['tb_category']['C_id']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
                    'C_name' => $this->input->post('C_name'),
                );

                $this->Edit_category_model->update_tb_category($C_id,$params);
                redirect('first/updatecategory');
            }
            else
            {
                $this->load->view('layout/header');
                $this->load->view('editcategory',$data);
                $this->load->view('layout/footer');
            }
        }
        else
            show_error('The tb_category you are trying to edit does not exist.');
    }
    public function deletecategory($id){
      $this->db->delete('tb_category',array('C_id'=>$id));
      redirect(base_url('first/dropcategory'));
    }
    public function dropcategory($kw=""){
      $data['C_name'] = $this->input->post('C_name');
        $this->load->view('layout/header');
        $this->load->view('deletecategory',$data);
        $this->load->view('layout/footer');
    }
    //////////////////////////////////////////////////////////////
    ///////////////////จบการเพิ่มลบแก้ไขประเภท///////////////////////////
    /////////////////////////////////////////////////////////////

    /////////////////////////////////////////////////////////////
    ///////////////////เพิ่มลบแก้ไขข้อมูลสมาชิก////////////////////////
    ////////////////////////////////////////////////////////////
    public function member(){
        $this->load->view('layout/header');
        $this->load->view('member');
        $this->load->view('layout/footer');
    }
    public function profilemember(){
        $this->load->view('layout/header');
        $this->load->view('profilemember');
        $this->load->view('layout/footer');
    }
    public function addmembers(){
        $this->load->view('layout/header');
        $this->load->view('addmembers');
        $this->load->view('layout/footer');
    }
    public function searchmembers($kw=""){
      $data['M_user'] = $this->input->post('M_user');
        $this->load->view('layout/header');
        $this->load->view('searchmembers',$data);
        $this->load->view('layout/footer');
    }
    public function updatemembers($kw=""){
      $data['M_user'] = $this->input->post('M_user');
        $this->load->view('layout/header');
        $this->load->view('updatemembers',$data);
        $this->load->view('layout/footer');
    }
    function editprofilemember($M_user)
    {
        // check if the tb_member exists before trying to edit it
        $data['tb_member'] = $this->Edit_member_model->get_tb_member($M_user);

        if(isset($data['tb_member']['M_user']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
                    'M_fullname' => $this->input->post('M_fullname'),
                    'M_email' => $this->input->post('M_email'),
                    'M_address' => $this->input->post('M_address'),
                    'M_tel' => $this->input->post('M_tel'),
                    'M_status' => $this->input->post('M_status')
                );

                $this->Edit_member_model->update_tb_member($M_user,$params);
                redirect('first/member');
            }
            else
            {
                $this->load->view('layout/header');
                $this->load->view('profilemember',$data);
                $this->load->view('layout/footer');
            }
        }
        else
            show_error('The tb_member you are trying to edit does not exist.');
    }
    function edit_members($M_user)
    {
        // check if the tb_member exists before trying to edit it
        $data['tb_member'] = $this->Edit_member_model->get_tb_member($M_user);

        if(isset($data['tb_member']['M_user']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
                    'M_password' => $this->input->post('M_password'),
                    'M_fullname' => $this->input->post('M_fullname'),
                    'M_email' => $this->input->post('M_email'),
                    'M_address' => $this->input->post('M_address'),
                    'M_tel' => $this->input->post('M_tel'),
                    'M_status' => $this->input->post('M_status')
                );

                $this->Edit_member_model->update_tb_member($M_user,$params);
                redirect('first/updatemembers');
            }
            else
            {
                $this->load->view('layout/header');
                $this->load->view('editmembers',$data);
                $this->load->view('layout/footer');
            }
        }
        else
            show_error('The tb_member you are trying to edit does not exist.');
    }
    public function deletemembers($id){
      $this->db->delete('tb_member',array('M_id'=>$id));
      redirect(base_url('first/deletemembers'));
    }
    public function dropmembers($kw=""){
      $data['M_user'] = $this->input->post('M_user');
        $this->load->view('layout/header');
        $this->load->view('deletemembers',$data);
        $this->load->view('layout/footer');
    }
    /////////////////////////////////////////////////////////////
    ////////////////////จบการเพิ่มลบแก้ไขข้อมูลสมาชิก////////////////////
    ////////////////////////////////////////////////////////////

    /////////////////////////////////////////////////////////////
    ///////////////////เพิ่มพนักงานลบแก้ไขข้อมูลสมาชิก////////////////////////
    ////////////////////////////////////////////////////////////
    function edit_pass($M_user)
    {
        // check if the tb_member exists before trying to edit it


        $data['tb_member'] = $this->Edit_passmember_model->get_tb_member($M_user);

        if(isset($data['tb_member']['M_user']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
                    'M_password' => md5($this->input->post('M_password'))
                );

                $this->Edit_passmember_model->update_tb_member($M_user,$params);
                redirect('first/member');
            }
            else
            {
                $this->load->view('layout/header');
                $this->load->view('member',$data);
                $this->load->view('layout/footer');
            }
        }
        else
            show_error('The tb_member you are trying to edit does not exist.');
    }
    function edit_pro($M_user)
    {
        // check if the tb_member exists before trying to edit it
        $data['tb_member'] = $this->Edit_promember_model->get_tb_member($M_user);

        if(isset($data['tb_member']['M_user']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
                    'M_fullname' => $this->input->post('M_fullname'),
                    'M_email' => $this->input->post('M_email'),
                    'M_address' => $this->input->post('M_address'),
                    'M_tel' => $this->input->post('M_tel'),
                    'M_status' => $this->input->post('M_status')
                );

                $this->Edit_promember_model->update_tb_member($M_user,$params);
                redirect('first/member');
            }
            else
            {
                $this->load->view('layout/header');
                $this->load->view('first/member',$data);
                $this->load->view('layout/footer');
            }
        }
        else
            show_error('The tb_member you are trying to edit does not exist.');
    }
    public function addmember(){
        $this->load->view('layout/header');
        $this->load->view('addmember');
        $this->load->view('layout/footer');
    }
    public function searchmember($kw=""){
      $data['M_user'] = $this->input->post('M_user');
        $this->load->view('layout/header');
        $this->load->view('searchmember',$data);
        $this->load->view('layout/footer');
    }
    public function updatemember($kw=""){
      $data['M_user'] = $this->input->post('M_user');
        $this->load->view('layout/header');
        $this->load->view('updatemember',$data);
        $this->load->view('layout/footer');
    }
    function edit_member($M_user)
    {
        // check if the tb_member exists before trying to edit it
        $data['tb_member'] = $this->Edit_member_model->get_tb_member($M_user);

        if(isset($data['tb_member']['M_user']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
                    'M_password' => $this->input->post('M_password'),
                    'M_fullname' => $this->input->post('M_fullname'),
                    'M_email' => $this->input->post('M_email'),
                    'M_address' => $this->input->post('M_address'),
                    'M_tel' => $this->input->post('M_tel'),
                    'M_status' => $this->input->post('M_status')
                );

                $this->Edit_member_model->update_tb_member($M_user,$params);
                redirect('first/updatemember');
            }
            else
            {
                $this->load->view('layout/header');
                $this->load->view('member',$data);
                $this->load->view('layout/footer');
            }
        }
        else
            show_error('The tb_member you are trying to edit does not exist.');
    }
    public function deletemember($id){
      $this->db->delete('tb_member',array('M_id'=>$id));
      redirect(base_url('first/deletemember'));
    }
    public function dropmember($kw=""){
      $data['M_user'] = $this->input->post('M_user');
        $this->load->view('layout/header');
        $this->load->view('deletemember',$data);
        $this->load->view('layout/footer');
    }
    /////////////////////////////////////////////////////////////
    ////////////////////จบการเพิ่มพนักงานลบแก้ไขข้อมูลสมาชิก////////////////////
    ////////////////////////////////////////////////////////////
    public function addregsiter(){
      $data = array(
        "M_user" => $this->input->post('m_user'),
        "M_email" => $this->input->post('m_email'),
        "M_fullname" => $this->input->post('m_fullname'),
        "M_password" => md5($this->input->post('m_password')),
        "M_address" => $this->input->post('m_address'),
        "M_status" => $this->input->post('m_status'),
        "M_tel" =>$this->input->post('m_tel')
      );
      $this->db->insert('tb_member',$data);
        redirect(base_url(''));
    }





    public function insertMember(){
      $data = array(
        "M_user" => $this->input->post('m_user'),
        "M_email" => $this->input->post('m_email'),
        "M_fullname" => $this->input->post('m_fullname'),
        "M_password" => md5($this->input->post('m_password')),
        "M_address" => $this->input->post('m_address'),
        "M_status" => $this->input->post('m_status'),
        "M_tel" =>$this->input->post('m_tel')
      );
      $this->db->insert('tb_member',$data);
        redirect(base_url('first/searchmember'));
    }
    public function insertStaff(){
      $data = array(
        "S_user" => $this->input->post('m_user'),
        "S_email" => $this->input->post('m_email'),
        "S_name" => $this->input->post('m_name'),
        "S_password" => md5($this->input->post('m_password')),
        "S_address" => $this->input->post('m_address'),
        "S_age" => $this->input->post('m_age'),
        "S_status" => $this->input->post('m_rd2'),
        "S_tel" =>$this->input->post('m_tel')
      );
      $this->db->insert('tb_staff',$data);
        redirect(base_url('first/dtstaff'));
}

    public function login(){
        $this->load->view('layout/header');
        $this->load->view('hello');
    }
    public function callback(){
        $act = $this->fb->getaccessToken();
        $data = $this->fb->getUserdata($act);
        print_r($data);
    }
    public function get_user()
    {
        $this->load->modal('edit');
        $data['data'] = $this->edit->deletemember();
        $this->load->view('first/one',$data);
    }

    public function editMember($id){
      $data['id']= $id;
        $this->load->view('layout/hadmin');
        $this->load->view('edit',$data);
        $this->load->view('layout/footer');
    }

    public function administrator(){
        $this->load->view('layout/header');
        $this->load->view('admin');
        $this->load->view('layout/footer');
    }
    public function staff(){
        $this->load->view('layout/header');
        $this->load->view('staff');
        $this->load->view('layout/footer');
    }
    public function insertreview(){
        $id = $this->input->post('C_id');
        // $config['upload_path']   = './uploads/';
        // $config['allowed_types'] = 'jpg|png|mpg|gif|docx|doc|zip|pdf|mp3|wmv|flv|avi|mp4';
        // $config['max_size']      = '0';
        // $config['max_width']     = '0';
        // $config['max_height']    = '0';
        // $config['overwrite']     = true;
        // $config['remove_spaces'] = true;
        //
        // $this->load->library('upload', $config);
        // if (!$this->upload->do_upload('R_img')) {
        //     echo $this->upload->display_errors("เลือกสิโว้ย");
        // } else {
        $data = array(
            "M_fullname" => $this->input->post('M_fullname'),
            "C_id" => $this->input->post('C_id'),
            "P_name" => $this->input->post('P_name'),
            "R_detail" => $this->input->post('R_detail')
            // "R_img"   => $_FILES["R_img"]["name"]
            );
            // foreach ($data as $key => $value) {
            //   echo $value;
            // }
            // print_r($data);
            // exit;
        $this->db->insert('tb_review',$data);

        redirect(base_url('first/placemember/'.$id));
    // }
  }
  public function insertlike(){
    $id = $this->input->post('R_id');
    $ids = $this->input->post('L_id');
    $C_id = $this->input->post('C_id');
      $data = array(
          "L_id" => $this->input->post("L_id"),
          "M_user" => $this->input->post("M_user"),
          "R_id" => $this->input->post("R_id"),
          "C_id" => $this->input->post("C_id"),
          "L_status" => $this->input->post("L_status")
          );
      $this->db->insert('tb_like',$data);
      $sql = "UPDATE tb_review SET R_like=R_like+1 WHERE R_id=$id";
    //  $sql = "UPDATE tb_board SET B_reply=B_reply+1 WHERE B_id=$this->input->post('B_id')";
      $this->db->query($sql);
      redirect(base_url('first/rvplace/'.$id));
  }
  public function insertlikecm(){
    $id = $this->input->post('R_id');
    $ids = $this->input->post('L_id');
    $C_id = $this->input->post('C_id');
      $data = array(
          "L_id" => $this->input->post("L_id"),
          "M_user" => $this->input->post("M_user"),
          "R_id" => $this->input->post("R_id"),
          "C_id" => $this->input->post("C_id"),
          "L_status" => $this->input->post("L_status")
          );
      $this->db->insert('tb_like_cm',$data);
      $sql = "UPDATE tb_review_comment SET RC_like=RC_like+1 WHERE R_id=$id";
    //  $sql = "UPDATE tb_board SET B_reply=B_reply+1 WHERE B_id=$this->input->post('B_id')";
      $this->db->query($sql);
      redirect(base_url('first/rvplace/'.$id));
  }

  public function deletelike() {
    $L_id = $this->input->post('L_id');
    $C_id = $this->input->post('C_id');
    $R_id = $this->input->post("R_id");
    $sql = "DELETE FROM tb_like WHERE L_id=$L_id";
    $this->db->query($sql);

    $sql = "UPDATE tb_review SET R_like=R_like-1 WHERE R_id=$R_id";
    $this->db->query($sql);

    redirect(base_url('first/rvplace/'.$R_id));
  }
  public function deletelikecm() {
    $L_id = $this->input->post('L_id');
    $C_id = $this->input->post('C_id');
    $R_id = $this->input->post("R_id");
    $sql = "DELETE FROM tb_like_cm WHERE L_id=$L_id";
    $this->db->query($sql);

     $sql = "UPDATE tb_review_comment SET RC_like=RC_like-1 WHERE R_id=$R_id";
    $this->db->query($sql);

    redirect(base_url('first/rvplace/'.$R_id));
  }
  public function insertRVComment(){
    $C_id = $this->input->post('C_id');
      $data = array(
          "R_id" => $this->input->post('R_id'),
          "C_id" => $this->input->post('C_id'),
          "M_fullname" => $this->input->post('M_fullname'),
          "RC_detail" => $this->input->post('RC_detail')
          );
      $this->db->insert('tb_review_comment',$data);
      redirect(base_url('first/placemember/'.$C_id));
  }
  function uploadimg(){
        $data = array();
        if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name'])){
            $filesCount = count($_FILES['userFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                $uploadPath = 'uploads/files/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['modified'] = date("Y-m-d H:i:s");
                }
            }
            if(!empty($uploadData)){
                //Insert file information into the database
                $insert = $this->file->insert($uploadData);
                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }
        }
        //Get files data from database
       $data['files'] = $this->file->getRows();
       //Pass the files data to view
       $this->load->view('upload_files/index', $data);
   }
   function rvplace($rId)
   {
       $data['R_id'] = $rId;
       $data['tb_review'] = $this->Dt_rv_model->get_tb_board($rId);
       $this->load->view('layout/header');
       $this->load->view('view_topic_place',$data);
       $this->load->view('layout/footer');
   }
   public function insertCMRV(){
     $id = $this->input->post('R_id');
    //  $ids = $this->input->post('L_id');
     $C_id = $this->input->post('C_id');
       $data = array(
          //  "L_id" => $this->input->post("L_id"),
           "M_fullname" => $this->input->post("M_fullname"),
           "R_id" => $this->input->post("R_id"),
           "C_id" => $this->input->post("C_id"),
           "RC_detail" => $this->input->post("RC_detail")
           );
       $this->db->insert('tb_review_comment',$data);
       $sql = "UPDATE tb_review SET R_comment=R_comment+1 WHERE R_id=$id";
     //  $sql = "UPDATE tb_board SET B_reply=B_reply+1 WHERE B_id=$this->input->post('B_id')";
       $this->db->query($sql);
       redirect(base_url('first/rvplace/'.$id));
   }
   public function ss($kw = "")
    {
        $data['P_name'] = $this->input->post('P_name');
        $this->load->view('layout/header');
        $this->load->view('ss', $data);
        $this->load->view('layout/footer');
    }

}
?>
