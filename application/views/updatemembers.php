
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart"><style type="text/css">
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
                  <h4>ค้นหา แก้ไขข้อมูลสมาชิก</h4>
                  <div class="container">
                        <div class="row">
                          <div class="col-sm-8">
                              <div id="imaginary_container">
                                <form class="form-signin" method="post" action="<?php echo base_url('first/updatemembers'); ?>"  enctype="multipart/form-data">
                                <div class="input-group stylish-input-group">
                                  <input type="text" class="form-control" name="M_user" placeholder="Search" >
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
                      <table class="table table-condensed">
                        <?php $sql = "SELECT s.* FROM (tb_member s) WHERE s.M_user LIKE '%".$M_user."%'";
                                     $query = $this->db->query($sql);
                           $nr = $query->num_rows();
                           if($nr==0){echo "--ไม่พบข้อมูล--";}else{
                         ?>
      <thead>
        <tr>
          <th>ชื่อผุ้ใช้งาน</th>
          <th>อีเมล์</th>
          <th>ชื่อ-นามสกุล</th>
          <th>ที่อยู่</th>
          <th>สถานะ</th>
          <th style="text-align: center;">จัดการข้อมูล</th>

        </tr>
      </thead>
      <tbody><?php
          // $query = $this->db->get('tb_member');
          foreach ($query->result() as $row){
          $id=$row->M_user;
          $M_status = $row->M_status;
       ?>
        <tr>
          <td><?php echo $row->M_user; ?></td>
          <td><?php echo $row->M_email; ?></td>
          <td><?php echo $row->M_fullname; ?></td>
          <td><?php echo $row->M_address; ?></td>
          <td><?php if ($M_status ==1){
            echo "สมาชิก";
            }elseif ($M_status ==2){
              echo "พนักงาน";
            }else{
              echo "ผู้ดูแลระบบ";
              }; ?></td>
          <td align="center">
          <a class="btn btn-success btn-sm"  href="<?php echo base_url ('first/edit_members/'.$id)?>"><i class="fa fa-pencil-square-o"></i>แก้ไข</a>
          </td>
        </tr><?php
      }}
        ?>
      </tbody>
      </table>
                  </div>
                  <!-- /col-lg-9 END SECTION MIDDLE -->


      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->
