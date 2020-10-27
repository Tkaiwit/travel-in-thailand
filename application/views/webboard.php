<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-9 main-chart">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>webboard</title>

 <div class="span9">
        <div class="hero-unit" style="border: 0px dashed;">
        <title>webboard</title>
        <style type="text/css">
            .table{
                padding: 0;
                width: 800px;
                font-size: 15px;
            }
            table.table thead tr{
              background-color: #FF8000;
              color: #F2F2F2;
            }
            table.table thead tr th{
                border: 1px solid #CCCCCC;
                padding: 5px;
                margin: 0px;
            }
            table.table tbody tr td{
                border-bottom: 1px solid #CCCCCC;
                padding: 5px;
            }
        </style>
    </head>
    <body>
      <h3 style="font-size:30px; text-align: center;">Webboard</h3>


        <table border="0" cellpadding="0" cellspacing="0" align="center"  class="well img-responsive img-circle center-block table">
                <tr>

                    <?php
                      if($this->session->userdata('M_fullname') != ""){
                          ?>
                  <td colspan="6"><a href="<?php echo base_url('first/new_topic') ?>"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;ตั้งกระทู้ใหม่</a></td>
                  <?php
                  }else{
                ?>
                <td colspan="6"><a href="<?php echo base_url('') ?>"><span class="glyphicon glyphicon-log-in"></span>&nbsp;โปรดล็อคอินก่อนนะครับ</a></td>
                <?php
                      }
                  ?>
                </tr>
                <tr style="background-color: #FF8000; color: #F2F2F2;">
                    <td style="width: 30px;">ลำดับ</td>
                    <td style="width: 335px;">หัวข้อกระทู้</td>
                    <td style="width: 170px;">โดย</td>
                    <td style="width: 50px;">อ่าน</td>
                    <td style="width: 50px;">ตอบ</td>
                    <td style="width: 150px;">วันที่ตั้งกระทู้</td>
                </tr>

            <tbody>
              <?php
                  $i = 1;
                  $query = $this->db->query('SELECT * FROM tb_board ORDER BY B_id DESC');
                  $query_BC = $this->db->query('SELECT * FROM tb_board INNER JOIN tb_board_comment ON tb_board.B_id = tb_board_comment.B_id ');
                  // $query_c = $this->db->query('SELECT COUNT(`B_id`) FROM `tb_board_comment` WHERE `BC_id`');
                  // foreach ($query_c->result() as $rows){
                  foreach ($query->result() as $row){
                  $B_id=$row->B_id;

               ?>
                    <tr class="bg-info">
                        <td style="text-align: center;"><?php echo $i; ?></td>
                        <td style="text-align: left;" >
                          <a href="<?php echo base_url('first/vtopic/'.$B_id) ?>">
                            <?php echo $row->B_topic; ?>
                          </a>

                        </td>
                        <td style="text-align: left;"><?php echo $row->M_fullname; ?></td>
                        <td style="text-align: center;"><?php echo $row->B_view; ?></td>
                        <td style="text-align: center;"><?php echo $row->B_reply ; ?></td>
                        <td style="text-align: left;"><?php echo $row->B_created; ?></td>
                    </tr>
                    <?php
                    $i++;
                  }
                   ?>
            </tbody>
        </table>
        <!-- <a class="btn btn-danger btn-xs" href="#">Back To Home</a> -->
    </body>

        </div>
 </div>
</html>

            </div>
            <!-- /col-lg-9 END SECTION MIDDLE -->
