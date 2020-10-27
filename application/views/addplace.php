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
                  </style>
                  <form role="form" class="bodyaddplace" action="<?php echo  base_url('first/insertPlace')?>" method="POST" enctype="multipart/form-data">
                  <h3>เพิ่มข้อมูลสถานที่</h3>
                  <div class="form-group">
                    <label for="exampleInputEmail1">อัพโหลดรูปภาพ</label>
                      <input type="file" name="p_img" required="">
                      <p class="help-block">กรุณาเลืกไฟล์</p>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">ชื่อสถานที่</label>
                      <input type="text" class="form-control"
                      name="p_name" placeholder="กรอกชื่อสถานที่" required=""/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">เลือกประเภท</label>
                    <select name="C_id" class="form-control">
                    <?php
                      $query = $this->db->get('tb_category');
                      foreach ($query->result() as $row){
                      $id=$row->C_id;
                     ?>
                    <option value="<?php echo $row->C_id; ?>"><?php echo $row->C_name; ?></option>
                    <?php
                       }
                    ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">สถานที่ตั้ง</label>
                      <input type="text" class="form-control"
                      name="p_location" placeholder="กรอกสถานที่ตั้ง"/ required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">จังหวัด</label>
                      <input type="text" class="form-control"
                      name="p_province" placeholder="กรอกจังหวัด" required=""/>
                  </div>
                  <!-- <div class="form-group">
                    <?php echo $map['js'] ; ?>
                    <?php echo $map['html'] ; ?>
                  </div> -->
                  <div class="form-group col-sm-4">
                    <label for="exampleInputPassword1">พิกัด</label>
                      <input type="text" class="form-control "
                      name="p_latitude"  placeholder="Latitude" required=""/>
                  </div>
                  <div class="form-group col-sm-4">
                      <label for="exampleInputPassword1">พิกัด</label>
                      <input type="text" class="form-control "
                      name="p_longitude" placeholder="Longitude" required=""/>
                  </div>
                  <div class="form-group col-sm-4">
                      <label for="exampleInputPassword1">ซูม</label>
                      <input type="text" class="form-control "
                      name="p_zoom" placeholder="Longitude" required=""/>
                  </div>
                  <br>

                  <div class="form-group">
                    <label for="exampleInputPassword1">ข้อมูล</label><br>
                     <textarea rows="4" cols="87" class="form-control" name="p_details" placeholder="กรอกข้อมูล"></textarea>
                      <!-- <input type="textarea" class="form-control"
                      name="m_address" placeholder="กรอกข้อมูล"/> -->
                  </div>
                  <div class="checkbox">
               <label>
              <input type="checkbox" id="terms" data-error="Before you wreck yourself" required>
                   ยืนยันข้อมูลถุกต้อง?
                </label>
                <div class="help-block with-errors"></div>
               </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp;Save</button>
                      <a type="button" class="btn btn-danger" href="<?php echo base_url('first/member') ?>"><span class="glyphicon glyphicon-remove"></span>&nbsp;Close</a>
                  </div>
                </form>

                  </div>
                  <!-- /col-lg-9 END SECTION MIDDLE -->


      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->
