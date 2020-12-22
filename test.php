<link type="text/css" rel="stylesheet" href="css/bilibili_user_info.css">

<div class="security_content">
    <div class="security-right">
        <div data-v-4cbad597="" class="security-right-title"><span data-v-4cbad597=""
                class="security-right-title-icon"></span> <span data-v-4cbad597=""
                class="security-right-title-text">我的信息</span>
        </div>
        <div class="user-setting-warp">
            <div>
                <form class="el-form clearfix" id="logform" action="account_info_change.php" method="post" onsubmit="return account_info_change_confirm()"></form>
                    <div class="el-form-item user-nick-name"><label class="el-form-item__label">用户名:</label>
                        <div class="el-form-item__content">
                            <div class="el-input">
                                <input autocomplete="off" placeholder="你的昵称" type="text" rows="2" maxlength="16"
                                    validateevent="true" class="el-input__inner" name="cname" value="<?php echo $row['cname']; ?>">
                            </div> <span class="nick-name-not"> </span></div>
                    </div>
                    <div class="el-form-item user-nick-rel-name"><label class="el-form-item__label">校园卡号</label>
                        <div class="el-form-item__content"><span class="userinfo-username"><?php echo $row['cid']; ?></span>
                            
                        </div>
                    </div>
                    <div class="el-form-item user-nick-name"><label class="el-form-item__label">密码:</label>
                        <div class="el-form-item__content">
                            <div class="el-input">
                                
                                <input autocomplete="off" placeholder="你的电话" type="text" rows="2" maxlength="16"
                                    validateevent="true" class="el-input__inner" type="password" name="cpwd" value="<?php echo $row['cpwd']; ?>">
                                
                                
                            </div> <span class="nick-name-not"> </span></div>
                    </div>
                    <div class="el-form-item user-nick-name"><label class="el-form-item__label">联系电话:</label>
                        <div class="el-form-item__content">
                            <div class="el-input">
                                
                                <input autocomplete="off" placeholder="你的电话" type="text" rows="2" maxlength="16"
                                    validateevent="true" class="el-input__inner" name="ctel" value="<?php echo $row['ctel']; ?>">
                                
                                
                            </div> <span class="nick-name-not"> </span></div>
                    </div>
                    <div class="el-form-item user-my-sign"><label class="el-form-item__label">订餐地址:</label>
                        <div class="el-form-item__content">
                            <div class="el-textarea"><input type="text"  name="caddr" value="<?php echo $row['caddr']; ?>" placeholder="设置您的地址" type="textarea" rows="2"
                                    autocomplete="off" validateevent="true" class="el-textarea__inner"></input></div>
                            
                        </div>
                    </div>
                    <div class="el-form-item user-my-sex"><label class="el-form-item__label">性别:</label>
                        <div class="el-form-item__content">
                            <div class="el-radio-group"><label class="el-radio-button"><input type="radio"
                                        class="el-radio-button__orig-radio" name="sex" value="男" <?php if($row['sex']=='男') echo "checked='checked'"?>><span
                                        class="el-radio-button__inner">男</span></label> <label
                                    class="el-radio-button"><input type="radio" class="el-radio-button__orig-radio"
                                    name="sex" value="女" <?php if($row['sex']=='女') echo "checked='checked'"?>><span class="el-radio-button__inner">女</span></label>
                        </div>
                    </div>

                    <div class="el-form-item user-my-btn">
                        
                        <div class="el-form-item__content">
                            <div class="padding-dom"></div>
                            <div class="user-my-btn-warp"><button type="button" class="el-button el-button--primary">
                                    
                                    <span><br></span>
                                    <input type="submit" value="保存">
                                </button></div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>