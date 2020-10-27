
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                    <h4>แก้ไขข้อมูลประเภท</h4>
                  <?php echo form_open('first/edit_category/'.$tb_category['C_id'],array("class"=>"form-group")); ?>

<div class="form-group">
    <label for="exampleInputEmail1">ชื่อประเภท</label>
      <input type="text" class="form-control" name="C_id" placeholder="กรอกชื่อประเภท" value="<?php echo ($this->input->post('C_id') ? $this->input->post('C_id') : $tb_category['C_id']); ?>" readonly/>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">ชื่อประเภท</label>
      <input type="text" class="form-control" name="C_name" placeholder="กรอกชื่อประเภท" value="<?php echo ($this->input->post('C_name') ? $this->input->post('C_name') : $tb_category['C_name']); ?>"  />
  </div>

  <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
          <a type="button" class="btn btn-danger"
           href="<?php echo base_url('first/updatecategory/')?>">Close</a>
  </div>

<?php echo form_close(); ?>

                  </div>
                  <!-- /col-lg-9 END SECTION MIDDLE -->


      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->
