      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  <h3>เพิ่มข้อมูลสมาชิก</h3>
    <form action="<?php echo  base_url('first/insertMember')?>" method="POST">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ชื่อผุ้ใช้งาน</label>
                      <input type="text" class="form-control"
                      name="m_user" placeholder="กรอกชื่อผุ้ใช้งานของคุณ"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">รหัสผ่าน</label>
                      <input type="password" class="form-control"
                      name="m_password" placeholder="กรอกรหัสผ่านของคุณ"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">ชื่อ-นามสกุล</label>
                      <input type="text" class="form-control"
                      name="m_fullname" placeholder="กรอกชื่อ-นามสกุลของคุณ"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">อีเมล์</label>
                      <input type="email" class="form-control"
                      name="m_email" placeholder="กรอกอีเมล์ของคุณ"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">ที่อยู่</label>
                      <input type="textarea" class="form-control"
                      name="m_address" placeholder="กรอกที่อยู่ของคุณ"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">เบอร์โทร</label>
                      <input type="text" class="form-control"
                      name="m_tel" placeholder="กรอกเบอร์โทรของคุณ"/>
                  </div>
                  <div class="form-group">
                  <label for="exampleInputPassword1" >อายุ</label>
                  <input type="text"  name="m_age" value="" class="form-control" placeholder="กรอกอายุของคุณ">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" >สถานะ</label>
                    <select name="m_status" class="form-control">
                    <option value="1">สมาชิก</option>
                  </div>
                  <div class="checkbox">
                      <label>
                    <input type="checkbox" id="terms" data-error="Before you wreck yourself" required>
                   ยืนยันข้อมูลถุกต้อง?
                      </label>
                <div class="help-block with-errors"></div>
                  </div>
                  <div align="center">
               <button type="submit" class="btn btn-info btn-md" style="float: center;" >บันข้อมูลสมาชิก</button></div>
    </form>
                  </div>
                  <!-- /col-lg-9 END SECTION MIDDLE -->


      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
