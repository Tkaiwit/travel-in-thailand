<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-9 main-chart">
              <form id="new_topic" name="new_topic" action="<?php echo  base_url('first/inserttopic')?>" method="POST">
          <table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#000000">
              <tr>
                  <td>
                      <table width="100%" border="0" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
                          <tr style="background-color: #FF8000; color: #F2F2F2; font-size: 20px;">
                              <td colspan="2">
                                <p><b>&nbsp;&nbsp;&nbsp;ตั้งกระทู้</b></p>

                              </td>
                              <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </td>
                          </tr>
                          <tr class="bg-info">
                              <td width="30%" style="text-align: right;">
                                <strong>ชื่อหัวข้อกระทู้&nbsp;&nbsp;&nbsp;&nbsp; </strong>
                              </td>
                              <td width="70%">
                                <input name="topic" type="text" id="topic" size="50" class="form-control" />
                              </td>
                              <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </td>
                          </tr>
                          <tr><td></td></tr>
                          <tr class="bg-info">
                              <td valign="top" style="text-align: right;">
                                <strong>รายละเอียด&nbsp;&nbsp;&nbsp;&nbsp; </strong>
                              </td>
                              <td>
                                <textarea name="detail" cols="50" rows="15" id="detail" class="form-control"></textarea>
                              </td>
                              <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </td>
                          </tr>
                          <!-- <tr class="bg-info">
                              <td style="text-align: right;"><strong>ชื่อผู้ตั้งกระทู้&nbsp;&nbsp;&nbsp;&nbsp; </strong></td>
                              <td><input name="name" type="text" id="name" size="50" class="form-control" /></td>
                              <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </td>
                          </tr> -->
                          <tr class="bg-info" hidden="hidden">
                              <td style="text-align: right;"><strong>ชื่อผู้ตั้งกระทู้&nbsp;&nbsp;&nbsp;&nbsp; </strong></td>
                              <td><input name="M_fullname" type="text" id="M_fullname" size="50" class="form-control"
                                 value="<?php echo $this->session->userdata('M_fullname');?>" /></td>
                              <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </td>
                          </tr>
                          <!-- <tr class="bg-info">
                              <td style="text-align: right;"><strong>อีเมล์ผู้ตั้งกระทู้ &nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
                              <td><input name="email" type="text" id="email" size="50" class="form-control" /></td>
                              <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </td>
                          </tr> -->
                          <tr class="bg-info">
                              <td>&nbsp;</td>
                              <td>
                                  <button type="submit" class="btn btn-success btn-md" name="Submit"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp;บันทึกข้อมูล</button>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <button type="reset" class="btn btn-danger btn-md" name="Submit2"><span class="glyphicon glyphicon-remove"></span>&nbsp;ล้างข้อมูล</button>
                              </td>
                                  <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  </td>
                          </tr>
                      </table>
                  </td>
              </tr>
              <tr>
                <td>
                  <a href="<?php echo base_url('first/webboard') ?>"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back To Webboard</a>
                </td>
              </tr>
          </table>
      </form>

            </div>
            <!-- /col-lg-9 END SECTION MIDDLE -->
