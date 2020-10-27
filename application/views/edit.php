<h1>อัพเดตข้อมูลสมาชิก</h1>
<?php
$query = $this->db->query("SELECT * FROM tbmember WHERE m_id = $id");
foreach ($query->result()as $row) {
  $id = $row->m_id;
?>

<form action="<?php echo  base_url('first/updateMember/'.$id)?>" method="POST">
  ชื่อสมาชิก <input type="text" value="<?php echo $row->m_name; ?>" name="m_name"/>
  อีเมล์ <input type="email" value="<?php echo $row->m_email; ?>" name="m_email"/>
  <input type="submit" name="submit"/>
</form>
<?php } ?>

