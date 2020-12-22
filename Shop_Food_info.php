<style>
	.post-header-thumb {
		position: relative;
		width: 100%;
		height: 300px;
		margin-top: 70px;
		z-index: 1;
	}

	.post-header-thumb-op {
		position: absolute;
		width: 100%;
		width: 100%;
		height: 300px;
		background-position: center;
		background-size: cover;
		-webkit-filter: blur(4px);
		-moz-filter: blur(4px);
		filter: blur(4px)
	}

	.post-header-thumb-cover {
		position: relative;
		width: 100%;
		height: 300px;
		/* margin-top: 70px; */
		background-color: rgba(0, 0, 0, .5);
		-webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, .3);
		-moz-box-shadow: 0 1px 5px rgba(0, 0, 0, .3);
		box-shadow: 0 1px 5px rgba(0, 0, 0, .3)
	}

	.post-header-thumb-container {
		position: relative;
		top: 100px;
		max-width: 700px;
		margin: 0 auto;
		padding: 30px 25px 20px;
		-webkit-animation: fade-in .5s;
		animation: fade-in;
		animation-duration: .5s
	}

	.post-header-thumb-title {
		font-size: 21px;
		font-weight: 500;
		color: #fff
	}

	.post-header-thumb-meta {
		color: #fff;
		margin-top: 10px;
	}

	.post-header-thumb-meta a {
		color: #fff
	}

	.post-header-thumb-container .post-tags {
		border-bottom: none
	}

	.post-header-thumb-container .post-tags a:hover {
		color: #5f5f5f;
		border: 1px solid #f7f7f7;
		outline-style: none;
		background: #f7f7f7
	}
	.post-header-thumb-op img {
    width: 100%;
    height: -webkit-fill-available;
    object-fit: cover;
	}
</style>

<?php
	include "include/head.php";
	include "include/header.php";
	include "include/top-scroll.php";
	// 1.连接数据库
	require "conn.php";
	if (!empty($_GET)) {
		$username = $_GET['sid'];
	}
	if (!empty($_POST['sear'])) {
		$search = $_POST['search'];
		// 2.编写执行sql语句
		$sql = "select * from `food` where `sid`=$username and (`fname` like '%$search%' or `fdes` like '%$search%') order by `fid` asc";
		// echo $sql;
	} else $sql = "select * from food where sid=$username order by fid asc";
	$result = $conn->query($sql);
	// 执行查询语句，并将资源型结果集存储在变量中

	//分页
	$rows = $result->num_rows; //取出记录的总条数
	$totalPage = ceil($rows / $Shop_Food_info_pageSize); //总页数
	if (!empty($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	if ($page > $totalPage) {
		$page = $totalPage;
	} //超出最大页限制
	$start = ($page - 1) * $Shop_Food_info_pageSize;
	$fenye = " LIMIT $start,$Shop_Food_info_pageSize";
	$sql = $sql . $fenye;
	//echo $sql;
	//取出商家信息
	$t="select * from shop where sid={$username }";
	$shopinfo=$conn->query($t);
	$s_row = $shopinfo->fetch_assoc();
	prt_title("商家-".$s_row['sname']);
	$result = $conn->query($sql);
?>


<body>
	<div class="post-header-thumb">
		<div class="post-header-thumb-op">
			<img src="<?php echo $s_row['slogo']; ?>" alt="" >
			<!-- <img src="./image/base_img/index-search-img.jpg" alt="" > -->
		</div>
		<div class="post-header-thumb-cover">
			<div class="post-header-thumb-container">
				<div class="post-header-thumb-title">
					<!-- 店名 -->
					<i class="fas fa-store-alt"></i>
					<?php echo $s_row['sname']; ?>
				</div>
				<div class="post-header-thumb-meta">
					<p>联系方式：<?php echo $s_row['stel']; ?></p>
					<p>地址：<?php echo $s_row['saddr']; ?></p>
				</div>
				<div class="post-meta">
					<span class="post-meta-wrap">
						<div class="author-avatar">
							<img src="<?php echo $s_row['slogo']; ?>" alt="" class="head-img">
						</div>
					</span>
				</div>
			</div>
		</div>
	</div>
	<main style="min-width:100%;margin-bottom: unset;background: #fff;">
        <div class="foods-content">
            <div class="zhenguo-container">
                <div class="minsu-ls-view clearfix" style="border: unset;">
                    <div class="products" style="display: flex;margin-top: 50px;">
						<?php
							// 3.遍历结果集，取出每一行记录
							while ($row = $result->fetch_assoc()) {
						?>
							<div class="minsu-item">
								<div class="product-card-header">
									<a href="Food_info.php?fid=<?php echo $row['fid'] ?>" target="_blank">
										<img src="<?php echo $row['fpic']; ?>" class="product-img">
									</a>
									<!-- <a href="Shop_Food_info.php?sid=<?php echo $s_row['sid'] ?>" target="_blank">
										<img src="<?php echo $s_row['slogo']; ?>" alt="" class="head-img">
									</a> -->
								</div>
								<div class="product-info">
									<a href="Food_info.php?fid=<?php echo $row['fid'] ?>" target="_blank">
										<p class="product-title"><?php echo $row['fname']; ?></p>
									</a>
									<!-- <p class="sub-title" style="float: right;"><?php echo $s_row['sname']; ?></p> -->
									<p class="sub-title">
										<!-- <span><?php echo $row['fdes']; ?></span> -->
										<span>
											<?php
												if($row['onsale']==1){
													echo "销售量：".$row['soldnum']." | 正在销售";
												}
												else{
													echo "销售量：".$row['soldnum']." | 已售罄";
												}
											?>
										</span>
										<span><?php echo " | ".$s_row['sname']; ?></span>
									</p>
									<p class="price-number numfont price"><span
											class="price-icon">￥</span><?php echo $row['price']; ?></p>
								</div>
							</div>
						<?php
						}
						?>
					</div>
                </div>
            </div>
		</div>
		<div class="food-page" style="margin-bottom: 50px;">
			<a href=Shop_Food_info.php?page=1&sid=<?php echo $username ?>>首页</a> |
				<?php
				for ($x=1; $x<=$totalPage; $x++) {
					if($x==$page){ echo $x;}
					else{
				?>
				<a href=Shop_Food_info.php?page=<?php echo $x ?>&sid=<?php echo $username ?>><?php echo $x ?></a>
				<?php
					}
			}
			?>
				| <a href=Shop_Food_info.php?page=<?php echo $totalPage ?>&sid=<?php echo $username ?>>尾页</a>
		</div>
    </main>
</body>
