<script type="text/javascript">
$(document).ready(function(){

	$(".ckbnt").click(function(){
			var ind = $('.ckbnt').index(this);
			var val_1 = $('.ckbnt_1').eq(ind).val();
			var val_2 = $('.ckbnt_2').eq(ind).val();
			var val_3 = $('.ckbnt_3').eq(ind).val();
			var val_4 = $('.ckbnt_4').eq(ind).val();
      var val_5 = $('.ckbnt_5').eq(ind).val();
			$('#tt').html(val_1);
			$('#tt2').html(val_2);
			$('#tt3').html('<a href="'+val_3+'">Google Map</a>');
      $('#tt4').html('<a href="'+val_4+'">Google Map</a>');
			$('#tt5').html('<img src="'+val_5+'" width="242" height="200" />');

	});
});
</script>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
									<style type="text/css">
											.bodyaddplace{
													margin:0px 70px ; padding:0px;
											}
											.stylish-input-group .input-group-addon{
													background: white !important;
											}
											.stylish-input-group .form-control{
													border-right:0;
													box-shadow:0 0 0;
													border-color:#ccc;
											}
											.stylish-input-group button{
													border:0;
													background:transparent;
											}
									</style>
										<div class="container">
											<div class="row">
												<div class="col-sm-8">
														<div id="imaginary_container">
															<form class="form-signin" method="post" action="<?php echo base_url('first/ss'); ?>"  enctype="multipart/form-data">
															<div class="input-group stylish-input-group">
																<input type="text" class="form-control" name="P_name" placeholder="Search" >
																<span class="input-group-addon">
																		<button type="submit">
																<span class="glyphicon glyphicon-search"></span>
																		</button>
																</span>
															</div>
															</form>
														</div>
												</div>
											</div>
										</div>
										<br>
                    <div class="hero-unit" style="border: 0px dashed;">

        <form class="form-signin" method="post" action="#"  enctype="multipart/form-data">
            <div class="row">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
													<?php
											    $sql = "SELECT s.* FROM (tb_place s) WHERE s.P_name LIKE '%".$P_name."%'";
											                 $query = $this->db->query($sql);
											       $nr = $query->num_rows();
											       if($nr==0){echo "--ไม่พบข้อมูล--";}else{

                            foreach ($query->result() as $row) {
															$id=$row->P_id;
            ?>
          <div class="col-md-12 portfolio-item" align="center">
              <h3 align="center"><font color='red'><?php echo $row->P_name; ?></font></h3>
  			         <img src="<?php echo base_url('uploads'); ?>/<?php echo $row->P_img; ?>" class="thumbnail" width="600px" height="380px" />
            <div class="caption" align="center">
                <p><a data-toggle="modal" href="<?php echo base_url('first/dtplace/'.$id)?>" class="btn btn-success btn-sm ckbnt">ดูเพิ่มเติม</a></p>
            </div>
          </div>

                            <?php
													}}
                            ?>

<!-- <div id="example" name="example" class="modal hide fade in" style="display: none; ">
            <div class="modal-header">
              <a class="close" data-dismiss="modal">×sdjkajsfsaf</a>
              <h3  id="tt" name="tt">asdgsadg</h3>
            </div>
            <div class="modal-body">
              <h4 id="tt2" name="tt2">sadgasdg</h4>
              <p id="tt3" name="tt3">sadgasdg</p>
              <span id="tt4" name="tt4">	sadgsadg</span>
            </div>
            <div class="modal-footer">

              <a href="#" class="btn" data-dismiss="modal">Close</a>
            </div>
          </div> -->


									</div>
                        </div>
                    </div>
                </div>
        </form>
    </div>

                  </div>
                  <!-- /col-lg-9 END SECTION MIDDLE -->
