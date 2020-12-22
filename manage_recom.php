<?php
include "include/manage_header.php";
ismanagelogin();
prt_title("菜品推荐管理");
?>
<div style="padding:200px;">
<?php
$conn = new mysqli('localhost', 'root', '', 'waimai_db');
$conn->query("set names utf8");
$sql="select * from food";
$result=$conn->query($sql); 
while ($row = $result->fetch_assoc()) {
        echo "食品名称：".$row['fname']."<br>";
        echo "推荐优先度：".$row['pro']."<br>";
        ?>
        <form id="logform" style="text-align: unset;margin: unset;" action="manage_pro_change.php" method="post">
        修改优先度：<input type="text" name="pro"><br>
        <input type="hidden" name="fid" value="<?php echo $row['fid']; ?>">
        <input type="submit" value="修改"><br>
        </form>
        <?php
        echo "已售数量：".$row['soldnum']."<br>";
        echo "菜品简介：".$row['fdes']."<br>";
        echo "食品价格：".$row['price']."元<br>";
        if($row['onsale']==1){
            echo "食品状态：正在热销<br>";
        }
        else{
            echo "食品状态：售罄"."<br>";
        }
        echo "<img src='".$row['fpic']."' height=200 width=200 /><br><br><br><br>";
}
?>
</div>

