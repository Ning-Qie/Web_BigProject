<header>
    <!-- Dropdown Structure -->
    <ul id="个人中心" class="dropdown-content">
        <li><a href="#!">个人信息</a></li>
        <li class="divider"></li>
        <li><a href="#!">我的订单</a></li>
        <li class="divider"></li>
        <li><a href="#!">我的餐车</a></li>
    </ul>
    <nav class="white " role="navigation">
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo"><?php echo $site_name?></a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a href="account_login.php">
                        
                        登录
                </a>
                </li>
                <li>
                    <a href="account_register.php">
                        注册
                    </a>
                </li>
                <!-- Dropdown Trigger -->
                <li>
                    <a class="dropdown-button" href="#!" data-activates="个人中心">
                        <i class="material-icons left">perm_identity</i>
                        个人中心
                        <i class="material-icons right">
                            arrow_drop_down
                        </i>
                    </a>
                </li>
                <li>
                    <a href="account_register.php">
                        商户服务
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>