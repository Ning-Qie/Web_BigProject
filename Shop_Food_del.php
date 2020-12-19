<?php
if(!empty($_GET)) {
	$id=$_GET['fid'];
	require"conn.php";

	$sql="delete from food where fid=$id";

	$is=$conn->query($sql);
	if($is) {
		header("location:Shop_show.php");
	}
	else
		echo"删除失败";
}
?>

