<!DOCTYPE html>
<html>
<?php include "include/head.php"?>
<?php prt_title("用户登录"); ?>

<body>
    <?php include "include/header.php"?>
    <div class="login-main">
        <!--login-box-->
        <div class="login-wrap">
            <div class="mid-out">
                <div class="mid-in" id="J_login_container" 
                    style="width:290px;height:345.5px;border:1px solid #ebebeb;background:#ffffffe0;padding:5px 0;">
                    <div class="login-section">
                        <form >
                            <div class="form-field form-field--icon phone-input-wrapper">
                                <input type="text" id="login-email" class="f-text phone-input" name="email" placeholder="账号" value="" maxlength="15" autocomplete="off" style="background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: pointer;">
                            </div>
                            <div class="form-field form-field--icon phone-input-wrapper">
                                <i class="icon icon-password"></i>
                                <input type="password" id="login-password" class="f-text pw-input" name="password" placeholder="密码" autocomplete="off" style="background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: pointer;">
                            </div>
                            <div class="form-field form-field--ops">
                                <input type="submit" class="btn" name="commit" value="登录">
                            </div>
                            <p class="signup-guide">还没有账号？<a href="account_register.php" target="_top">免费注册</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/@login-box-->
    </div>
</body>
<div id="js-content">
    <script>
        header_link(1);
    </script>
</div>
</html>