<!-- Logout -->
<?php
include "include/manage_header.php";
ismanagelogin();
Logout();
    function Logout(){
        @session_start();
        unset($_SESSION['valid_manage']);
        // echo "注销成功";
        echo "<script>go_somepage(1,'manage_login.php');</script>";
    }
?>