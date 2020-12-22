<?php 
include "include/Shop_header.php";
isshoplogin();
prt_title("首页-商户中心");
?>
<?php
	// 1.连接数据库
	require "conn.php";
	@session_start();
    if(isset($_SESSION['valid_shop'])){
		$username=$_SESSION['valid_shop'];
?>


<body>
	<!-- 菜品搜索 -->
	<div class="search" style="height: 200px;">
		<div calss="search-box">
			<div class="search-bar ">
				<span class="search-container clearfix"><span>
				<form method="post" action="Shop_show.php">
						<input id="J-search-input" name="search" class="J-search-input" type="text"
							placeholder="根据菜品名、描述搜索" autocomplete="off">
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
		$rows=$result->num_rows;//取出记录的总条数
		$totalPage = ceil($rows/$Shop_show_pagesize);//总页数
		if(!empty($_GET['page'])){
			$page=$_GET['page'];
		}
		else{
			$page=1;
		}
		if ($page>$totalPage){
			$page=$totalPage;
		}//超出最大页限制
		$start=($page-1)*$Shop_show_pagesize;
		$fenye=" LIMIT $start,$Shop_show_pagesize";
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
		<?php
		if($row['onsale']==1)
			echo "正在热销";
		else
			echo "已经售罄";
		?>
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
	</div>
</body>
</html>

<?php
	}
	else
		echo "没有权限";
?>