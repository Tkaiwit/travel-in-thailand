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
$sql_u = "UPDATE tb_board SET B_view=B_view+1 WHERE B_id='{$tb_board['B_id']}' ";
$query = $this->db->query($sql_u);
// mysqli_query($sql_u);
 ?>
 <?php echo validation_errors(); ?>
<?php echo form_open('dt_board/dt_web/'.$tb_board['B_id'],array("class"=>"form-horizontal")); ?>

<table width="850" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000" class="well img-responsive img-circle center-block">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
                        <tr class="well">
                            <td colspan="3" style="background-color: #FF8000; color: #F2F2F2; font-size: 20px;">
                                <b style="color: #FFFFFF;">
                                  <?php echo ($this->input->post('B_topic') ? $this->input->post('B_topic') : $tb_board['B_topic']); ?>
                                </b>
                            </td>
                        </tr>
                        <tr class="bg-info">
                          <td style="width:190px" class=" well">
                            <strong>&nbsp;ชื่อผู้ตั้งกระทู้ :</strong><br>
                            &nbsp;<?php echo ($this->input->post('M_fullname') ? $this->input->post('M_fullname') : $tb_board['M_fullname']); ?>

                          </td>
                            <td  valign="top" style="font-size: 15px;">
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <?php echo ($this->input->post('B_detail') ? $this->input->post('B_detail') : $tb_board['B_detail']); ?>
                            </td>
                        </tr>

                        <tr class="bg-info">
                            <td style="text-align: right; font-size: 15px;" colspan="2">
                                <strong>&nbsp;วันที่ตั้งกระทู้ :</strong>
                                &nbsp;<?php echo ($this->input->post('B_created') ? $this->input->post('B_created') : $tb_board['B_created']); ?>&nbsp;<br>
.................................................................................................................................................................................................................
                            </td>
                        </tr>
                        <?php echo form_close(); ?>
                        <?php
                            $query = $this->db->query("SELECT * FROM tb_board_comment WHERE B_id ='{$tb_board['B_id']}'");
                            foreach ($query->result() as $row){
                            //$id=$row->BC_id;
                         ?>
                        <!-- <tr class="bg-info">
                          <td>โชว์การตอบ</td>
                          <td></td>
                        </tr> -->
                        <tr>
                            <td colspan="3" style="background-color: #ffbf80; color: #FFFFFF; font-size: 20px;">
                                <b style="color: #FFFFFF;">
                                  <?php echo $row->BC_topic; ?>
                                </b>
                            </td>
                        </tr>
                        <tr class="bg-info">
                          <td class=" well">
                            <strong><b>&nbsp;#ชื่อผู้ตอบกระทู้ :#</b></strong><br>
                            &nbsp;<?php echo $row->M_fullname; ?>
                          </td>
                            <td  valign="top" style="font-size: 15px;">
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              &nbsp;
                                <?php echo $row->BC_detail; ?>

                            </td>
                        </tr>

                        <tr class="bg-info">
                            <td style="text-align: right; font-size: 15px;" colspan="2">
                                <strong>&nbsp;#วันที่ตอบกระทู้ :#</strong>
                                &nbsp;<?php echo $row->BC_created; ?>&nbsp;<br>

.................................................................................................................................................................................................................
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                        <!-- <p style="text-align: center;color: red;">ไม่มีคำตอบ</p> -->

                        <tr class="bg-info">
                          <td colspan="2">
<script type="text/javascript">
function showcomment(){
	comment1.style.display = 'none';
	comment2.style.display = '';
}
function closecomment(){
	comment1.style.display = '';
	comment2.style.display = 'none';
}
</script>
                            <h5>
                              <a href="javascript:showcomment();" id="comment1"><b>ตอบกระทู้</b></a>
                            </h5>
                            <div id="comment2" style="display:none;">
                            <h5>
                              <a href="javascript:closecomment();">ปิดกระทู้</a>
                            </h5>

                            <form name="form2" method="post" action="<?php echo base_url('first/insertcomment') ?>" enctype="multipart/form-data"  onSubmit="return formCheck();">
                            <table class="webboaedread" align="center">
                            <tr>
                            	<td align="right" >Re&nbsp;หัวข้อ&nbsp;:</td>
                            	<td><input type="text" name="BC_topic" style="width:500px;height:30px;" value="Re&nbsp;<?php echo ($this->input->post('B_topic') ? $this->input->post('B_topic') : $tb_board['B_topic']); ?>" class="form-control" readonly=""></td>
                            </tr>

                              <td>&nbsp;</td>

                            <tr>
                            	<td align="right" valign="top">&nbsp;รายละเอียด&nbsp;:</td>
                            	<td><textarea name="BC_detail" style="width:500px;height:60px;" class="form-control"></textarea></td>
                            </tr>
                            <tr hidden="">
                            	<td align="right">&nbsp;ชื่อของท่าน&nbsp;:</td>
                            	<td><input type="text" name="M_fullname" style="width:100px;height:100px;" value="<?php echo $this->session->userdata('M_fullname');?>" class="form-control" readonly></td>
                            </tr>
                            <tr hidden="">
                            	<td align="right">&nbsp;ไอดีบอร์ด&nbsp;:</td>
                            	<td><input type="text" name="B_id" style="width:100px;height:100px;"
                                value="<?php echo ($this->input->post('B_id') ? $this->input->post('B_id') : $tb_board['B_id']); ?>" class="form-control" readonly>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2" align="right">
                              <?php
                              if($this->session->userdata('M_fullname') == ""){ ?>
                                    <button type="submit" class="btn btn-sm btn-danger" disabled="">[ไม่สามารถแสดงความคิดเห็นได้]</button>
                              <?php }else{?>
                                  <button type="submit" class="btn btn-sm btn-success">[แสดงความคิดเห็น]</button>
                            <?php }?>
                                <!-- <button type="submit" class="btn btn-sm btn-success">[แสดงความคิดเห็น]</button> -->
                            	<input type="hidden" name="topicid" value=""></td>
                            </tr>
                            </table>
                            </form>
                            </div>

                          </td>
                        </tr>
                        <td colspan="2">
                          <a href="<?php echo base_url('first/webboard') ?>"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back To Webboard</a>
                        </td>
                    </table>
                </td>
            </tr>
        </table>
      </div>
            <!-- /col-lg-9 END SECTION MIDDLE -->
