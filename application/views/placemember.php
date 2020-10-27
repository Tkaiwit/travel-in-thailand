<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
    <?php
      // script parameter $id is C_id from table tb_category (post)
      $C_id = $id;
    ?>
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-9 main-chart">
              <html>
                  <head>
                      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
                      <title>รีวิว</title>

               <div class="span9">
                      <div class="hero-unit" style="border: 0px dashed;">
                      <title>รีวิว</title>
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
                    <h3 style="font-size:30px; text-align: center;">รีวิว</h3>
                      <table border="0" cellpadding="0" cellspacing="0" align="center"  class="well img-responsive img-circle center-block table">
                              <tr>
                                  <?php
                                    if($this->session->userdata('M_fullname') != ""){
                                  ?>
                                <td colspan="6"><a href="<?php echo base_url('first/reviews') ?>"><span class="fa fa-pencil-square"></span>&nbsp;เขียนโพสต์รีวิว</a></td>
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
                                  <td style="width: 520px;">หัวข้อรีวิว</td>
                                  <td style="width: 72px;">ถูกใจรีวิว</td>
                                  <td style="width: 120px;">ตอบคอมเม้น</td>
                                  <!-- <td style="width: 50px;">ตอบ</td> -->
                                  <td style="width: 200px;">วันที่ตั้งรีวิว</td>
                              </tr>

                          <tbody>
                            <?php
                                $i = 1;
          							 $sql = "SELECT * FROM (tb_review) WHERE 1=1 AND C_id ='$C_id' ";
                                      $query = $this->db->query($sql);
                                      foreach ($query->result() as $row) {
                                        // review id
          															$rId=$row->R_id;
                      ?>
                                  <tr class="bg-info">
                                      <td style="text-align: center;"><?php echo $i; ?></td>
                                      <td style="text-align: left;" >
                                        <a href="<?php echo base_url('first/rvplace/'.$rId) ?>">
                                          <?php echo $row->P_name; ?>
                                        </a>



                                      </td>
                                      <td style="text-align: left;"><i class="fa fa-thumbs-o-up"></i>&nbsp;<?php echo $row->R_like; ?>&nbsp;คน</td>
                                      <td style="text-align: center;"><i class="fa fa-comment"></i>&nbsp;<?php echo $row->R_comment; ?></td>
                                      <td style="text-align: left;"><i class="fa fa-clock-o"></i>&nbsp;<?php echo $row->R_created; ?></td>
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
