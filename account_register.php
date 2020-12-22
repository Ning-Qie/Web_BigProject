<!DOCTYPE html>
<html>
<?php include "include/head.php" ?>
<?php prt_title("用户注册"); ?>
<?php include "include/header.php" ?>


<div class="security_content">
    <div class="security-right">
        <div data-v-4cbad597="" class="security-right-title"><span data-v-4cbad597="" class="security-right-title-icon"></span> <span data-v-4cbad597="" class="security-right-title-text">注册信息</span>
        </div>
        <div class="user-setting-warp">
            <div>
                <form class="el-form clearfix" id="logform" action="account_enroll.php" method="post">
                    <div class="el-form-item user-nick-name"><label class="el-form-item__label">用户名:</label>
                        <div class="el-form-item__content">
                            <div class="el-input">
                                <input autocomplete="off" placeholder="你的昵称" type="text" rows="2" maxlength="16" validateevent="true" class="el-input__inner" name="cname">
                            </div> <span class="nick-name-not"> </span>
                        </div>
                    </div>
                    <div class="el-form-item user-nick-name"><label class="el-form-item__label">校园卡号:</label>
                        <div class="el-form-item__content">
                            <div class="el-input">
                                <input placeholder="请输入十二位校园卡号" rows="2" name="userid" maxlength="12" minlength="12" oninput="value=value.replace(/[^\d]/g,'')" class="el-input__inner">
                            </div> <span class="nick-name-not"> </span>
                        </div>
                    </div>
                    <div class="el-form-item user-nick-name"><label class="el-form-item__label">密码:</label>
                        <div class="el-form-item__content">
                            <div class="el-input">
                                <input placeholder="密码" rows="2" maxlength="16" class="el-input__inner" type="password" name="password">
                            </div> <span class="nick-name-not"> </span>
                        </div>
                    </div>
                    <div class="el-form-item user-nick-name"><label class="el-form-item__label">联系电话:</label>
                        <div class="el-form-item__content">
                            <div class="el-input">
                                <input autocomplete="off" placeholder="你的电话" type="text" rows="2" maxlength="16" validateevent="true" class="el-input__inner" name="tel">
                            </div> <span class="nick-name-not"> </span>
                        </div>
                    </div>
                    <div class="el-form-item user-nick-name"><label class="el-form-item__label">订餐地址:</label>
                        <div class="el-form-item__content">
                            <div class="el-input">
                                <input autocomplete="off" ype="text" rows="2" validateevent="true" class="el-input__inner" name="addr" placeholder="设置您的地址">
                            </div> <span class="nick-name-not"> </span>
                        </div>
                    </div>
                    <div class="el-form-item user-my-sex"><label class="el-form-item__label">性别:</label>
                        <div class="el-form-item__content">
                            <div class="el-radio-group"><label class="el-radio-button"><input type="radio" class="el-radio-button__orig-radio" name="sex" value="男"><span class="el-radio-button__inner">男</span></label> <label class="el-radio-button"><input type="radio" class="el-radio-button__orig-radio" name="sex" value="女"><span class="el-radio-button__inner">女</span></label>
                            </div>
                        </div>
                        <input type="hidden" name="cid" value="<?php echo $row['cid']; ?>">


                        <div class="el-form-item user-my-btn">
                            <div class="el-form-item__content">
                                <div class="padding-dom"></div>
                                <div class="user-my-btn-warp">
                                    <input type="submit" value="注册" class="el-button el-button--primary">
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="js-content">
    <script>
        header_link(2);
    </script>
</div>

</html>