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
<header id="header" class="header bg-white">
    <div class="navbar-container">
        <a href="Shop_show.php" id="header-site-title" class="navbar-logo">
            商户中心
        </a>
        <div class="navbar-menu">
            <?php
                @session_start();
                if(isset($_SESSION['valid_shop'])){
                    echo "<a href='Shop_logout.php'>注销</a>";
                }
                else{
                    echo "<a href='Shop_login.php'>登录</a>";
                }
            ?>
            <a href="Shop_show.php">菜品管理</a>
            <a href="Shop_Food_add.php">发布菜品</a>
            <a href="Shop_order.php">订单管理</a>
            <a href="index.php">外卖平台</a>
        </div>
    </div>
</header>