<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">

<form role="form"  action="<?php echo  base_url('first/dtplace/'.$tb_place['P_id'])?>" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <h4><?php echo ($this->input->post('P_name') ? $this->input->post('P_name') : $tb_place['P_name']); ?></h4>
  </div>
  <div class="form-group">
    <img src="<?php echo base_url('uploads'); ?>/<?php echo ($this->input->post('P_img') ? $this->input->post('P_img') : $tb_place['P_img']); ?>" class="thumbnail" width="660px" height="400px" style="margin: auto;" />
  </div>
  <div class="form-group">
      <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo ($this->input->post('P_details') ? $this->input->post('P_details') : $tb_place['P_details']); ?></h5>
  </div>
  <div class="form-group">
      <h5  style="text-align:right">สถานที่ตั้ง: <?php echo ($this->input->post('P_location') ? $this->input->post('P_location') : $tb_place['P_location']); ?></h5>
  </div>
  <div class="form-group">
      <h5  style="text-align:right">จังหวัด: <?php echo ($this->input->post('P_province') ? $this->input->post('P_province') : $tb_place['P_province']); ?></h5>
  </div>
  <div class="form-group">
    <?php echo $map['js'] ; ?>
    <?php echo $map['html'] ; ?>
  </div>
</form>
                  </div>
                  <!-- /col-lg-9 END SECTION MIDDLE -->


      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->
