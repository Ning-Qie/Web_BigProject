<?php 
include "include/head.php";
prt_title("我的订单");
include "include/header.php";
?>
<form method="get" action="Trolley_order_show.php">
<input type="text" name="key"><input type="submit" name="sub" value="搜索">
</form>
<?php 
    @session_start();
    $cid = $_SESSION['valid_user'];
	require('conn.php');
    if(!empty($_GET['key'])){
        $key=$_GET['key'];
        $k=" oid like '%$key%' or fname like '%$key%'";
        }
        else{
        	$k=1;
            $key=" ";
        }
        $pagesize=5;
        $sql="select * from orders,food,shop where ostate<>0 and orders.fid=food.fid and shop.sid=orders.sid and cid='{$cid}'";
        $result=$conn->query($sql);
        $num=$result->num_rows;
        $totalpage=ceil($num/$pagesize);
        if (!empty($_GET['page'])) {
           $page=$_GET['page'];

        }
        else $page=1;

        if ($page>=$totalpage) {
            $page=$totalpage;
        }

        $a=($page-1)*$pagesize;
        //2.编写执行sql语句
        $sql="select * from orders,food,shop where $k and ostate<>0 and orders.fid=food.fid and shop.sid=orders.sid and cid='{$cid}' order by otime desc LIMIT $a,$pagesize";
        $result=$conn->query($sql);
        //执行查询语句，并将结果（资源型）存储在变量里
        //遍历结果集，取出每一行记
        while($row=$result->fetch_assoc()){
?>
<h3><a href="Trolley_order_show.php?key=<?php echo $row['oid']; ?>">订单号：<?php echo $row['oid']; ?></a></h3>
    <p>商家名称: <?php echo $row['sname']; ?> | 菜品名称：<?php echo $row['fname']; ?></p>
    <p>购买数量：<?php echo $row['fnum']; ?>| 总价：<?php echo $row['fnum']*$row['price']; ?> |下单时间：<?php echo $row['otime']; ?> 
	</p>
	<p>订单状态：<?php if($row['ostate']==1){ echo "已取消订单";}
						if($row['ostate']==2){ echo "已接单" ;}
						if ($row['ostate']==3){ echo "已完成";}
						?></p>
	<?php if($row['ostate']==2){
	?>
	<p><a href="Trolley_order_cancel.php?id=<?php echo$row['oid']; ?>" onclick="return confirm('确定要取消订单吗')">取消订单</a></p>
	<?php
	}
	?>
    <hr>
<?php 
        }
    ?>
<p><a href="Trolley_orders_info.php?page=1&$key=<?php echo $key;?>"><<</a> 
    <a href="Trolley_orders_info.php?page=<?php echo $page-1;?>&$key=<?php echo $key;?>"><</a>
    <?php 
    $n=1;
    while($n<=$totalpage){
       if($n!=$page){?>
    <a href="Trolley_orders_info.php?page=<?php echo $n;?>&$key=<?php echo $key;?>"><?php echo $n;?></a> 
    <?php
        }
        else{?>
        <?php echo $n;?>
    <?php
        }
        $n++;
        }
    ?>
    <a href="Trolley_orders_info.php?page=<?php echo $page+1;?>&$key=<?php echo $key;?>">></a>
    <a href="Trolley_orders_info.php?page=<?php echo $totalpage;?>&$key=<?php echo $key;?>">>></a></p>