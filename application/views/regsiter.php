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
     background-image:url('../application/views/img/slider-00.jpg');
     margin:55px 0px ; padding:0px;
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
               <p class="login__input name">สมัครสมาชิก</p>
               <form action="<?php echo  base_url('first/addregsiter')?>" method="POST">
                             <div class="login__row">
                               <svg class="login__icon name svg-icon" viewBox="0 0 20 20">

                               </svg>
                               <input type="text" class="login__input name" placeholder="กรอกชื่อผุ้ใช้งานของคุณ" required="required" name="m_user"
                               id="txt_username"/>
                             </div>
                             <div class="login__row">
                                  <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">

                                  </svg>
                                  <input type="password" class="login__input pass" placeholder="กรอกรหัสผ่านของคุณ" required="required" name="m_password"
                                  id="txt_password"/>
                             </div>
                             <div class="login__row">
                               <svg class="login__icon name svg-icon" viewBox="0 0 20 20">

                               </svg>
                               <input type="text" class="login__input name" placeholder="กรอกชื่อ-นามสกุลของคุณ" required="required" name="m_fullname"
                               id="txt_username"/>
                             </div>
                             <div class="login__row">
                               <svg class="login__icon name svg-icon" viewBox="0 0 20 20">

                               </svg>
                               <input type="email" class="login__input name" placeholder="กรอกอีเมล์ของคุณ" required="required" name="m_email"
                               id="txt_username"/>
                             </div>
                             <div class="login__row">
                               <svg class="login__icon name svg-icon" viewBox="0 0 20 20">

                               </svg>
                               <input type="text" class="login__input name" placeholder="กรอกที่อยู่ของคุณ" required="required" name="m_address"
                               id="txt_username"/>
                             </div>
                             <div class="login__row">
                               <svg class="login__icon name svg-icon" viewBox="0 0 20 20">

                               </svg>
                               <input type="text" class="login__input name" placeholder="กรอกเบอร์โทรของคุณ" required="required" name="m_tel"
                               id="txt_username"/>
                             </div>
                             <div class="login__row" hidden="">
                               <svg class="login__icon name svg-icon" viewBox="0 0 20 20">

                               </svg>
                               <input type="text" class="login__input name" placeholder="กรอกอายุของคุณ" value="1" name="m_status"
                               id="txt_username"/>
                             </div>
                             <div class="checkbox">
                                 <label>
                               <input type="checkbox" id="terms"  data-error="Before you wreck yourself" required>
                              <p style="font-size:15px; color:White;">ยืนยันข้อมูลถุกต้อง?</p>
                                 </label>
                           <div class="help-block with-errors"></div>
                             </div>
                             <button type="submit" class="login__submit" name="btn_login" value="Login">Register Now</button>
               </form>
          </div>
     </div>
</div>
<!--load jQuery library-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--load bootstrap.js-->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
