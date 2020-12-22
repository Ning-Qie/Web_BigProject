<?php
include "include/Shop_header.php";
isshoplogin();
prt_title("编辑菜品-商户中心");
?>
<?php
if (!empty($_GET)) {
	$fid = $_GET['fid'];
	require "conn.php";

	$sql = "select * from food where fid=$fid";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
}
?>
<?php
if (!empty($_POST['sub'])) {
	$fid = $_POST['fid'];
	$sid = $_POST['sid'];
	$fname = $_POST['fname'];
	$soldnum = $_POST['soldnum'];
	$onsale = $_POST['onsale'];
	$fdes = $_POST['fdes'];
	$fpic = $_POST['fpic'];
	$price = $_POST['price'];


	require "conn.php";
	//"UPDATE `food` SET `fid`='$fid',`sid`='$sid',`fname`='$fname',`soldnum`='$soldnum',`onsale`='$onsale',`fdes`='$fdes',`fpic`='$fpic',`price`='$fpic' WHERE `fid`=$fid";
	$sql = "UPDATE `food` SET `fid`='$fid',`sid`='$sid',`fname`='$fname',`soldnum`='$soldnum',`onsale`='$onsale',`fdes`='$fdes',`fpic`='$fpic',`price`='$price' WHERE `fid`=$fid";
	echo "$sql";
	$is = $conn->query($sql);
	if ($is) {
		echo "<script>shop_food_edit_confirm();</script>";
		// header("location:Shop_Food_edit.php?fid=$fid");
	} else
		echo "修改失败";
}
?>

<div class="security_content">
	<div class="security-right">
		<div data-v-4cbad597="" class="security-right-title"><span data-v-4cbad597="" class="security-right-title-icon"></span> <span data-v-4cbad597="" class="security-right-title-text">我的信息</span>
		</div>
		<div class="user-setting-warp">
			<div>
				<form class="el-form clearfix" method="post" action="Shop_Food_edit.php">
					<input type="hidden" name="fid" value="<?php echo $row['fid']; ?>">
					<input type="hidden" name="sid" value="<?php echo $row['sid']; ?>">
					<input type="hidden" name="soldnum" value="<?php echo $row['soldnum']; ?>">
					<input type="hidden" name="fpic" value="<?php echo $row['fpic']; ?>">
					<div class="el-form-item user-nick-name"><label class="el-form-item__label">菜品名称:</label>
						<div class="el-form-item__content">
							<div class="el-input">
								<input autocomplete="off" placeholder="菜品名称" type="text" rows="2" maxlength="16" validateevent="true" class="el-input__inner" name="fname" value="<?php echo $row['fname']; ?>">
							</div> <span class="nick-name-not"> </span>
						</div>
					</div>
					<div class="el-form-item user-nick-name"><label class="el-form-item__label">价格:</label>
						<div class="el-form-item__content">
							<div class="el-input">
								<input autocomplete="off" placeholder="价格" type="text" rows="2" maxlength="16" validateevent="true" class="el-input__inner" name="price" value="<?php echo $row['price']; ?>">
							</div> <span class="nick-name-not"> </span>
						</div>
					</div>
					<div class="el-form-item user-my-sex"><label class="el-form-item__label">销售状态:</label>
						<div class="el-form-item__content">
							<div class="el-radio-group"><label class="el-radio-button"><input type="radio" class="el-radio-button__orig-radio" name="onsale" value="0" <?php if ($row['onsale'] == '0') echo "checked='checked'" ?>><span class="el-radio-button__inner">停止销售</span></label> <label class="el-radio-button"><input type="radio" class="el-radio-button__orig-radio" name="onsale" value="1" <?php if ($row['onsale'] == '1') echo "checked='checked'" ?>><span class="el-radio-button__inner">正在销售</span></label>
							</div>
						</div>
						<div class="el-form-item user-my-sign"><label class="el-form-item__label">菜品简介:</label>
							<div class="el-form-item__content">
								<div class="el-textarea"><textarea name="fdes" placeholder="菜品简介" type="textarea" rows="2" autocomplete="off" validateevent="true" class="el-textarea__inner"><?php echo $row['fdes']; ?></textarea></div>
							</div>
						</div>
						<div class="el-form-item user-my-btn">
							<div class="el-form-item__content">
								<div class="padding-dom"></div>
								<div class="user-my-btn-warp">
									<input type="submit" name="sub" value="提交修改" class="el-button el-button--primary">
								</div>
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>




