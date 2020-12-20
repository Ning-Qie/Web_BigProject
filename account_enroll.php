

<?php
    //if (isset($_POST['userid']) and isset($_POST['password']) and isset($_POST['cname']) and isset($_POST['sex']) and isset($_POST['tel']) and isset($_POST['addr'])) {
        $userid = $_POST['userid'];
        $password = $_POST['password'];
        $cname = $_POST['cname'];
        @$sex = $_POST['sex'];
        $tel = $_POST['tel'];
        $addr = $_POST['addr'];
        //$s = 0; //用于检测数据库中该账号是否已被注册
    //}


    //连接数据库
    $conn = new mysqli('localhost', 'root', '', 'waimai_db');
    if ($conn->connect_errno) {
        die("数据库连接失败：" . $conn->connect_errno);
    }
    //echo "数据库连接成功";
    $conn->query("set names utf8");
    //查询数据库
    $sql = "select * from customer where cid='$userid'"; //若count返回值为1则说明数据库中已有该账号即该账号已被注册
    $s = $conn->query($sql);
    // echo $s;
    // echo mysqli_field_count($s);
    if ($s->num_rows==0 and strlen($userid)==12 and $password!=null and $sex!=null and $tel!=null and $cname!=null and $addr!=null) {
        $sql = "INSERT INTO customer (cid,cpwd,sex,ctel,cname,caddr) VALUES ('$userid', '$password', '$sex','$tel','$cname','$addr')";
        if (mysqli_query($conn, $sql)) {
            echo "账号注册成功<br>";
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    else {
        if($s->num_rows!=0)
        echo "错误提示：该账号已被注册！<br>";
        if(strlen($userid)!=12)
        echo "错误提示：校园卡输入不规范！<br>";
        if($password==null)
        echo "错误提示：未输入密码！<br>";
        if($sex==null)
        echo "错误提示：未选择性别！<br>";
        if($cname==null)
        echo "错误提示：未输入用户名！<br>";
        if($addr==null)
        echo "错误提示：未输入地址！<br>";
        if($tel==null)
        echo "错误提示：未输入电话！<br>";
    }
?>