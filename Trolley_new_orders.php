<?php
//订单信息
	require('conn.php');\
	//设置时区为北京时间
	date_default_timezone_set("PRC");

	@session_start();
	$cid = $_SESSION['valid_user'];
	$fid=$_POST['fid'];
	$c=count($fid);
	//echo "$d";
	for($i=0;$i<$c;$i++){
		$f=$fid[$i];
		$sql="select * from orders,food,shop,customer where orders.cid='{$cid}' and orders.fid='{$f}' and orders.fid=food.fid and shop.sid=orders.sid and orders.cid=customer.cid";
		$result=$conn->query($sql);
		$row = $result->fetch_assoc();
		$d=date('Y-m-d H:i:s',time());//下单时间
		$str = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);//随机生成订单号
		$sql="update orders set oid='{$str}' and otime='{$d}' where fid='{$f}'";
?>
	<p>订单号：<?php echo $str;?></p>
	<p>商家名称:<?php echo $row['sname'];?>|菜名：<?php echo $row['fname'];?>|数量：<?php echo $row['fnum'];?>|总计金额：<?php echo $row['fnum']*$row['price'];?></p>
	<p>用户名:<?php echo $row['cname'];?>|配送地址：<?php echo $row['caddr'];?>|下单时间：<?php echo $d;?></p>
<?php
	}
?>

