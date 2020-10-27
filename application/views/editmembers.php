
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
              <style type="text/css">
                      .bodyaddplace{
                          margin:0px 50px ; padding:0px;
                          }
                  </style>
                  <div class="col-lg-9 main-chart">
                  <h4>แก้ไขข้อมูลสมาชิก</h4>
                  <?php echo form_open('first/edit_members/'.$tb_member['M_user'],array("class"=>"form-group")); ?>

<div class="form-group">
    <label for="exampleInputEmail1">ชื่อผู้ใช้งาน</label>
      <input type="text" name="M_user" value="<?php echo ($this->input->post('M_user') ? $this->input->post('M_user') : $tb_member['M_user']); ?>" class="form-control" id="M_user" />
  </div>
  <div class="form-group">
    <label for="M_password">รหัสผ่าน</label>
      <input type="password" name="M_password" value="<?php echo ($this->input->post('M_password') ? $this->input->post('M_password') : $tb_member['M_password']); ?>" class="form-control" id="M_password" />
  </div>
  <div class="form-group">
    <label for="M_fullname">ชื่อ-นามสกุล</label>
      <input type="text" name="M_fullname" value="<?php echo ($this->input->post('M_fullname') ? $this->input->post('M_fullname') : $tb_member['M_fullname']); ?>" class="form-control" id="M_fullname" />
  </div>
  <div class="form-group">
    <label for="M_email">อีเมล์</label>
      <input type="email" name="M_email" value="<?php echo ($this->input->post('M_email') ? $this->input->post('M_email') : $tb_member['M_email']); ?>" class="form-control" id="M_email" />
  </div>
  <div class="form-group">
    <label for="M_address">ที่อยู่</label>
      <input type="text" name="M_address" value="<?php echo ($this->input->post('M_address') ? $this->input->post('M_address') : $tb_member['M_address']); ?>" class="form-control" id="M_address" />
  </div>
  <div class="form-group">
    <label for="M_tel">เบอร์โทร</label>
      <input type="text" name="M_tel" value="<?php echo ($this->input->post('M_tel') ? $this->input->post('M_tel') : $tb_member['M_tel']); ?>" class="form-control" id="M_tel" />
  </div>
  <div class="form-group">
    <label for="M_status">สถานะ</label>
      <select name="M_status" class="form-control">
        <option value="1"<?php if($tb_member['M_status'] ==1) {
          echo "selected=selected";
        } ?>>สมาชิก</option>
        <option value="2"<?php if ($tb_member['M_status'] ==2) {
          echo "selected=selected";
        }?>>พนักงาน</option>
        <option value="3"<?php if ($tb_member['M_status'] ==3) {
          echo "selected=selected";
        } ?>>ผู้ดูแลระบบ</option>
      </select>
  </div>

   <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
          <a type="button" class="btn btn-danger"
           href="<?php echo base_url('first/updatemembers/')?>">Close</a>
  </div>

<?php echo form_close(); ?>

                  </div>
                  <!-- /col-lg-9 END SECTION MIDDLE -->


      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->
