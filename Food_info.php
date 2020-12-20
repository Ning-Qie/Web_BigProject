<?php
    include "include/head.php";
    include "include/header.php";
    prt_title("菜品详情");
?>
<!-- 菜品详情 -->
<?php
Food_info_show();
function Food_info_show()
{
    $fid = $_GET['fid'];
    require('conn.php');
    $sql="select * from food where fid='{$fid}'";
    $result=$conn->query($sql); 
    while ($row = $result->fetch_assoc()) {
            echo "食品名称：".$row['fname']."<br>";
            echo "已售数量：".$row['soldnum']."<br>";
            echo "菜品简介：".$row['fdes']."<br>";
            echo "食品价格：".$row['price']."元<br>";
            if($row['onsale']==1){
                echo "食品状态：正在热销<br>";
            }
            else{
                echo "食品状态：售罄"."<br>";
            }
            echo "<img src='".$row['fpic']."' height=200 width=200 /><br>";
            $t="select * from shop where sid={$row['sid']}";
            $shopinfo=$conn->query($t);
            $s_row = $shopinfo->fetch_assoc();
            echo "商家名称：".$s_row['sname']."<br>";
            echo "商家电话：".$s_row['stel']."<br>";
            echo "商家地址：".$s_row['saddr']."<br>";
            echo "<img src='".$s_row['slogo']."' height=200 width=200 /><br>";
            if($row['onsale']==1) echo "<a href=\"Add_to_Trolley.php?fid={$row['fid']}&sid={$row['sid']}\">添加至餐车</a>";
            echo "<br><br><br>";
    }
}
?>