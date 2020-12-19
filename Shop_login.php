<?php 
include "include/Shop_header.php";
prt_title("登录-商户中心");
?>
<div class="shop-content">
<form method="post" action="Shop_login.php">
	商家id:<input type="text" name="userid"><br>
	密码:<input type="password" name="password"><br>
	<input type="submit" value="登录" name="">
</form>
</div>

<!--  login函数 -->
<?php
    @session_start();
    if(isset($_SESSION['valid_shop'])){
        // echo "登录成功";
        echo "<script>go_somepage(1,'Shop_show.php');</script>";
    }
    //如果不存在，则登录
    else{
        // echo "正在登录";
        shop_login();
    }
?>
