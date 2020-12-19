<head>
    <link type="text/css" rel="stylesheet" href="css/blog.css">
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
        </div>
    </div>
</header>