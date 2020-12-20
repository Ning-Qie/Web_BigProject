<?php
    include "include/head.php";
    islogin();
    prt_title("个人信息修改");
?>

<?php
    $ctel = $_POST['ctel'];
    $cid = $_POST['cid'];
    $cpwd = $_POST['cpwd'];
    $sex = $_POST['sex'];
    $cname = $_POST['cname'];
    $caddr = $_POST['caddr'];
    $conn = new mysqli('localhost', 'root', '', 'waimai_db');
    $conn->query("set names utf8");
    $sql="UPDATE `customer` SET `ctel`='$ctel',`cname`='$cname',`caddr`='$caddr',`cpwd`='$cpwd',`sex`='$sex' WHERE `cid`=$cid";
    $result=$conn->query($sql);
    echo "账号信息修改成功！<br>";//应该重置session来重新登录
    @session_start();
    unset($_SESSION['valid_user']);
    echo "<script>go_somepage(1,'account_login.php');</script>";
?>