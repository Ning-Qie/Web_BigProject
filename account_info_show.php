<?php
        include "include/head.php";
        include "include/header.php";
        islogin();
        prt_title("个人信息");
?>

<?php
@session_start();
$cid = $_SESSION['valid_user'];
$conn = new mysqli('localhost', 'root', '', 'waimai_db');
$conn->query("set names utf8");
$sql="select * from customer where cid='$cid'";
$result=$conn->query($sql); 
$row = $result->fetch_assoc();
?>

<div class="ning-content">
<form id="logform" action="account_info_change.php" method="post" onsubmit="return account_info_change_confirm()">
用户名：<input type="text" name="cname" value="<?php echo $row['cname']; ?>"><br>
密码：<input type="password" name="cpwd" value="<?php echo $row['cpwd']; ?>"><br>
性别:<input type="radio" name="sex" value="男" <?php if($row['sex']=='男') echo "checked='checked'"?> />男
        <input type="radio" name="sex" value="女" <?php if($row['sex']=='女') echo "checked='checked'"?>/>女
<br>联系电话：<input type="text" name="ctel" value="<?php echo $row['ctel']; ?>"><br>
地址：<input type="text" name="caddr" value="<?php echo $row['caddr']; ?>"><br>
<input type="hidden" name="cid" value="<?php echo $row['cid']; ?>">
<input type="submit" value="修改"><br>
</form>
</div>