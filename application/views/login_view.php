<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Welcome To Travle In Thailand</title>
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/stylee.css")?>">
     <style type="text/css">

body {
     background-image:url('application/views/img/slider-01.jpg');
     margin:160px 0px ; padding:0px;
     }
     .colbox {
          margin-left: 0px;
          margin-right: 0px;
     }
     .center {
    margin: auto;
    width: 28%;/*
    border: 3px solid #73AD21;*/
    padding: 10px;
}
.login {
  position: relative;
  height: 100%;
  background: -webkit-linear-gradient(top, rgba(146, 135, 187, 0.8) 0%, rgba(0, 0, 0, 0.6) 100%);
  background: linear-gradient(to bottom, rgba(146, 135, 187, 0.8) 0%, rgba(0, 0, 0, 0.6) 100%);
  -webkit-transition: opacity 0.1s, -webkit-transform 0.3s cubic-bezier(0.17, -0.65, 0.665, 1.25);
  transition: opacity 0.1s, -webkit-transform 0.3s cubic-bezier(0.17, -0.65, 0.665, 1.25);
  transition: opacity 0.1s, transform 0.3s cubic-bezier(0.17, -0.65, 0.665, 1.25);
  transition: opacity 0.1s, transform 0.3s cubic-bezier(0.17, -0.65, 0.665, 1.25), -webkit-transform 0.3s cubic-bezier(0.17, -0.65, 0.665, 1.25);
  -webkit-transform: scale(1);
          transform: scale(1);
}
     </style>
</head>
<body>
<div class="container">
     <div class="row">
          <div class="center login">
          <?php
          $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
          echo form_open("first/checklogin", $attributes);?>

               <p class="login__input name" style="text-align:center; text-size: 30px;">Login</p>
               <div class="login__row">
                    <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                         <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                    </svg>
                    <input type="text" class="login__input name" placeholder="Username" required="required" value="<?php echo set_value('txt_username'); ?>" name="txt_username"
                    id="txt_username"/>
                    <span class="text-danger"><?php echo form_error('txt_username'); ?></span>
               </div>
               <div class="login__row">
                    <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
                         <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
                    </svg>
                    <input type="password" class="login__input pass" placeholder="Password" required="required" value="<?php echo set_value('txt_password'); ?>" name="txt_password"
                    id="txt_password"/>
                    <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
               </div>
               <button type="submit" class="login__submit" name="btn_login" value="Login">Sign in</button>
               <p class="login__signup">เข้าสู่ระบบด้วย&nbsp;<a href="<?php echo base_url('first/general')?>">ผู้ใช้ทั่วไป</a></p>
               <p class="login__signup">Don't have an account? &nbsp;<a href="<?php echo base_url('first/regsiter')?>">Sign up</a></p>

          <?php echo form_close(); ?>
          <?php echo $this->session->flashdata('msg'); ?>
          </div>
     </div>
</div>
<!--load jQuery library-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--load bootstrap.js-->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
