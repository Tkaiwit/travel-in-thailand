<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <?php if ($this->session->userdata('M_status') ==1){ ?>
        <title>Welcome Member</title>
    <?php }elseif ($this->session->userdata('M_status') ==2){ ?>
        <title>Welcome Staff</title>
    <?php }elseif($this->session->userdata('M_status') ==3){ ?>
        <title>Welcome Admin</title>
    <?php }else{ ?>
        <title>Welcome User general</title>
    <?php }; ?>



    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css" rel="stylesheet')?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/zabuto_calendar.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/gritter/css/jquery.gritter.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lineicons/style.css')?>">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style-responsive.css')?>" rel="stylesheet">

    <script src="<?php echo base_url('assets/js/chart-master/Chart.js')?>"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <?php
              if($this->session->userdata('M_status') =="3"){
             ?>
            <a href="<?php echo base_url('first/administrator') ?>" class="logo"><b><span class="fa fa-home"></span>&nbsp;Travel In Thailand</b></a>
            <?php
          } else if ($this->session->userdata('M_status') =="2"){
             ?>
            <a href="<?php echo base_url('first/staff') ?>" class="logo"><b><span class="fa fa-home"></span>&nbsp;Travel In Thailand</b></a>
            <?php
          }elseif ($this->session->userdata('M_status') =="1") {
             ?>
             <a href="<?php echo base_url('first/member') ?>" class="logo"><b><span class="fa fa-home"></span>&nbsp;Travel In Thailand</b></a>
            <?php
          }else {
             ?>
             <a href="<?php echo base_url('first/general') ?>" class="logo"><b><span class="fa fa-home"></span>&nbsp;Travel In Thailand</b></a>
             <?php
          }
              ?>
              </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li>

                    <?php
          if($this->session->userdata('M_fullname') != ""){
            ?>
            <a class="logout" href="<?php echo base_url('first/logout') ?>"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a>
          <?php
          }else{
            ?>
            <a class="logout" href="<?php echo base_url('') ?>"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login</a>
          <?php
            }
          ?>
          </li>
            	</ul>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                <?php
                    $id= $this->session->userdata('M_user');
                ?>
              	  <p class="centered"><a href="<?php echo base_url ('first/editprofilemember/'.$id)?>"><img src="<?php echo base_url('assets/img/ui-samm.jpg')?>" class="img-circle" width="70"></a></p>

                  <h5>&nbsp;&nbsp;&nbsp;<p class="centered glyphicon glyphicon-user" name="M_fullname">
                      <?php
                      if($this->session->userdata('M_fullname') == ""){
                            echo "ยังไม่ได้เข้าสู่ระบบ";
                        }else{
                            echo $this->session->userdata('M_fullname');
                      }
                      ?>
                      </p>
                  </h5>
                  <?php
                    if($this->session->userdata('M_status') =="3"){
                   ?>
                   <li class="sub-menu">
                       <a href="javascript:;" >
                           <i class="fa fa-desktop"></i>
                           <span>สถานที่น่าสนใจ</span>
                       </a>
                       <ul class="sub">
                         <?php
                           $query = $this->db->get('tb_category');
                           foreach ($query->result() as $row){
                           $id=$row->C_id;
                         ?>
                           <li>
                             <!-- <a href="#"><?php echo $row->C_name; ?></a> -->
                             <a href="<?php echo base_url('first/place/' .$id) ?>"
                             onclick="<?php echo base_url('first/place/' .$id) ?>;return false;"
                             ><?php echo $row->C_name; ?>
                             </a>
                           </li>
                         <?php
                           }
                         ?>
                       </ul>
                   </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>ข้อมูลสถานที่</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url('first/addplace')?>"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;เพิ่มข้อมูลสถานที่</a></li>
                          <li><a  href="<?php echo base_url('first/searchplace')?>"><span class="glyphicon glyphicon-search"></span>&nbsp;ค้นหาข้อมูลสถานที่</a></li>
                          <li><a  href="<?php echo base_url('first/updateplace')?>"><span class="glyphicon glyphicon-cog"></span>&nbsp;แก้ไขข้อมูลสถานที่</a></li>
                          <li><a  href="<?php echo base_url('first/dropplace')?>"><span class="glyphicon glyphicon-trash"></span>&nbsp;ลบข้อมูลสถานที่</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>ข้อมูลประเภท</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url('first/addcategory')?>"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;เพิ่มข้อมูลประเภท</a></li>
                          <li><a  href="<?php echo base_url('first/searchcategory')?>"><span class="glyphicon glyphicon-search"></span>&nbsp;ค้นหาข้อมูลประเภท</a></li>
                          <li><a  href="<?php echo base_url('first/updatecategory')?>"><span class="glyphicon glyphicon-cog"></span>&nbsp;แก้ไขข้อมูลประเภท</a></li>
                          <li><a  href="<?php echo base_url('first/dropcategory')?>"><span class="glyphicon glyphicon-trash"></span>&nbsp;ลบข้อมูลประเภท</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>ข้อมูลสมาชิก</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url('first/addmembers')?>"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;เพิ่มข้อมูลสมาชิก</a></li>
                          <li><a  href="<?php echo base_url('first/searchmembers')?>"><span class="glyphicon glyphicon-search"></span>&nbsp;ค้นหาข้อมูลสมาชิก</a></li>
                          <li><a  href="<?php echo base_url('first/updatemembers')?>"><span class="glyphicon glyphicon-cog"></span>&nbsp;แก้ไขข้อมูลสมาชิก</a></li>
                          <li><a  href="<?php echo base_url('first/dropmembers')?>"><span class="glyphicon glyphicon-trash"></span>&nbsp;ลบข้อมูลสมาชิก</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="<?php echo base_url('first/webboard')?>">
                          <i class="fa fa-book"></i>
                          <span>Webboard</span>
                      </a>
                  </li>
                  <!-- <li class="sub-menu">
                      <a href="<?php echo base_url('first/placemember')?>">
                          <i class="fa fa-tasks"></i>
                          <span>รีวิว</span>
                      </a>
                  </li> -->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>รีวิว</span>
                      </a>
                      <ul class="sub">
                        <li><a href="<?php echo base_url('first/reviews') ?>"><span class="fa fa-pencil-square"></span>&nbsp;เขียนรีวิว</a></li>
                        <?php
                          $query = $this->db->get('tb_category');
                          foreach ($query->result() as $row){
                          $id=$row->C_id;
                        ?>
                          <li>
                            <!-- <a href="#"><?php echo $row->C_name; ?></a> -->
                            <a href="<?php echo base_url('first/placemember/' .$id) ?>"
                            onclick="<?php echo base_url('first/placemember/' .$id) ?>;return false;"
                            ><?php echo $row->C_name; ?>
                            </a>
                          </li>
                        <?php
                          }
                        ?>
                      </ul>
                  </li>
                  <!-- <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>รีวิว</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="form_component.html">รีวิวเช็คอิน</a></li>
                          <li><a  href="form_component.html">Scoop รีวิว</a></li>
                      </ul>
                  </li> -->
                  <?php
                } else if ($this->session->userdata('M_status') =="2"){
                   ?>
                   <li class="sub-menu">
                       <a href="javascript:;" >
                           <i class="fa fa-desktop"></i>
                           <span>สถานที่น่าสนใจ</span>
                       </a>
                       <ul class="sub">
                         <?php
                           $query = $this->db->get('tb_category');
                           foreach ($query->result() as $row){
                           $id=$row->C_id;
                         ?>
                           <li>
                             <!-- <a href="#"><?php echo $row->C_name; ?></a> -->
                             <a href="<?php echo base_url('first/place/' .$id) ?>"
                             onclick="<?php echo base_url('first/place/' .$id) ?>;return false;"
                             ><?php echo $row->C_name; ?>
                             </a>
                           </li>
                         <?php
                           }
                         ?>
                       </ul>
                   </li>
                   <li class="sub-menu">
                       <a href="javascript:;" >
                           <i class="fa fa-desktop"></i>
                           <span>ข้อมูลสถานที่</span>
                       </a>
                       <ul class="sub">
                           <li><a  href="<?php echo base_url('first/addplace')?>"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;เพิ่มข้อมูลสถานที่</a></li>
                           <li><a  href="<?php echo base_url('first/searchplace')?>"><span class="glyphicon glyphicon-search"></span>&nbsp;ค้นหาข้อมูลสถานที่</a></li>
                           <li><a  href="<?php echo base_url('first/updateplace')?>"><span class="glyphicon glyphicon-cog"></span>&nbsp;แก้ไขข้อมูลสถานที่</a></li>
                           <li><a  href="<?php echo base_url('first/dropplace')?>"><span class="glyphicon glyphicon-trash"></span>&nbsp;ลบข้อมูลสถานที่</a></li>
                       </ul>
                   </li>

                   <li class="sub-menu">
                       <a href="javascript:;" >
                           <i class="fa fa-desktop"></i>
                           <span>ข้อมูลประเภท</span>
                       </a>
                       <ul class="sub">
                           <li><a  href="<?php echo base_url('first/addcategory')?>"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;เพิ่มข้อมูลประเภท</a></li>
                           <li><a  href="<?php echo base_url('first/searchcategory')?>"><span class="glyphicon glyphicon-search"></span>&nbsp;ค้นหาข้อมูลประเภท</a></li>
                           <li><a  href="<?php echo base_url('first/updatecategory')?>"><span class="glyphicon glyphicon-cog"></span>&nbsp;แก้ไขข้อมูลประเภท</a></li>
                           <li><a  href="<?php echo base_url('first/dropcategory')?>"><span class="glyphicon glyphicon-trash"></span>&nbsp;ลบข้อมูลประเภท</a></li>
                       </ul>
                   </li>

                   <li class="sub-menu">
                       <a href="javascript:;" >
                           <i class="fa fa-desktop"></i>
                           <span>ข้อมูลสมาชิก</span>
                       </a>
                       <ul class="sub">
                           <li><a  href="<?php echo base_url('first/addmember')?>"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;เพิ่มข้อมูลสมาชิก</a></li>
                           <li><a  href="<?php echo base_url('first/searchmember')?>"><span class="glyphicon glyphicon-search"></span>&nbsp;ค้นหาข้อมูลสมาชิก</a></li>
                           <li><a  href="<?php echo base_url('first/updatemember')?>"><span class="glyphicon glyphicon-cog"></span>&nbsp;แก้ไขข้อมูลสมาชิก</a></li>
                           <li><a  href="<?php echo base_url('first/dropmember')?>"><span class="glyphicon glyphicon-trash"></span>&nbsp;ลบข้อมูลสมาชิก</a></li>
                       </ul>
                   </li>

                   <li class="sub-menu">
                       <a href="<?php echo base_url('first/webboard')?>">
                           <i class="fa fa-book"></i>
                           <span>Webboard</span>
                       </a>
                   </li>
                   <li class="sub-menu">
                       <a href="javascript:;" >
                           <i class="fa fa-desktop"></i>
                           <span>รีวิว</span>
                       </a>
                       <ul class="sub">
                         <li><a href="<?php echo base_url('first/reviews') ?>"><span class="fa fa-pencil-square"></span>&nbsp;เขียนรีวิว</a></li>
                         <?php
                           $query = $this->db->get('tb_category');
                           foreach ($query->result() as $row){
                           $id=$row->C_id;
                         ?>
                           <li>
                             <!-- <a href="#"><?php echo $row->C_name; ?></a> -->
                             <a href="<?php echo base_url('first/placemember/' .$id) ?>"
                             onclick="<?php echo base_url('first/placemember/' .$id) ?>;return false;"
                             ><?php echo $row->C_name; ?>
                             </a>
                           </li>
                         <?php
                           }
                         ?>
                       </ul>
                   </li>
                   <?php
                 }elseif ($this->session->userdata('M_status') =="1") {
                    ?>
                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-desktop"></i>
                            <span>สถานที่น่าสนใจ</span>
                        </a>
                        <ul class="sub">
                          <?php
                            $query = $this->db->get('tb_category');
                            foreach ($query->result() as $row){
                            $id=$row->C_id;
                          ?>
                            <li>
                              <!-- <a href="#"><?php echo $row->C_name; ?></a> -->
                              <a href="<?php echo base_url('first/place/' .$id) ?>"
                              onclick="<?php echo base_url('first/place/' .$id) ?>;return false;"
                              ><?php echo $row->C_name; ?>
                              </a>
                            </li>
                          <?php
                            }
                          ?>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="<?php echo base_url('first/webboard')?>">
                            <i class="fa fa-book"></i>
                            <span>Webboard</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-desktop"></i>
                            <span>รีวิว</span>
                        </a>
                        <ul class="sub">
                          <li><a href="<?php echo base_url('first/reviews') ?>"><span class="fa fa-pencil-square"></span>&nbsp;เขียนรีวิว</a></li>
                          <?php
                            $query = $this->db->get('tb_category');
                            foreach ($query->result() as $row){
                            $id=$row->C_id;
                          ?>
                            <li>
                              <!-- <a href="#"><?php echo $row->C_name; ?></a> -->
                              <a href="<?php echo base_url('first/placemember/' .$id) ?>"
                              onclick="<?php echo base_url('first/placemember/' .$id) ?>;return false;"
                              ><?php echo $row->C_name; ?>
                              </a>
                            </li>
                          <?php
                            }
                          ?>
                        </ul>
                    </li>
                    <?php }else {
                    ?>
                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-desktop"></i>
                            <span>สถานที่น่าสนใจ</span>
                        </a>
                        <ul class="sub">
                          <?php
                            $query = $this->db->get('tb_category');
                            foreach ($query->result() as $row){
                            $id=$row->C_id;
                          ?>
                            <li>
                              <!-- <a href="#"><?php echo $row->C_name; ?></a> -->
                              <a href="<?php echo base_url('first/place/' .$id) ?>"
                              onclick="<?php echo base_url('first/place/' .$id) ?>;return false;"
                              ><?php echo $row->C_name; ?>
                              </a>
                            </li>
                          <?php
                            }
                          ?>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="<?php echo base_url('first/webboard')?>">
                            <i class="fa fa-book"></i>
                            <span>Webboard</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-desktop"></i>
                            <span>รีวิว</span>
                        </a>
                        <ul class="sub">
                          <?php
                            if($this->session->userdata('M_fullname') != ""){
                          ?>
                          <li><a href="<?php echo base_url('first/reviews') ?>"><span class="fa fa-pencil-square"></span>&nbsp;เขียนรีวิว</a></li>
                          <?php
                            }else{
                          ?>
                          <li><a href="<?php echo base_url('') ?>"><span class="glyphicon glyphicon-log-in"></span>&nbsp;โปรดล็อคอินก่อนนะครับ</a></li>
                          <?php
                                }
                            ?>
                          <?php
                            $query = $this->db->get('tb_category');
                            foreach ($query->result() as $row){
                            $id=$row->C_id;
                          ?>
                            <li>
                              <!-- <a href="#"><?php echo $row->C_name; ?></a> -->
                              <a href="<?php echo base_url('first/placemember/' .$id) ?>"
                              onclick="<?php echo base_url('first/placemember/' .$id) ?>;return false;"
                              ><?php echo $row->C_name; ?>
                              </a>
                            </li>
                          <?php
                            }
                          ?>
                        </ul>
                    </li>
                    <!-- <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-tasks"></i>
                            <span>รีวิว</span>
                        </a>
                        <ul class="sub">
                            <li><a  href="#">รีวิวเช็คอิน</a></li>
                            <li><a  href="#">Scoop รีวิว</a></li>
                        </ul>
                    </li> -->
                    <?php } ?>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
