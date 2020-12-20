<?php
   if (!empty($_GET['key'])){
    $key=$_GET['key'];
    require "conn.php";
    $sql="select * from orders,food,shop,customer where ostate!=0 and orders.fid=food.fid and shop.sid=orders.sid and orders.cid=customer.cid and oid like '$key'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
   ?>
   <p>订单号：<?php echo $row['oid']; ?></p>
    <p>商家名称: <?php echo $row['sname']; ?> | 菜品名称：<?php echo $row['fname']; ?></p>
    <p>购买数量：<?php echo $row['fnum']; ?>| 总价：<?php echo $row['fnum']*$row['price']; ?> |下单时间：<?php echo $row['otime']; ?> 
  </p>
    <p>送餐地址：<?php echo $row['caddr']; ?></p>
    <p>用户名：<?php echo $row['cname']; ?>|联系方式：<?php echo $row['ctel']; ?></p>
  <p>订单状态：<?php if($row['ostate']==1){ echo "已取消订单";}
            if($row['ostate']==2){ echo "已接单" ;}
            if ($row['ostate']==3){ echo "已完成";}
            ?></p>
    <?php 
	}
	else{
		echo "error";
    ?>
    <a href="Trolley_orders_info.php">返回订单页面</a>
    <?php
    }
    ?>