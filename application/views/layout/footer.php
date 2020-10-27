
<!-- **********************************************************************************************************************************************************
RIGHT SIDEBAR CONTENT
*********************************************************************************************************************************************************** -->

<div class="col-lg-3 ds">
     <!-- USERS ONLINE SECTION -->
<h3>เว็บไซต์ที่เกี่ยวข้อง</h3>
    <!-- First Member -->
    <div class="desc">
      <div class="thumb">
        <img class="img-circle" src="<?php echo base_url('application/views/img/index.jpg')?>" width="35px" height="35px" align="">
      </div>
      <div class="details">
        <p><a href="https://thai.tourismthailand.org/home">การท่องเที่ยวประเทศไทย</a><br/>
           <muted>เว็บหลักของการท่องเที่ยวแห่งประเทศไทย เพื่อให้ข้อมูลการท่องเที่ยวต่างๆทุกรูปแบบในประเทศไทย. </muted>
        </p>
      </div>
    </div>
    <!-- Second Member -->
    <div class="desc">
      <div class="thumb">
        <img class="img-circle" src="<?php echo base_url('application/views/img/thailand-travel1.jpg')?>" width="35px" height="35px" align="">
      </div>
      <div class="details">
        <p><a href="http://www.pateawthai.com/">เที่ยวไทยครึกครื้นเศรษฐกิจไทยศึกคัก</a><br/>
           <muted>เว็บไซต์ ที่เที่ยวไทย/ที่เที่ยวยอดนิยม/ทะเลหมอก /เที่ยวใกล้กรุงเทพ/ที่พักราคาถูก/ร้านอาหารแนะนำ</muted>
        </p>
      </div>
    </div>
    <!-- Third Member -->
    <div class="desc">
      <div class="thumb">
        <img class="img-circle" src="<?php echo base_url('application/views/img/logo.jpg')?>" width="35px" height="35px" align="">
      </div>
      <div class="details">
        <p><a href="http://www.painaidii.com/">ไปไหนดี</a><br/>
           <muted>เว็บท่องเที่ยวยอดนิยมของไทย รวมสถานที่ท่องเที่ยว</muted>
        </p>
      </div>
    </div>
    <!-- Fourth Member -->
    <div class="desc">
      <div class="thumb">
        <img class="img-circle" src="<?php echo base_url('application/views/img/chillpainai.jpg')?>" width="35px" height="35px" align="">
      </div>
      <div class="details">
        <p><a href="http://www.chillpainai.com/">ชิลไปไหน</a><br/>
           <muted>ชิลไปไหน แนะนำที่พัก ร้านอาหาร ที่เที่ยวทั่วไทยพร้อมรีวิวที่พัก รูปภาพ แผนที่</muted>
        </p>
      </div>
    </div>

      <!-- CALENDAR-->
      <div id="calendar" class="mb">
          <div class="panel green-panel no-margin">
              <div class="panel-body">
                  <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                      <div class="arrow"></div>
                      <h3 class="popover-title" style="disadding: none;"></h3>
                      <div id="date-popover-content" class="popover-content"></div>
                  </div>
                  <div id="my-calendar"></div>
              </div>
          </div>
      </div><!-- / calendar -->

</div><!-- /col-lg-3 -->
</div>
</section>
</section>

<!--main content end-->
<!--footer start-->
<footer class="site-footer">
<div class="text-center">
2017 - T-Kaiwit.is
<a href="#" class="go-top">
<i class="fa fa-angle-up"></i>
</a>
</div>
</footer>
<!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url('assets/js/jquery.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
<script class="include" type="text/javascript" src="<?php echo base_url('assets/js/jquery.dcjqaccordion.2.7.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.nicescroll.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/jquery.sparkline.js')?>"></script>


<!--common script for all pages-->
<script src="<?php echo base_url('assets/js/common-scripts.js')?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/gritter/js/jquery.gritter.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/gritter-conf.js')?>"></script>

<!--script for this page-->
<script src="<?php echo base_url('assets/js/sparkline-chart.js')?>"></script>
<script src="<?php echo base_url('assets/js/zabuto_calendar.js')?>"></script>

<script type="application/javascript">
$(document).ready(function () {
$("#date-popover").popover({html: true, trigger: "manual"});
$("#date-popover").hide();
$("#date-popover").click(function (e) {
$(this).hide();
});

$("#my-calendar").zabuto_calendar({
action: function () {
  return myDateFunction(this.id, false);
},
action_nav: function () {
  return myNavFunction(this.id);
},
ajax: {
  url: "show_data.php?action=1",
  modal: true
},
legend: [
  {type: "text", label: "Special event", badge: "00"},
  {type: "block", label: "Regular event", }
]
});
});


function myNavFunction(id) {
$("#date-popover").hide();
var nav = $("#" + id).data("navigation");
var to = $("#" + id).data("to");
console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
}
</script>


</body>
</html>
