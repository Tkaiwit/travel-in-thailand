<?php
	// กำหนดส่วนที่ 1
	$page=empty($_GET['page'])?1:$_GET['page'];
	$each=_NUM_PAGE;
?>
<ul class="breadcrumb">
  <li>
    <a href="index.php?mod=webboard">หน้าเว็บบอร์ด</a> <span class="divider">/</span>
  </li>
  <li class="active">
    <a href="#">กระทู้</a>
  </li>
</ul>
<h3><center>กระดานถาม-ตอบ</center></h3>
<i class="icon-plus-sign"></i>&nbsp;<a href="index.php?mod=webboard&name=post">ตั้งกระทู้ใหม่</a>
<table class="table">
	<tr>
		<th style="width:350px;">หัวข้อ(อ่าน/ตอบ)</th>
		<th style="width:100px;">โดย</th>
		<th style="width:150px;">วันที่</th>
	</tr>
	<?php
// 	function ConnectDB(){
// // $query = $this->db->query('SELECT * FROM tb_board ORDER BY B_id DESC');
// // 		$this->load->database($config);
// 		$sql = $this->db->connect(localhost,root,tom251139) or die("ไม่สามารถเชื่อมต่อ MySQL ได้");
// // 	// $this->db->select(db) or die("ไม่สามารถเลือกฐานข้อมูลที่ต้องการได้");
// // 	// mysqli_query("SET NAMES UTF8");
// // 	// mysqli_query("SET character_set_results=utf-8");
// // 	return true;
// }
	function SelectPage($Pages="",$Eachs="",$Field="",$Table="",$Where=""){
    $Field = empty($Field)? "id" : $Field;
    $Where = empty($Where)? "" : "WHERE ".$Where;
    // ConnectDB();
    $SQL = QueryDB("SELECT ".$Field." FROM ".$Table." ".$Where."");
    $Rows = RowsDB($SQL);
    $Totals = ceil($Rows/$Eachs);
    $Gotos=($Pages-1)* $Eachs;
    // CloseDB();
    return array($Gotos,$Totals);
}
function QueryDB($sql=""){
	if ($res = $this->db->query($sql)){
       return $res;
    }else{
       return false;
    }
}
	 ?>
<?php
// กำหนดส่วนที่ 2
	List($goto,$totalpage) = SelectPage($page,$each,"",WEBBOARD,"");

	ConnectDB();
	$sql = "SELECT b.id,b.title,b.create_time,b.update_time,b.views,u.username As name FROM ".WEBBOARD." As b INNER JOIN ".USER." As u ON(b.author_id=u.id) ORDER BY id DESC LIMIT ".$goto.",".$each;
	$db_query=QueryDB($sql);
	//$num_rows= @mysql_num_rows($db_query);
	while($result = FetchDB($db_query)){
		$comment=QueryDB("SELECT COUNT(id) AS sum FROM ".COMMENT." WHERE topicid='".$result['id']."'");
		$count = FetchDB($comment);
?>
	<tr>
		<td>
		<?php echo sprintf("%04d",$result['id']);?>&nbsp;:<a href="index.php?mod=webboard&name=read&id=<?php echo $result['id']?>"><?php echo $result['title']?></a>&nbsp;(<?php echo $result['views']."/".$count['sum']?>)</td>
		<td align="center"><?php echo $result['name']?></td>
		<td align="center"><?php echo ThaiTimeConvert($result['create_time'],"","2");?></td>
	</tr>
<?php
	} //Cloes While
CloseDB();
?>
</table>
<?php
	// กำหนดส่วนที่ 3
	echo SplitPage($page,$totalpage,"index.php?mod=webboard");
?>
