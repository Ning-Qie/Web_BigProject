<?php 
	require('conn.php');
	$id=$_GET['id'];
	$sql="update orders set ostate=1 where oid='{$id}'";
    $result1=$conn->query($sql);
    header("location:Trolley_order_show.php?search={$id}");
?>