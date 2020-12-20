<?php
include "include/manage_header.php";
ismanagelogin();
prt_title("管理商家");
?>
<?php
$conn = new mysqli('localhost', 'root', '', 'waimai_db');
$conn->query("set names utf8");
$sql="select * from customer";
$result=$conn->query($sql); 
while ($row = $result->fetch_assoc()) {
    echo "校园卡号：".$row['cid']."<br>";
    echo "账号密码：".$row['cpwd']."<br>";
    echo "性别：".$row['sex']."<br>";
    echo "联系电话：".$row['ctel']."<br>";
    echo "用户名：".$row['cname']."<br>";
    echo "地址：".$row['caddr']."<br>";
    ?>
    <p><a href="manage_cust_delete.php?id=<?php echo $row['cid']; ?>">删除</a></p>
    <?php
}
function delete($cid){
    $sql="DELETE FROM `customer` where `cid`=$cid";
    $rest=$conn->query($sql);
}
?>