<?php
include "include/manage_header.php";
ismanagelogin();
prt_title("管理商家");
?>
<?php
$conn = new mysqli('localhost', 'root', '', 'waimai_db');
$conn->query("set names utf8");
$sql="select * from shop";
$result=$conn->query($sql); 
?>
    <p>注册商家：</p>
    <div id="enrollform">
    <form id="logform" action="manage_add_shop.php" method="post">
        <div id="forminfo">
            <br>商家ID:
            <input type="text" name="userid"">
            <br>密码:
            <input type="text" name="password">
            <br>商家名称:
            <input type="text" name="name">
            <br>联系电话:
            <input type="text" name="tel">
            <br>商家地址:
            <input type="text" name="addr">
        </div>
        <br>
        <input type="submit" value="注册">
        <br>
    </form>
    <p>商家信息：</p>
</div>
<?php
while ($row = $result->fetch_assoc()) {
    echo "商家名称：".$row['sname']."<br>";
    echo "商店ID：".$row['sid']."<br>";
    echo "账号密码：".$row['spwd']."<br>";
    echo "商家电话：".$row['stel']."<br>";
    echo "地址：".$row['saddr']."<br>";
    echo "<img src='".$row['slogo']."' height=200 width=200 /><br><br><br><br>";
    ?>
    <p><a href="manage_shop_delete.php?id=<?php echo $row['sid']; ?>">删除</a></p>
    <?php
}
?>