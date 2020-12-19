<?php include "include/Shop_header.php"?>
<?php isshoplogin(); ?>

<?php
    @session_start();
    unset($_SESSION['valid_shop']);
    // echo "注销成功";
    echo "<script>go_somepage(1,'Shop_show.php');</script>";
?>