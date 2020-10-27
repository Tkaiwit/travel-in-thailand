
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
                      <h4>ค้นหาข้อมูลประเภท</h4>
                      <div class="container">
                        <div class="row">
                          <div class="col-sm-8">
                              <div id="imaginary_container">
                                <form class="form-signin" method="post" action="<?php echo base_url('first/searchcategory'); ?>"  enctype="multipart/form-data">
                                <div class="input-group stylish-input-group">
                                  <input type="text" class="form-control" name="C_name" placeholder="Search" >
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
                        <?php $sql = "SELECT s.* FROM (tb_category s) WHERE s.C_name LIKE '%".$C_name."%'";
                                     $query = $this->db->query($sql);
                           $nr = $query->num_rows();
                           if($nr==0){echo "--ไม่พบข้อมูล--";}else{
                         ?>
      <thead>
        <tr>
          <th>รหัสประเภท</th>
          <th>ชื่อประเภท</th>
        </tr>
      </thead>
      <tbody><?php
          // $query = $this->db->get('tb_category');
          foreach ($query->result() as $row){
          $id=$row->C_id;
       ?>
        <tr>
          <td><?php echo $row->C_id; ?></td>
          <td><?php echo $row->C_name; ?></td>
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
