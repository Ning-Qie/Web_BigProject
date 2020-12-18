<?php
    // 打印标题
    function prt_title($t){
        echo "<head><title>".$t."</title></head>";
    }
    // 判断登录状态
    function islogin(){
        @session_start();
        if(isset($_SESSION['valid_user'])){
            $cid = $_SESSION['valid_user'];
            // echo $cid;
        }
        //如果不存在，则登录
        else{
            echo "<script>go_somepage(1,'account_login.php');</script>";
        }
    }
?>

