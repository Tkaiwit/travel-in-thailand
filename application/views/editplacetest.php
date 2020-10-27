<?php error_reporting(E_ALL); ?>
<br><br><br>
<style type="text/css">
body {
     background-image:url('application/views/img/slider-01.jpg');
     margin:0px 290px ; padding:0px;
     }
     .colbox {
          margin-left: 0px;
          margin-right: 0px;
     }
     .center {
    margin: auto;
    width: 28%;/*
    border: 3px solid #73AD21;*/
    padding: 10px;
}
</style>
<body>
<h2>แก้ไขข้อมูลสถานที่</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('first/edit_place/'.$tb_place['P_id'],array("class"=>"form-group")); ?>

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
      <!-- <input type="text" name="C_id" value="<?php echo ($this->input->post('C_id') ? $this->input->post('C_id') : "///".$tb_place['C_id']); ?>" class="form-control" id="C_id" /> -->
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

  <div class="form-group col-sm-6">
                    <label for="exampleInputPassword1">พิกัด</label>
                      <input type="text" class="form-control "
                      name="P_latitude"  placeholder="Latitude" value="<?php echo ($this->input->post('P_latitude') ? $this->input->post('P_latitude') : $tb_place['P_latitude']); ?>" class="form-control" id="P_latitude"/>
                      </div>
                      <div class="form-group col-sm-6">
                      <label for="exampleInputPassword1">พิกัด</label>
                      <input type="text" class="form-control "
                      name="P_longitude" placeholder="Longitude" value="<?php echo ($this->input->post('P_longitude') ? $this->input->post('P_longitude') : $tb_place['P_longitude']); ?>" class="form-control" id="P_longitude"/>
                  </div><br>
  
  <div class="form-group">
    <label for="P_details" class="col-md-4 control-label">ข้อมูล</label>
      <textarea name="P_details" class="form-control" id="P_details"><?php echo ($this->input->post('P_details') ? $this->input->post('P_details') : $tb_place['P_details']); ?></textarea>
  </div>
  <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
          <a type="button" class="btn btn-danger"
           href="<?php echo base_url('first/dtplace/')?>">Close</a>
  </div>
  <?php echo form_close(); ?>
</body>