<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-9 main-chart">


              <?php
//update view
// $sql_u = "UPDATE tb_board SET B_view=B_view+1 WHERE B_id='{$tb_board['B_id']}' ";
// $query = $this->db->query($sql_u);
// mysqli_query($sql_u);
 ?>
 <?php echo validation_errors(); ?>
<?php echo form_open('dt_board/dt_web/'.$tb_review['R_id'],array("class"=>"form-horizontal")); ?>

<table width="850" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000" class="well ">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
                        <tr class="well">
                            <td colspan="3" style="background-color: #FF8000; color: #F2F2F2; font-size: 20px;">
                                <b style="color: #FFFFFF;">
                                  [NRV]รีวิว&nbsp;<?php echo ($this->input->post('P_name') ? $this->input->post('P_name') : $tb_review['P_name']); ?>
                                </b>
                            </td>
                        </tr>


                        <tr class="bg-info" >

                            <td  valign="top" style="text-align: center;">
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <?php echo ($this->input->post('R_detail') ? $this->input->post('R_detail') : $tb_review['R_detail']); ?>
                            </td>
                        </tr>
                        <?php
                                 $sql = "SELECT * FROM tb_review WHERE R_id=$R_id";
                                              $query = $this->db->query($sql);
                                              foreach ($query->result() as $row) {
                                                // review id
                                  $rId=$row->R_id;
                              ?>
                        <tr class="well">
                          <td>
                          <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-thumbs-o-up"></i>&nbsp;<?php echo $row->R_like; ?>&nbsp;คน</h5>
                          </td>
                        </tr>

                        <?php echo form_close(); ?>
                        <tr>
                          <td style="width:190px" class=" well">
                            <?php

                      $L_status = false;
                      $username = $this->session->userdata('M_user');
                      $query = $this->db->query("SELECT * FROM tb_like WHERE R_id=$rId AND M_user='$username'");
                      foreach ($query->result() as $roww){
                        $L_status = $roww->L_status;
                      }

                      if(!empty($L_status)){
                        //echo $L_status;
                        if($L_status ==0){ ?>
                          <form action="<?php echo base_url('first/insertlike/'.$rId) ?>" method="post">
                            <div hidden="">
                              <input type="text" name="C_id" value="<?php echo $row->C_id; ?>">
                              <input type="text" name="M_user" value="<?php echo $this->session->userdata('M_user'); ?>">
                              <input type="text" name="R_id" value="<?php echo $row->R_id; ?>">
                              <input type="text" name="L_status" value="1">
                            </div>
                            <button type="submit" name="like"><i class="fa fa-thumbs-o-up"></i>&nbsp;ถูกใจ</button>
                          </form>
                        <?php }else{  ?>
                          <form action="<?php echo base_url('first/deletelike/') ?>" method="post">
                            <div hidden="">
                              <input type="text" name="C_id" value="<?php echo $row->C_id; ?>">
                              <input type="text" name="L_id" value="<?php echo $roww->L_id; ?>">
                              <input type="text" name="R_id" value="<?php echo $row->R_id; ?>">
                            </div>
                            <button type="submit" name="unlike"><i class="fa fa-thumbs-o-up"></i>&nbsp;ยกเลิกถูกใจ</button>
                          </form>
                     <?php } ?>
                    <?php }else{ ?>
                      <form action="<?php echo base_url('first/insertlike/'.$rId) ?>" method="post" enctype="multipart/form-data">
                        <div hidden="">
                          <input type="text" name="C_id" value="<?php echo $row->C_id; ?>">
                          <input type="text" name="M_user" value="<?php echo $this->session->userdata('M_user'); ?>">
                          <input type="text" name="R_id" value="<?php echo $row->R_id; ?>">
                          <input type="text" name="L_status" value="1">
                        </div>
                        <button type="submit" name="like"><i class="fa fa-thumbs-o-up"></i>&nbsp;ถูกใจ</button>
                      </form>
                    <?php } ?>
                            <strong>&nbsp;ชื่อผู้รีวิว:</strong>
                            &nbsp;<?php echo ($this->input->post('M_fullname') ? $this->input->post('M_fullname') : $tb_review['M_fullname']); ?>
                          </td>
                        </tr>
                        <?php } ?>
                    </table>
                </td>
            </tr>
            <?php
              $i = 1;
                     $sql = "SELECT * FROM tb_review_comment WHERE R_id=$rId";
                                  $query = $this->db->query($sql);
                                  foreach ($query->result() as $rowe) {
                                    // review id
                      $rId=$rowe->R_id;

                  ?>
            <table width="850" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" class="well" >

        <tr class="bg-info" >

                  <hr>

              <!-- <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Show CommmentReview</td> -->
              <i class="fa fa-comment"></i>&nbsp;ความคิดเห็นที่&nbsp;<?php echo $i; ?>
              <td  valign="top" style="text-align: center;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo $rowe->RC_detail; ?>
              </td>
            </tr>

            <tr class="well">
              <td>
              <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-thumbs-o-up"></i>&nbsp;<?php echo $rowe->RC_like; ?>&nbsp;คน</h5>
              </td>
            </tr>
            <tr>
              <td style="width:190px" class=" well">
                <?php
          $L_status = false;
          $username = $this->session->userdata('M_user');
          $query = $this->db->query("SELECT * FROM tb_like_cm WHERE R_id=$rId AND M_user='$username'");
          foreach ($query->result() as $roww){
            $L_status = $roww->L_status;
          }

          if(!empty($L_status)){
            //echo $L_status;
            if($L_status ==0){ ?>
              <form action="<?php echo base_url('first/insertlikecm/'.$rId) ?>" method="post">
                <div hidden="">
                  <input type="text" name="C_id" value="<?php echo $row->C_id; ?>">
                  <input type="text" name="M_user" value="<?php echo $this->session->userdata('M_user'); ?>">
                  <input type="text" name="R_id" value="<?php echo $row->R_id; ?>">
                  <input type="text" name="L_status" value="1">
                </div>
                <button type="submit" name="like"><i class="fa fa-thumbs-o-up"></i>&nbsp;ถูกใจ</button>
              </form>
            <?php }else{  ?>
              <form action="<?php echo base_url('first/deletelikecm/') ?>" method="post">
                <div hidden="">
                  <input type="text" name="C_id" value="<?php echo $row->C_id; ?>">
                  <input type="text" name="L_id" value="<?php echo $roww->L_id; ?>">
                  <input type="text" name="R_id" value="<?php echo $row->R_id; ?>">
                </div>
                <button type="submit" name="unlike"><i class="fa fa-thumbs-o-up"></i>&nbsp;ยกเลิกถูกใจ</button>
              </form>
         <?php } ?>
        <?php }else{ ?>
          <form action="<?php echo base_url('first/insertlikecm/'.$rId) ?>" method="post" enctype="multipart/form-data">
            <div hidden="">
              <input type="text" name="C_id" value="<?php echo $row->C_id; ?>">
              <input type="text" name="M_user" value="<?php echo $this->session->userdata('M_user'); ?>">
              <input type="text" name="R_id" value="<?php echo $row->R_id; ?>">
              <input type="text" name="L_status" value="1">
            </div>
            <button type="submit" name="like"><i class="fa fa-thumbs-o-up"></i>&nbsp;ถูกใจ</button>
          </form>
        <?php } ?>
                <strong>&nbsp;ชื่อผู้รีวิว:</strong>
                &nbsp;<?php echo $rowe->M_fullname; ?>
              </td>
            </tr>
            </table>
            <?php
            $i++;
              }
            ?>

            <tr>
              <td>
                <table width="850" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
                  <hr>
                  <?php $this->load->helper('url') ?>
                  <form class="" action="<?php echo base_url('first/insertCMRV') ?>" method="post">
                <tr>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><i class="fa fa-comment"></i>&nbsp;แสดงความคิดเห็น</b>
                    <script type="text/javascript" src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
                    <script>
                    tinymce.init({ selector:'textarea',
                    relative_urls : false,
                    remove_script_host : false,
                    plugins: [ "image ","responsivefilemanager"],
                    toolbar2: " image media | responsivefilemanager ",
                    image_advtab: true ,

                    external_filemanager_path:"<?php echo base_url('assets/filemanager/')?>",
                    filemanager_title:"Responsive Filemanager" ,
                    external_plugins: { "filemanager" : "<?php echo base_url('assets/filemanager/plugin.min.js')?>"}

                     });</script>
                     <textarea name="RC_detail" rows="8" cols="80"></textarea>
                     <?php
                     if($this->session->userdata('M_fullname') == ""){ ?>
                          <button type="submit" name="button" style="float: right;" disabled="">ไม่สามารถโพสต์ได้</button>
                     <?php }else{?>
                         <button type="submit" name="button" style="float: right;">โพสต์</button>
                   <?php }?>
                     <!-- <button type="submit" name="button" style="float: right;">โพสต์</button> -->
                  </td>
                  <td hidden="">
                    <input type="text" name="M_fullname" value="<?php echo $this->session->userdata('M_fullname'); ?>">
                    <input type="text" name="R_id" value="<?php echo $row->R_id; ?>">
                    <input type="text" name="C_id" value="<?php echo $row->C_id; ?>">
                  </td>
                </tr>
                </form>
                </table>
              </td>
            </tr>
        </table>
      </div>
            <!-- /col-lg-9 END SECTION MIDDLE -->
