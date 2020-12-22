<?php 
	include "include/head.php";
    islogin();
    prt_title("支付中");
?>
<?php
//订单信息
	require('conn.php');
	@session_start();
	//设置时区为北京时间
	date_default_timezone_set("PRC");
	$oid=@$_POST['check'];
	if($oid){
	$o=count($oid);
	//生成订单
		$d=date('Y-m-d H:i:s',time());//下单时间
		// echo $d;
		$str = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);//随机生成订单号
		//合并订单并更新
		for($i=0;$i<$o;$i++){
			$r=$oid[$i];
			//修改销售数量
			$sql="select * from orders where oid='$r'";
			$result=$conn->query($sql);
			while($row=$result->fetch_assoc()){
				$fid=$row['fid'];
				$f_num=$row['fnum'];
				$sid=$row['sid'];
				print_r($fid);
				$soldnum="update food set soldnum=soldnum+$f_num where fid='$fid'";
				$conn->query($soldnum);
				$sql="update orders set oid='{$sid}{$str}',otime='{$d}',ostate=2 where oid='{$r}'";
				$conn->query($sql);
			}
		}

		header("location:Trolley_order_show.php?search={$str}");
		}
	else{
		header("location:Trolley.php?");
	}
?>


