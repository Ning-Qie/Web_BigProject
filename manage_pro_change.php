<?php
include "include/manage_header.php";
ismanagelogin();
?>
<?php
    $pro = $_POST['pro'];
    $fid = $_POST['fid'];
    $conn = new mysqli('localhost', 'root', '', 'waimai_db');
    $conn->query("set names utf8");
    $sql="UPDATE `food` SET `pro`=$pro WHERE `fid`=$fid";
    $result=$conn->query($sql);
?>
