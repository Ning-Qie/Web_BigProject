<!-- <a href="index.php">回到首页</a> -->
<?php include "include/head.php"?>

<?php
    @session_start();
    unset($_SESSION['valid_user']);
    // echo "注销成功";
    echo "<script>go_somepage(1,'index.php');</script>";
?>