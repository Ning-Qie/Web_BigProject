<header>
    <div class="csr-header">
        <div class="header-content">
            <div id="left">
                <!-- <div class="logo-pic"></div> -->
            </div>
            <div id="right">
                <ul id="links">
                    <li id="header-link-0"><a href="index.php"><i class="fas fa-home"></i>首页</a></li>
                    <?php
                        @session_start();
                        if(isset($_SESSION['valid_user'])){
                            echo "<li id='header-link-1'><a href='javascript:account_logout_confirm()'><i class='fas fa-sign-out-alt'></i>注销</a></li>";
                        }else{
                            echo "<li id='[header-link-1'><a href='account_login.php'><i class='fas fa-user-circle'></i>登录</a></li>";
                        }
                    ?>
                    <li id="header-link-2"><a href="account_register.php"><i class="fas fa-atom"></i>注册</a></li>
                    <div id="sub-links-3" class="sub-links">
                        <li id="header-link-3"><a href="#!"><i class="fas fa-info-circle"></i>个人中心</a></li>
                        <div id="sub-link-list-3" class="sub-link-list">
                            <li class="sub-link"><a href="account_info_show.php">个人信息</a></li>
                            <li class="sub-link"><a href="Trolley_order_show.php">我的订单</a></li>
                            <li class="sub-link"><a href="Trolley.php">我的餐车</a></li>
                        </div>
                    </div>
                    <li id="header-link4"><a href="Shop_login.php" target="_blank"><i class="fas fa-store-alt"></i>商户服务</a></li>
                    <li id="header-link5"><a href="manage.php" target="_blank"><i class="fas fa-user-cog"></i>管理</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>