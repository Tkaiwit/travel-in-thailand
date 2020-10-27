<br>
<br>
<br>
<br>
<style type="text/css">
    body{
    background-image: url('application/views/img/background.jpg');
    background-attachment: fixed;
    padding:0px;
}
</style>
 <body>
    <form action="<?php echo  base_url('first/insertMember')?>" method="POST" class="container">
    
    <from>
      <input type="search" name="submit"/>
      <input type="submit" name="search" value="ค้นหา" />
    </from>

    <h4>กรุณากรอกข้อมูลให้ครบ</h4>

      <table border="1">
        <tr>
          <td>ชื่อผุ้ใช้งาน </td>
          <td><input type="text" name="m_user"/></td>
        </tr>
        <tr>
          <td>ชื่อสมาชิก </td>
          <td><input type="text" name="m_fullname"/></td>
        </tr>
        <tr>
          <td>รหัสผ่าน </td>
          <td><input type="password" name="m_password"/></td>
        </tr>
        <tr>
          <td>อีเมล </td>
          <td><input type="text" name="m_email"/></td>
        </tr>
        <tr>
          <td>เบอร์โทร </td>
          <td><input type="text" name="m_tel"></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" name="submit" value="บันทึก" /></td>
        </tr>
      </table>
    </from>
    
    <table class="table table-condensed">
      <thead>
        <tr>
          <th>ชื่อผุ้ใช้งาน</th>
          <th>อีเมล์</th>
          <th>ชื่อ-นามสกุล</th>
          <th>เบอร์โทร</th>
          <th>ลบ</th>
          <th>แก้ไข</th>
        </tr>
      </thead>
      <tbody><?php
          $query = $this->db->get('tb_member');
          foreach ($query->result() as $row){
          $id=$row->M_user;
       ?>
        <tr>
          <td><?php echo $row->M_user; ?></td>
          <td><?php echo $row->M_email; ?></td>
          <td><?php echo $row->M_fullname; ?></td>
          <td><?php echo $row->M_tel; ?></td>
          <td>
            <button class="btn btn-info" href="<?php echo base_url ('first/dropMember/'.$id)?>">ลบข้อมูล</button>
            <a href="<?php echo base_url ('first/dropMember/'.$id)?>">ลบ</a>
          </td>
          <td><a href="<?php echo base_url ('first/editMember/'.$id)?>">แก้ไข</a>
          </td>
        </tr><?php
        }
        ?>
      </tbody>