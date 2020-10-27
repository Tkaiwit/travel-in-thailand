      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                    <table border="0" align="center">
                      <thead>
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
                        <div class="container">
                          <div class="row">
                            <div class="col-sm-8">
                                <div id="imaginary_container">
                                  <div class="input-group stylish-input-group">
                                    <form class="form-signin" method="post" action="<?php echo base_url('first/ss'); ?>"  enctype="multipart/form-data">
                                    <input type="text" class="form-control" name="P_name" placeholder="Search" >
                                    <span class="input-group-addon">
                                        <button type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </form>
                                    </span>
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <br>
                        
                        <tr>
                          <td colspan="2" align="center">
                            <img class="img-thumbnail" src="<?php echo base_url('application/views/img/TAT_hero2017_MuKohRang-th.jpg')?>" width="800px" height="500px" align="">
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center"><h2>ยินดีต้อนรับเข้าสู่เว็บไซต์</h2></td>
                        </tr>
                      </thead>

                      <tr colspan="2" align="center">
                        <td><br></td>
                      </tr>
                      <style>
                        .mySlides {display:none;}
                      </style>
                      <tr>
                          <td colspan="2" align="center">
                          <div>
                              <img class="img-thumbnail mySlides" src="<?php echo base_url('application/views/img/b8ba39718.jpg')?>" width="500px" height="500px" align="">
                              <img class="img-thumbnail mySlides" src="<?php echo base_url('application/views/img/images.jpg')?>" width="500px" height="500px" align="">
                              <img class="img-thumbnail mySlides" src="<?php echo base_url('application/views/img/lp9v6e.jpg')?>" width="500px" height="500px" align="">
                              <img class="img-thumbnail mySlides" src="<?php echo base_url('application/views/img/11.jpg')?>" width="500px" height="500px" align="">
                          </div>
                          </td>
                      </tr>
                      <script>
                          var myIndex = 0;
                          carousel();

                      function carousel() {
                      var i;
                      var x = document.getElementsByClassName("mySlides");
                      for (i = 0; i < x.length; i++) {
                          x[i].style.display = "none";
                      }
                      myIndex++;
                      if (myIndex > x.length) {myIndex = 1}
                      x[myIndex-1].style.display = "block";
                      setTimeout(carousel, 2000); // Change image every 2 seconds
                      }
                    </script>
                    </table>

                  </div>
                  <!-- /col-lg-9 END SECTION MIDDLE -->
