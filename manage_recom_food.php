<?php
$conn = new mysqli('localhost', 'root', '', 'waimai_db');
$conn->query("set names utf8");
$pageSize=3;//每页显示条数
    //获取总页数
$sql="select * from food";
$result=$conn->query($sql); 
$s=$result->num_rows;//取出记录的总条数
$totalPage = ceil($s/$pageSize);//总页数
if(!empty($_GET['page'])){
    $page=$_GET['page'];
}
else{
    $page=1;
}
if ($page>$totalPage){
    $page=$totalPage;
}//超出最大页限制
$start=($page-1)*$pageSize;
$sql="select * from food order by `pro` desc LIMIT $start,$pageSize";
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
        echo "<a href=\"Add_to_Trolley.php?fid={$row['fid']}&sid={$row['sid']}\">添加至餐车</a>";
        echo "<br><br><br>";
}
?>

<p><a href=manage_recom_food.php?&page=1&key=>首页</a> |
    <?php
        for ($x=1; $x<=$totalPage; $x++) {
            if($x==$page){ echo $x;}
            else{
        ?>
        <a href=manage_recom_food.php?page=<?php echo $x ?>><?php echo $x ?></a>
    <?php
            }
    }
    ?>
    | <a href=manage_recom_food.php?page=<?php echo $totalPage ?>>尾页</a></p>
