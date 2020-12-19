<?php 
//连接数据库
$conn = new mysqli('localhost','root','','waimai_db');
if ($conn->connect_errno){
  die("数据库连接失败：".$conn->connect_errno);
}
// echo "数据库连接成功";
$conn->query("set names utf8");
?>