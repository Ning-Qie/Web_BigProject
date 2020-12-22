<?php
include "include/Shop_header.php";
isshoplogin();
prt_title("修改订单-商户中心");
?>
<?php
if(!empty($_GET)) {
	$oid=$_GET['oid'];
	require"conn.php";
	$sql="select * from orders where oid='$oid'";
	// echo $sql;
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
}
?>
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
	$sql="UPDATE `orders` SET `cid`='$cid',`sid`='$sid',`ostate`='$ostate',`otime`='$otime',`oid`='$oid' WHERE `oid`='$oid'";
	// echo"$sql";
	$is=$conn->query($sql);
	if($is) {
		echo "<script>shop_edit_order_confirm();</script>";
		// header("location:Shop_order.php");
	}
	else
		echo"修改失败";
}
?>


<div class="security_content">
    <div class="security-right">
        <div data-v-4cbad597="" class="security-right-title"><span data-v-4cbad597="" class="security-right-title-icon"></span> <span data-v-4cbad597="" class="security-right-title-text">我的信息</span>
        </div>
        <div class="user-setting-warp">
            <div>
                <form class="el-form clearfix" method="post" action="Shop_edit_order.php">
					<input type="hidden" name="oid" value="<?php echo $row['oid']; ?>"><br>
					<input type="hidden" name="cid" value="<?php echo $row['cid']; ?>">
					<input type="hidden" name="sid" value="<?php echo $row['sid']; ?>">
					<input type="hidden" name="fid" value="<?php echo $row['fid']; ?>">
					<input type="hidden" name="otime" value="<?php echo $row['otime']; ?>">
					<input type="hidden" name="fnum" value="<?php echo $row['fnum']; ?>">
                    <div class="el-form-item user-nick-rel-name"><label class="el-form-item__label">订单号:</label>
                        <div class="el-form-item__content"><span class="userinfo-username"><?php echo $row['oid']; ?></span>
                        </div>
                    </div>
                    <div class="el-form-item user-my-sex"><label class="el-form-item__label">订单状态:</label>
                        <div class="el-form-item__content">
                            <div class="el-radio-group">
								<label class="el-radio-button">
									<input type="radio" class="el-radio-button__orig-radio" name="ostate" value="2" <?php if($row['ostate']==2) echo "checked='checked'"?>>
									<span class="el-radio-button__inner">已接单</span>
								</label> 
								<label class="el-radio-button">
									<input type="radio" class="el-radio-button__orig-radio" name="ostate" value="3" <?php if($row['ostate']==3) echo "checked='checked'"?>>
									<span class="el-radio-button__inner">已完成</span>
								</label>
                            </div>
                        </div>


                        <div class="el-form-item user-my-btn">
                            <div class="el-form-item__content">
                                <div class="padding-dom"></div>
                                <div class="user-my-btn-warp">
                                    <input type="submit" value="修改" name="sub" class="el-button el-button--primary">
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- <div class="shop-content">
<form method="post" action="Shop_edit_order.php">
	订单id：<?php echo $row['oid']; ?>
	<input type="hidden" name="oid" value="<?php echo $row['oid']; ?>"><br>
	<input type="hidden" name="cid" value="<?php echo $row['cid']; ?>">
	<input type="hidden" name="sid" value="<?php echo $row['sid']; ?>">
	<input type="hidden" name="fid" value="<?php echo $row['fid']; ?>">
	<input type="hidden" name="otime" value="<?php echo $row['otime']; ?>">
	<input type="hidden" name="fnum" value="<?php echo $row['fnum']; ?>">
	订单状态：
	<input type="radio" name="ostate" value="2" <?php if($row['ostate']==2) echo "checked='checked'"?>>已接单
	<input type="radio" name="ostate" value="3" <?php if($row['ostate']==3) echo "checked='checked'"?>>已完成<br>
	<input type="submit" name="sub" value="提交修改">
</form>
</div> -->

