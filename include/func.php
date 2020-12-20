<?php
// 打印标题
function prt_title($t)
{
    echo "<head><title>" . $t . "</title></head>";
}
// 判断登录状态
function islogin()
{
    @session_start();
    if (isset($_SESSION['valid_user'])) {
        // echo $cid;
    }
    //如果不存在，则登录
    else {
        echo "<script>go_somepage(1,'account_login.php');</script>";
    }
}
?>

<!-- 餐车del -->
<?php
function Trolleydel()
{
    require('conn.php');
    $id = $_GET['id'];
    @session_start();
    $cid = $_SESSION['valid_user'];
    $sql = "delete from orders where fid='{$id}' and cid='{$cid}'";
    $result = $conn->query($sql);
    header("location:Trolley.php");
}
?>


<!-- 餐车add -->
<?php
function Trolleyadd()
{
    require('conn.php');
    $id = $_GET['id'];
    @session_start();
    $cid = $_SESSION['valid_user'];
    $sql = "select * from orders where fid='{$id}' and cid='{$cid}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $r = $row['fnum'] + 1;

    $sql = "update orders set fnum='{$r}' where fid='{$id}' and cid='{$cid}'";
    $result1 = $conn->query($sql);
    header("location:Trolley.php");
}
?>

<!-- 餐车sub -->
<?php
function Trolleysub()
{
    $id = $_GET['id'];
    @session_start();
    $cid = $_SESSION['valid_user'];
    require('conn.php');
    $sql = "select * from orders where fid='{$id}' and cid='{$cid}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row['fnum'] > 1) {
        $r = $row['fnum'] - 1;
        $sql = "update orders set fnum='{$r}' where fid='{$id}' and cid='{$cid}'";
        $result = $conn->query($sql);
    } else {
        require('Trolleydel.php');
        Trolleydel();
    }
    header("location:Trolley.php");
}
?>



<?php
function isshoplogin(){
    @session_start();
    if(!isset($_SESSION['valid_shop'])){
        echo "<script>go_somepage(1,'Shop_login.php');</script>";
    }
}
?>

<?php
    // @session_start();//启动session会话
    function shop_login(){
        if(isset($_POST['userid']) and isset($_POST['password'])){
            $userid=$_POST['userid'];
            $password=$_POST['password'];
            //连接数据库
            $conn = new mysqli('localhost','root','','waimai_db');
            if ($conn->connect_errno){
                die("数据库连接失败：".$conn->connect_errno);
            }
            // echo "数据库连接成功";
            $conn->query("set names utf8");
            //查询数据库
            $sql="select * from shop where sid='$userid' and spwd='$password'";
            $result=$conn->query($sql);
            if($result->num_rows){
                $_SESSION['valid_shop']=$userid;
                echo "<script>go_somepage(1,'Shop_show.php');</script>";
            }
            $conn->close();
        }
    }
?>


<?php
function ismanagelogin(){
    @session_start();
    if(!isset($_SESSION['valid_manage'])){
        echo "<script>go_somepage(1,'manage_login.php');</script>";
    }
}
?>


<!-- 菜品添加至餐车add -->
<?php
function Add_to_Trolley()
{
    require('conn.php');
    $fid = $_GET['fid'];
    $sid = $_GET['sid'];
    @session_start();
    $cid = $_SESSION['valid_user'];
    $d=date('Y-m-d H:i:s',time());//下单时间
    $t=time();
    // echo "SELECT * from orders where cid='{$cid}' and fid='{$fid}' and ostate=0";
    $r = "SELECT * from orders where cid='{$cid}' and fid='{$fid}' and ostate=0";
    $re=$conn->query($r);
    $num = $re->num_rows;
    echo $num;
    if($num==0){
        echo "INSERT INTO `orders`(`cid`, `sid`, `fid`, `ostate`, `otime`, `fnum`, `oid`) VALUES ('$cid','$sid','$fid',0,'$d',1,'0_$t')";
        $sql = "INSERT INTO `orders`(`cid`, `sid`, `fid`, `ostate`, `otime`, `fnum`, `oid`) VALUES ('$cid','$sid','$fid',0,'$d',1,'0_$t')";
        $addTrolley=$conn->query($sql);
        if($addTrolley) {
            $conn->close();
            header("location:Trolley.php");
        }
        else
            echo"<br>修改失败";
    }
    else header("location:Trolley.php");
}
?>