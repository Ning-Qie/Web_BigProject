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
		<h2>显示订餐者信息</h2>

		<?php

        if(!empty($_GET)) {
            $cid=$_GET['cid'];
        }
        else
            exit("非法访问");
		// 2.编写执行sql语句
		$sql="SELECT * FROM `customer` WHERE cid=$cid";
		$result=$conn->query($sql);
		// 执行查询语句，并将资源型结果集存储在变量中
		// 3.遍历结果集，取出每一行记录
		while($row=$result->fetch_assoc()) {

		?>
	<p>顾客id：<?php echo $row['cid'];?>	|性别：<?php echo $row['sex'];?>	|电话：	<?php echo $row['ctel'];?></p>
	<p>顾客用户名:<?php echo $row['cname'];?> 	|订餐地址：<?php echo $row['caddr'];?></p>
	<p><a href=order.php>返回订单</a> </p>
	<hr>

	<?php
	}
	?>
	</body>
	</html>

	<?php
	}
	else
		echo "没有权限";
?>
	