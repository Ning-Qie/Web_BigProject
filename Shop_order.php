<?php 
include "include/Shop_header.php";
isshoplogin();
prt_title("订单管理-商户中心");
?>
	<?php
	// 1.连接数据库
	require "conn.php";
	@session_start();
    if(isset($_SESSION['valid_shop'])){
		$username=$_SESSION['valid_shop'];
	?>

		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<title></title>
		</head>
		<body>
			<div class="shop-content">
        <!-- 订单搜索 -->
		<h2>订单号搜索</h2>
		<form method="post" action="Shop_order.php">
		<input type="text" name="search"><br>
		<input type="submit" name="sear" value="搜索修改">
		</form>

        <?php
		if(!empty($_POST['sear'])) {
			$search=$_POST['search'];
			// 2.编写执行sql语句
			$sql="select * from `orders` where `sid`=$username and (`ostate`=1 or `ostate`=2 or `ostate`=3) and (`oid` like '%$search%') order by `ostate`,`otime` asc";
			// echo $sql;
		}
		else
            $sql="SELECT * FROM `orders` WHERE sid=$username and (`ostate`=1 or `ostate`=2 or `ostate`=3) order by `ostate`,`otime` asc";
?>

		<h2>显示订单</h2>

		<?php
		$result=$conn->query($sql);
		// 执行查询语句，并将资源型结果集存储在变量中

		//分页
		$pageSize=3;//每页显示条数
		$rows=$result->num_rows;//取出记录的总条数
		$totalPage = ceil($rows/$pageSize);//总页数
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
		$fenye=" LIMIT $start,$pageSize";
		$sql=$sql.$fenye;
		//echo $sql;
		$result = $conn->query($sql);

		// 3.遍历结果集，取出每一行记录
		while($row=$result->fetch_assoc()) {

		?>
	<h4>订单编号：<?php echo $row['oid'];?></h4>
	<p>顾客id：<?php echo $row['cid'];?>	|菜品id：<?php echo $row['fid'];?>	|订单状态：	
	<?php 
		if($row['ostate']==0)
			echo "尚未支付";
		else if($row['ostate']==1)
			echo "已取消订单";
		else if($row['ostate']==2)
			echo "已接单";
		else if($row['ostate']==3)
			echo "已完成";
	?></p>
	<p>订单创建时间:<?php echo $row['otime'];?> 	|购买数量：<?php echo $row['fnum'];?></p>
	<p><a href=Shop_edit_order.php?oid=<?php echo $row['oid']; ?>>编辑订单状态</a> | <a href=Shop_show_cus.php?cid=<?php echo $row['cid']; ?>>查看订餐者信息</a></p>
	<hr>

	<?php
	}
	?>
	<!-- 分页 -->
	<p><a href=Shop_order.php?page=1>首页</a> |
		<?php
			for ($x=1; $x<=$totalPage; $x++) {
				if($x==$page){ echo $x;}
				else{
			?>
			<a href=Shop_order.php?page=<?php echo $x ?>><?php echo $x ?></a>
		<?php
				}
		}
		?>
		| <a href=Shop_order.php?page=<?php echo $totalPage ?>>尾页</a></p>
		</div>
	</body>
	</html>

	<?php
	}
	else
		echo "没有权限";
?>
	

