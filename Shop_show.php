<?php include "include/Shop_header.php"?>

<style type="text/css">
	img {
		width: 150px;
	}
</style>
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
	<!-- 前往订单 -->
	<h2><a href=Shop_order.php>前往订单</a></h2>

	<!-- 菜品搜索 -->
	<h2>菜品搜索</h2>
	<form method="post" action="Shop_show.php">
		<input type="text" name="search"><br>
		<input type="submit" name="sear" value="搜索">
	</form>
	<?php
		if(!empty($_POST['sear'])) {
			$search=$_POST['search'];
			// 2.编写执行sql语句
			$sql="select * from `food` where `sid`=$username and (`fname` like '%$search%' or `fdes` like '%$search%') order by `fid` asc";
			// echo $sql;
		}
		else
			$sql="select * from food where sid=$username order by fid asc";
?>



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
	<h4>菜品id：
		<?php echo $row['fid'];?>
	</h4>
	<p>菜品名称：
		<?php echo $row['fname'];?> |销售量：
		<?php echo $row['soldnum'];?> |销售状态：
		<?php echo $row['onsale'];?>
	</p>
	<p>菜品简介:
		<?php echo $row['fdes'];?> |菜品图片：<img src="<?php echo $row['fpic'];?>"> |菜品价格：
		<?php echo $row['price'];?>
	</p>
	<p><a href=Shop_Food_edit.php?fid=<?php echo $row['fid']; ?>>编辑</a> | <a href=Shop_Food_del.php?fid=<?php echo
			$row['fid']; ?>>删除</a></p>
	<hr>

	<?php
	}
	?>
	<!-- 分页 -->
	<p><a href=Shop_show.php?page=1>首页</a> |
		<?php
			for ($x=1; $x<=$totalPage; $x++) {
				if($x==$page){ echo $x;}
				else{
			?>
		<a href=Shop_show.php?page=<?php echo $x ?>>
			<?php echo $x ?>
		</a>
		<?php
				}
		}
		?>
		| <a href=Shop_show.php?page=<?php echo $totalPage ?>>尾页</a>
	</p>
</body>
</html>

<?php
	}
	else
		echo "没有权限";
?>