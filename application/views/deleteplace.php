
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
                  <h4>ค้นหา ลบข้อมูลสถานที่</h4>

                    <div class="container">
                          <div class="row">
                            <div class="col-sm-8">
                                <div id="imaginary_container">
                                  <form class="form-signin" method="post" action="<?php echo base_url('first/dropplace'); ?>"  enctype="multipart/form-data">
                                  <div class="input-group stylish-input-group">
                                    <input type="text" class="form-control" name="P_name"  placeholder="Search" >
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
                  <table class="table datatable">
                    <?php $sql = "SELECT s.* FROM (tb_place s) WHERE s.P_name LIKE '%".$P_name."%'";
                                 $query = $this->db->query($sql);
                       $nr = $query->num_rows();
                       if($nr==0){echo "--ไม่พบข้อมูล--";}else{
                     ?>
      <thead>
        <tr>
          <th>ชื่อสถานที่</th>
          <th>ที่ตั้ง</th>
          <th>จังหวัด</th>
          <th>Latitude</th>
          <th>Longitude</th>
          <th>ประเภท</th>
          <th>จัดการข้อมูล</th>

        </tr>
      </thead>
      <tbody><?php
          //$query = $this->db->get('tb_place');
          foreach ($query->result() as $row){
          $id=$row->P_id;
          $C_id = $row->C_id;
       ?>
        <tr>
          <td><?php echo $row->P_name; ?></td>
          <td><?php echo $row->P_location; ?></td>
          <td><?php echo $row->P_province; ?></td>
          <td><?php echo $row->P_latitude; ?></td>
          <td><?php echo $row->P_longitude; ?></td>
          <td>
          <?php
            $query = $this->db->get('tb_category');
            foreach ($query->result() as $row){
            $i = 0;
            $ids=$row->C_id;
            ?>
          <?php
              if ($C_id == $ids) {
               echo $row->C_name;
               $i++;
                }
              ?>
              <?php
            }
            ?>
          </td>
          <td align="center">
            <a class="btn btn-danger btn-sm" href="<?php echo base_url('first/deleteplace/'.$id)?>"><i class="fa fa-trash-o"></i>&nbsp;ลบ</a>
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
