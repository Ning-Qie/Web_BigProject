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
        $cid = $_SESSION['valid_user'];
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
function del()
{
    require('conn.php');
    $id = $_GET['id'];
    $sql = "delete from orders where fid='{$id}'";
    $result = $conn->query($sql);

    $sql = "delete * from food where fid='{$id}'";
    $result1 = $conn->query($sql);
    header("location:Trolley.php");
}
?>


<!-- 餐车add -->
<?php
function add()
{
    require('conn.php');
    $id = $_GET['id'];
    $sql = "select * from orders where fid='{$id}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $r = $row['fnum'] + 1;

    $sql = "update orders set fnum='{$r}' where fid='{$id}'";
    $result1 = $conn->query($sql);
    header("location:Trolley.php");
}
?>

<!-- 餐车sub -->
<?php
function sub()
{
    $id = $_GET['id'];
    require('conn.php');
    $sql = "select * from orders where fid='{$id}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row['fnum'] > 1) {
        $r = $row['fnum'] - 1;
        $sql = "update orders set fnum='{$r}' where fid='{$id}'";
        $result = $conn->query($sql);
    } else {
        require('del.php');
        del();
    }
    header("location:Trolley.php");
}
?>



