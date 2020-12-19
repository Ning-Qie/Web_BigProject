<?php 
include "include/Shop_header.php";
isshoplogin();
prt_title("修改订单-商户中心");
?>
<?php
if(!empty($_GET)) {
	$oid=$_GET['oid'];
	require"conn.php";

	$sql="select * from orders where oid=$oid";
	// echo $sql;
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
}
?>



<div class="shop-content">
<form method="post" action="Shop_edit_order.php">
	订单id：<?php echo $row['oid']; ?>
	<input type="hidden" name="oid" value="<?php echo $row['oid']; ?>"><br>
	<input type="hidden" name="cid" value="<?php echo $row['cid']; ?>">
	<input type="hidden" name="sid" value="<?php echo $row['sid']; ?>">
	<input type="hidden" name="fid" value="<?php echo $row['fid']; ?>">
	<input type="hidden" name="otime" value="<?php echo $row['otime']; ?>">
	<input type="hidden" name="fnum" value="<?php echo $row['fnum']; ?>">
	订单状态：
	<input type="radio" name="ostate" value="2">已接单
	<input type="radio" name="ostate" value="3">已完成<br>
	<input type="submit" name="sub" value="提交修改">
</form>
</div>


<?php
if(!empty($_POST['sub'])) {
	$oid=$_POST['oid'];
	$cid=$_POST['cid'];
	$sid=$_POST['sid'];
	$fid=$_POST['fid'];
	$ostate=$_POST['ostate'];
	$otime=$_POST['otime'];
	$fnum=$_POST['fnum'];

	require"conn.php";
	//"UPDATE `orders` SET `cid`='$cid',`sid`='$sid',`fid`='$fid',`ostate`='$ostate',`otime`='$otime',`fnum`='$fnum',`oid`='$oid' WHERE `oid`=$oid";
	$sql="UPDATE `orders` SET `cid`='$cid',`sid`='$sid',`fid`='$fid',`ostate`='$ostate',`otime`='$otime',`fnum`='$fnum',`oid`='$oid' WHERE `oid`=$oid";
	echo"$sql";
	$is=$conn->query($sql);
	if($is) {
		header("location:Shop_order.php");
	}
	else
		echo"修改失败";
}
?>

