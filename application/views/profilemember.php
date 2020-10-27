
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#home">โปรไฟล์</a></li>
                      <li><a data-toggle="tab" href="#menu1">เปลี่ยนรหัส</a></li>
                  </ul>
                  <div class="tab-content">
                  <div id="home" class="tab-pane fade in active">

                  <?php echo form_open('first/edit_pro/'.$tb_member['M_user'],array("class"=>"form-group")); ?>
<br>
<div class="form-group">
    <label for="exampleInputEmail1">ชื่อผู้ใช้งาน</label>
      <input type="text" name="M_user" value="<?php echo ($this->input->post('M_user') ? $this->input->post('M_user') : $tb_member['M_user']); ?>" class="form-control" id="M_user" readonly/>
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
      <select name="M_status" class="form-control" disabled="">
       <option value="1"<?php if($tb_member['M_status'] ==1) {
          echo "selected=selected";
        } ?>>สมาชิก</option>
        <!-- <option value="2"<?php if ($tb_member['M_status'] ==2) {
          echo "selected=selected";
        }?>>พนักงาน</option>
        <option value="3"<?php if ($tb_member['M_status'] ==3) {
          echo "selected=selected";
        } ?>>ผู้ดูแลระบบ</option> -->
      </select>
  </div>

   <div class="modal-footer">
          <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp;Save</button>
          <a type="button" class="btn btn-danger"
           href="<?php echo base_url('first/member/')?>"><span class="glyphicon glyphicon-remove"></span>&nbsp;Close</a>
  </div>

<?php echo form_close(); ?>
                  </div>
                  <div id="menu1" class="tab-pane fade">
                  <br>
                          <div class="form-group">

<?php
          $attributes = array("class" => "form-horizontal", "name" => "loginform");
          echo form_open("first/checkpassword", $attributes);?>
รหัสผ่านปัจจุบัน<input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>">
<span class="text-danger"><?php echo form_error('password'); ?></span><br>
<?php echo form_close(); ?>
<?php echo $this->session->flashdata('msg'); ?>
<?php echo form_open('first/edit_pass/'.$tb_member['M_user'],array("class"=>"form-group")); ?>
รหัสผ่านใหม่ <input type="hidden" class="form-control" name="M_password" value="<?php echo ($this->input->post('M_password') ? $this->input->post('M_password') : $tb_member['M_password']); ?>">
<input type="password" class="form-control" name="M_password" ><br>

ยืนยันรหัส <input type="hidden" class="form-control" name="M_password" value="<?php echo ($this->input->post('M_password') ? $this->input->post('M_password') : $tb_member['M_password']); ?>">
<input type="password" class="form-control" name="M_password" >
<div class="modal-footer">
          <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp;Save</button>
          <a type="button" class="btn btn-danger"
           href="<?php echo base_url('first/member/')?>"><span class="glyphicon glyphicon-remove"></span>&nbsp;Close</a>
  </div>
  <?php echo form_close(); ?>

                  </div>
                  </div>


                  </div>
                  </div>
                  <!-- /col-lg-9 END SECTION MIDDLE -->


      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->
