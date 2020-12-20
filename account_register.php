<!DOCTYPE html>
<html>
    <?php include "include/head.php"?>
    <?php prt_title("用户注册"); ?>

<body>
    <?php include "include/header.php"?>
    <main>
    <div class="ning-content">
    <div id="enrollform">
    <form id="logform" action="account_enroll.php" method="post">
        <div id="forminfo">
            <br>校园卡号（请输入12位数字):
            <input type="text" name="userid" maxlength="12" minlength="12" oninput="value=value.replace(/[^\d]/g,'')">
            <br>密码:
            <input type="text" name="password">
            <br>用户名:
            <input type="text" name="cname">
            <br>性别：<input type="radio" name="sex" value="男" />男
            <input type="radio" name="sex" value="女" />女
            <br>联系电话:
            <input type="text" name="tel">
            <br>订餐地址:
            <input type="text" name="addr">
        </div>
        <br>
        <input type="submit" value="注册">
        <br>
    </form>
</div>
</div>
    </main>
    <!-- <?php include "include/footer.php"?> -->
</body>
<div id="js-content">
    <script>
        header_link(2);
    </script>
</div>
</html>


