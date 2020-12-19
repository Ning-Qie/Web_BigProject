<?php include "include/head.php"?>

<form method="post" action="Shop_login.php">
	商家id:<input type="text" name="userid"><br>
	密码:<input type="password" name="password"><br>
	<input type="submit" value="登录" name="">
</form>


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

<?php
    @session_start();//启动session会话
    function shop_login(){
        if(isset($_POST['userid']) and isset($_POST['password'])){
            $userid=$_POST['userid'];
            $password=$_POST['password'];
            //连接数据库
            $conn = new mysqli('localhost','root','','waimai_db');
            if ($conn->connect_errno){
                die("数据库连接失败：".$conn->connect_errno);
            }
            // echo "数据库连接成功";
            $conn->query("set names utf8");
            //查询数据库
            $sql="select * from shop where sid='$userid' and spwd='$password'";
            $result=$conn->query($sql);
            if($result->num_rows){
                $_SESSION['valid_shop']=$userid;
                echo "<script>go_somepage(1,'Shop_show.php');</script>";
            }
            $conn->close();
        }
    }
?>
