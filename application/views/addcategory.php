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
                  <h4>เพิ่มข้อมูลประเภท</h4>
                  <form role="form" class="bodyaddplace" action="<?php echo  base_url('first/insertCategory')?>" method="POST" >
                  <div class="form-group">
                    <label for="exampleInputEmail1">รหัสประเภท</label>
                      <input type="text" class="form-control"
                      name="c_id" placeholder="กรอกรหัสประเภท" required="กรอกรหัสประเภท" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">ชื่อประเภท</label>
                      <input type="text" class="form-control"
                      name="c_name" placeholder="กรอกชื่อประเภท" required="กรอกชื่อประเภท" />
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
