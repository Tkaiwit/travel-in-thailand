
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  <h4>แก้ไขข้อมูลสถานที่</h4>
<form role="form"  action="<?php echo  base_url('first/edit_place/'.$tb_place['P_id'])?>" method="POST" enctype="multipart/form-data">
<div class="form-group">
  <label for="exampleInputEmail1">อัพโหลดรูปภาพ</label>
    <input type="file" name="p_img" value="<?php echo ($this->input->post('P_img') ? $this->input->post('P_img') : $tb_place['P_img']); ?>" >
    <p class="help-block">กรุณาเลืกไฟล์</p>
</div>
  <div class="form-group">
    <label for="exampleInputEmail1">ชื่อสถานที่</label>
    <input type="text" class="form-control"
      name="P_name" placeholder="กรอกชื่อสถานที่" value="<?php echo ($this->input->post('P_name') ? $this->input->post('P_name') : $tb_place['P_name']); ?>" />
  </div>
  <div class="form-group">
    <label for="C_id" class="col-md-4 control-label">เลือกประเภท</label>
    <select name="C_id" class="form-control">
      <?php
        $query = $this->db->get('tb_category');
        foreach ($query->result() as $row){
        $id=$row->C_id;

        ?>
          <option <?php if($id == $tb_place['C_id']){ echo "selected";}else{ echo "..";} ?> value="<?php echo $row->C_id; ?>"><?php echo $row->C_name; ?></option>
        <?php
          }
        ?>
    </select>
  </div>
  <div class="form-group">
    <label for="P_location" class="col-md-4 control-label">สถานที่ตั้ง</label>
      <input type="text" name="P_location"
      value="<?php echo ($this->input->post('P_location') ? $this->input->post('P_location') : $tb_place['P_location']); ?>" class="form-control" id="P_location" />
  </div>

  <div class="form-group">
    <label for="P_province" class="col-md-4 control-label">จังหวัด</label>
      <input type="text" name="P_province" class="form-control" id="P_province" value="<?php echo ($this->input->post('P_province') ? $this->input->post('P_province') : $tb_place['P_province']); ?>"/>
  </div>

  <div class="form-group col-sm-4">
      <label for="exampleInputPassword1">พิกัด</label>
      <input type="text" class="form-control "
                      name="P_latitude"  placeholder="Latitude" value="<?php echo ($this->input->post('P_latitude') ? $this->input->post('P_latitude') : $tb_place['P_latitude']); ?>" class="form-control" id="P_latitude"/>
  </div>
  <div class="form-group col-sm-4">
      <label for="exampleInputPassword1">พิกัด</label>
      <input type="text" class="form-control "
                  name="P_longitude" placeholder="Longitude" value="<?php echo ($this->input->post('P_longitude') ? $this->input->post('P_longitude') : $tb_place['P_longitude']); ?>" class="form-control" id="P_longitude"/>
  </div>
  <div class="form-group col-sm-4">
      <label for="exampleInputPassword1">ซูม</label>
      <input type="text" class="form-control "
      name="P_zoom" placeholder="Zoom" value="<?php echo ($this->input->post('P_zoom') ? $this->input->post('P_zoom') : $tb_place['P_zoom']); ?>" class="form-control" id="P_zoom" />
  </div>
  <br>

  <div class="form-group">
    <label for="P_details" class="col-md-4 control-label">ข้อมูล</label>
      <textarea name="P_details" class="form-control" id="P_details"><?php echo ($this->input->post('P_details') ? $this->input->post('P_details') : $tb_place['P_details']); ?></textarea>
  </div>
  <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
          <a type="button" class="btn btn-danger"
           href="<?php echo base_url('first/updateplace/')?>">Close</a>
  </div>
</form>


                  </div>
                  <!-- /col-lg-9 END SECTION MIDDLE -->


      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->
