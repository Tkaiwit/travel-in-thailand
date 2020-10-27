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
                    <div class="hero-unit" style="border: 0px dashed;">

        <form class="form-signin" method="post" action="#"  enctype="multipart/form-data">
            <div class="row">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">


            <?php
							 $sql = "SELECT * FROM (tb_place ) WHERE 1=1 AND C_id ='$id' ";
                            $query = $this->db->query($sql);
                            foreach ($query->result() as $row) {
															$id=$row->P_id;
            ?>
          <div class="col-md-4 portfolio-item">
              <h3 align="center"><font color='red'><?php echo $row->P_name; ?></font></h3>
  			         <img src="<?php echo base_url('uploads'); ?>/<?php echo $row->P_img; ?>" class="thumbnail" width="270px" height="220px" />
            <div class="caption" align="center">
                <p><a data-toggle="modal" href="<?php echo base_url('first/dtplace/'.$id)?>" class="btn btn-success btn-sm ckbnt">ดูเพิ่มเติม</a></p>
            </div>
          </div>

                            <?php
                            }
                            ?>

<div id="example" name="example" class="modal hide fade in" style="display: none; ">
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
          </div>


									</div>
                        </div>
                    </div>
                </div>
        </form>
    </div>

                  </div>
                  <!-- /col-lg-9 END SECTION MIDDLE -->
