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
				<!-- 订单搜索 -->
				<div class="search" style="height: 200px;">
					<div calss="search-box">
						<div class="search-bar ">
							<span class="search-container clearfix"><span>
							<form method="post" action="Shop_order.php">
									<input id="J-search-input" name="search" class="J-search-input" type="text"
										placeholder="根据订单号搜索" autocomplete="off">
									<span class="search-bnt-panel">
										<input type="submit" name="sear" value="搜索" class="search-btn J-search-btn">
									</span>
									<p class="hot-search J-hot-search"> </p>
							</form>
						</div>
					</div>
				</div>
			<div class="shop-content">

        <?php
		if(!empty($_POST['sear'])) {
			$search=$_POST['search'];
			// 2.编写执行sql语句
			$sql="select distinct oid,cid,sid,ostate,otime from `orders` where `sid`=$username and (`ostate`=1 or `ostate`=2 or `ostate`=3) and (`oid` like '%$search%') order by `otime` desc,`ostate` asc";
			// echo $sql;
		}
		else
            $sql="SELECT distinct oid,cid,sid,ostate,otime FROM `orders` WHERE sid=$username and (`ostate`=1 or `ostate`=2 or `ostate`=3) order by `otime` desc,`ostate` asc";
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
			<p>顾客id：<?php echo $row['cid'];?>|订单状态：
			<?php
				if($row['ostate']==0)
					echo "尚未支付";
				else if($row['ostate']==1)
					echo "已取消订单";
				else if($row['ostate']==2)
					echo "已接单";
				else if($row['ostate']==3)
					echo "已完成";

			//显示菜品
			$condition=$row['oid'];
			$sql1="select * from orders,food where orders.sid = $username and (`oid` = '$condition') and food.fid=orders.fid order by `otime` asc";
			// echo $sql1;
			$result1 = $conn->query($sql1);
			// echo($sql1);
			while($row1=$result1->fetch_assoc()) {
				?>
				<p>菜品名称：<?php echo $row1['fname'];?>|购买数量：<?php echo $row1['fnum'];?></p>
		<?php } ?>

	</p>
	<p>订单创建时间:<?php echo $row['otime'];?>
	<p>
		<?php if($row['ostate']==2){ ?>
			<a href=Shop_edit_order.php?oid=<?php echo $row['oid']; ?> >编辑订单状态</a> | 
		<?php } ?>
			<a href=Shop_show_cus.php?cid=<?php echo $row['cid']; ?>>查看订餐者信息</a></p>
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
	

