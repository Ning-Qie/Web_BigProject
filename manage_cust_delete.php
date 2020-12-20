<?php
include "include/manage_header.php";
ismanagelogin();
?>
<?php
if (!empty($_GET)){
    $id=$_GET['id'];
    $conn = new mysqli('localhost', 'root', '', 'waimai_db');
    $conn->query("set names utf8");
    $sql="DELETE FROM `customer` WHERE `cid`='$id'";
    $result=$conn->query($sql);
}
?>