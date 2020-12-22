<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "include/variable.php"?>
    <?php include "include/func.php"?>
    <link rel="icon" href="<?php echo $site_favicon ?>">
    <link type="text/css" rel="stylesheet" href="css/blog.css">
    <link type="text/css" rel="stylesheet" href="css/shop.css">
    <script type="text/javascript" src="js/main.js"></script>
</head>
<style>
    .navbar-container a{
        color:black;
    }
    a{
        color:darkseagreen;
    }
</style>
<header id="header" class="header bg-white">
    <div class="navbar-container">
        <a href="manage.php" id="header-site-title" class="navbar-logo">
            管理中心
        </a>
        <div class="navbar-menu">
            <?php
                @session_start();
                if(isset($_SESSION['valid_manage'])){
                    echo "<a href='javascript:manage_logout_confirm()'>注销</a>";
                }
                else{
                    echo "<a href='manage_login.php'>登录</a>";
                }
            ?>
            <a href="manage_cust.php">管理用户</a>
            <a href="manage_shop.php">管理商家</a>
            <a href="manage_recom.php">菜品推荐</a>
            <a href="index.php">外卖平台</a>
        </div>
    </div>
</header>