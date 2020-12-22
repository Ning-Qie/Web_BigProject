<?php
include "include/head.php";
include "include/header.php";
islogin();
prt_title("个人信息");
?>

<?php
@session_start();
$cid = $_SESSION['valid_user'];
$conn = new mysqli('localhost', 'root', '', 'waimai_db');
$conn->query("set names utf8");
$sql = "select * from customer where cid='$cid'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="security_content">
    <div class="security-right">
        <div data-v-4cbad597="" class="security-right-title"><span data-v-4cbad597="" class="security-right-title-icon"></span> <span data-v-4cbad597="" class="security-right-title-text">我的信息</span>
        </div>
        <div class="user-setting-warp">
            <div>
                <form class="el-form clearfix" id="logform" action="account_info_change.php" method="post" onsubmit="return account_info_change_confirm()">
                    <div class="el-form-item user-nick-name"><label class="el-form-item__label">用户名:</label>
                        <div class="el-form-item__content">
                            <div class="el-input">
                                <input autocomplete="off" placeholder="你的昵称" type="text" rows="2" maxlength="16" validateevent="true" class="el-input__inner" name="cname" value="<?php echo $row['cname']; ?>">
                            </div> <span class="nick-name-not"> </span>
                        </div>
                    </div>
                    <div class="el-form-item user-nick-rel-name"><label class="el-form-item__label">校园卡号:</label>
                        <div class="el-form-item__content"><span class="userinfo-username"><?php echo $row['cid']; ?></span>
                        </div>
                    </div>
                    <div class="el-form-item user-nick-name"><label class="el-form-item__label">密码:</label>
                        <div class="el-form-item__content">
                            <div class="el-input">
                                <input autocomplete="off" placeholder="密码" rows="2" maxlength="16" validateevent="true" class="el-input__inner" type="password" name="cpwd" value="<?php echo $row['cpwd']; ?>">
                            </div> <span class="nick-name-not"> </span>
                        </div>
                    </div>
                    <div class="el-form-item user-nick-name"><label class="el-form-item__label">联系电话:</label>
                        <div class="el-form-item__content">
                            <div class="el-input">
                                <input autocomplete="off" placeholder="你的电话" type="text" rows="2" maxlength="16" validateevent="true" class="el-input__inner" name="ctel" value="<?php echo $row['ctel']; ?>">
                            </div> <span class="nick-name-not"> </span>
                        </div>
                    </div>
                    <div class="el-form-item user-nick-name"><label class="el-form-item__label">订餐地址:</label>
                        <div class="el-form-item__content">
                            <div class="el-input">
                                <input autocomplete="off" ype="text" rows="2" validateevent="true" class="el-input__inner" name="caddr" value="<?php echo $row['caddr']; ?>" placeholder="设置您的地址">
                            </div> <span class="nick-name-not"> </span>
                        </div>
                    </div>
                    <div class="el-form-item user-my-sex"><label class="el-form-item__label">性别:</label>
                        <div class="el-form-item__content">
                            <div class="el-radio-group"><label class="el-radio-button"><input type="radio" class="el-radio-button__orig-radio" name="sex" value="男" <?php if ($row['sex'] == '男') echo "checked='checked'" ?>><span class="el-radio-button__inner">男</span></label> <label class="el-radio-button"><input type="radio" class="el-radio-button__orig-radio" name="sex" value="女" <?php if ($row['sex'] == '女') echo "checked='checked'" ?>><span class="el-radio-button__inner">女</span></label>
                            </div>
                        </div>
                        <input type="hidden" name="cid" value="<?php echo $row['cid']; ?>">


                        <div class="el-form-item user-my-btn">
                            <div class="el-form-item__content">
                                <div class="padding-dom"></div>
                                <div class="user-my-btn-warp">
                                    <input type="submit" value="保存" class="el-button el-button--primary">
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
        header_link(3);
    </script>
</div>