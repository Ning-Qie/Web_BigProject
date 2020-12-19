<?php
if(!empty($_GET)) {
	$fid=$_GET['fid'];
	require"conn.php";

	$sql="select * from food where fid=$fid";
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
}
?>

<form method="post" action="Shop_Food_edit.php">
	菜品名称：<input type="text" name="fname" value="<?php echo $row['fname']; ?>"><br>
	<input type="hidden" name="fid" value="<?php echo $row['fid']; ?>">
	<input type="hidden" name="sid" value="<?php echo $row['sid']; ?>">
	<input type="hidden" name="soldnum" value="<?php echo $row['soldnum']; ?>">
	<input type="hidden" name="fpic" value="<?php echo $row['fpic']; ?>">
	销售状态：(0-停止销售，1-正在销售)<input type="text" name="onsale" value="<?php echo $row['onsale']; ?>"><br>
	菜品简介：<textarea name="fdes"><?php echo $row['fdes']; ?></textarea><br>
	价格：<input type="text" name="price" value="<?php echo $row['price']; ?>"><br>
	<input type="submit" name="sub" value="提交修改">
</form>

<?php
if(!empty($_POST['sub'])) {
	$fid=$_POST['fid'];
	$sid=$_POST['sid'];
	$fname=$_POST['fname'];
	$soldnum=$_POST['soldnum'];
	$onsale=$_POST['onsale'];
	$fdes=$_POST['fdes'];
	$fpic=$_POST['fpic'];
	$price=$_POST['price'];


	require"conn.php";
	//"UPDATE `food` SET `fid`='$fid',`sid`='$sid',`fname`='$fname',`soldnum`='$soldnum',`onsale`='$onsale',`fdes`='$fdes',`fpic`='$fpic',`price`='$fpic' WHERE `fid`=$fid";
	$sql="UPDATE `food` SET `fid`='$fid',`sid`='$sid',`fname`='$fname',`soldnum`='$soldnum',`onsale`='$onsale',`fdes`='$fdes',`fpic`='$fpic',`price`='$price' WHERE `fid`=$fid";
	echo"$sql";
	$is=$conn->query($sql);
	if($is) {
		header("location:Shop_show.php");
	}
	else
		echo"修改失败";
}
?>