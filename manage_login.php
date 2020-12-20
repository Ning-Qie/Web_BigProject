<?php
include "include/manage_header.php";
prt_title("管理员登录");
?>


<div id="loginform">
    <form id="logform" action="manage_login.php" method="post">
        <div id="forminfo">
            <br>用户名:
            <input type="text" name="userid">
            <br>密码:
            <input type="password" name="password">
        </div>
        <br>
        <input type="submit" value="登录">
        <br>
    </form>
</div>


<!--  login函数 -->
<?php
    if(isset($_SESSION['valid_manage'])){
        echo "<script>go_somepage(1,'manage.php');</script>";
    }
    //如果不存在，则登录
    else{
        // echo "正在登录";
        login();
    }
?>

<?php
    function login(){
        if(isset($_POST['userid']) and isset($_POST['password'])){
            $userid=$_POST['userid'];
            $password=$_POST['password'];
            if($userid=='123456' and $password=='654321'){
                $_SESSION['valid_manage']='123456';
                echo "<script>go_somepage(1,'manage.php');</script>";
            }
        }
    }
?>
