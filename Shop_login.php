<?php 
include "include/Shop_header.php";
prt_title("登录-商户中心");
?>

<div class="security_content">
    <div class="security-right">
        <div data-v-4cbad597="" class="security-right-title"><span data-v-4cbad597="" class="security-right-title-icon"></span> <span data-v-4cbad597="" class="security-right-title-text">登录</span>
        </div>
        <div class="user-setting-warp">
            <div>
                <form class="el-form clearfix" method="post" action="Shop_login.php">
                    <div class="el-form-item user-nick-name"><label class="el-form-item__label">用户名:</label>
                        <div class="el-form-item__content">
                            <div class="el-input">
                                <input autocomplete="off" placeholder="账户ID" type="text" rows="2" maxlength="16" validateevent="true" class="el-input__inner" name="userid">
                            </div> <span class="nick-name-not"> </span>
                        </div>
                    </div>
                    <div class="el-form-item user-nick-name"><label class="el-form-item__label">密码:</label>
                        <div class="el-form-item__content">
                            <div class="el-input">
                                <input autocomplete="off" placeholder="密码" rows="2" maxlength="16" validateevent="true" class="el-input__inner" type="password" name="password">
                            </div> <span class="nick-name-not"> </span>
                        </div>
                    </div>
                    <div class="el-form-item user-my-btn">
                        <div class="el-form-item__content">
                            <div class="padding-dom"></div>
                            <div class="user-my-btn-warp">
                                <input type="submit" value="登录" class="el-button el-button--primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--  login函数 -->
<?php
    @session_start();
    if(isset($_SESSION['valid_shop'])){
        // echo "登录成功";
        echo "<script>go_somepage(1,'Shop_show.php');</script>";
    }
    //如果不存在，则登录
    else{
        // echo "正在登录";
        shop_login();
    }
?>
