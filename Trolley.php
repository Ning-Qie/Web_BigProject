<!DOCTYPE html>
<html>
<?php include "include/head.php"?>
<?php
    islogin();
    prt_title("餐车");
?>

<body onload="iniEvent()">
    <?php include "include/header.php"?>

    <?php
        //连接数据库
        require('conn.php');
        // if(isset($_SESSION['valid_user'])){
        @session_start();
        $cid = $_SESSION['valid_user'];
        // echo "select * from orders where ostate=0 and cid='{$cid}'";
        $sql="select * from orders where ostate=0 and cid='{$cid}'";
        $result=$conn->query($sql);
        if(!empty($result)){
            ?>
            <div class="main-content archive-page clearfix">
                <div class="post-lists">
                    <div class="post-lists-body">
                        <form action="Trolley_orders_pay.php" method="post" onsubmit="return Trolley_pay_confirm()">
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            $fid=$row['fid'];
                            //查询数据库
                            $sql="select * from food where fid='{$fid}'";
                            $result1=$conn->query($sql);
                            while ($row1 = $result1->fetch_assoc()) {
                            ?>
                                <div class="post-list-item" style="width: 90%;">
                                    <div class="post-list-item-container">
                                        <input type="checkbox" name="check[]" class="Trolley-check" value="<?php echo $row['oid']?>" price_sum="<?php echo $row1['price']*$row['fnum']; ?>">
                                        <div class="item-label" style="height: 150px;">
                                            <div class="item-title">
                                                <!-- 勾选框 -->
                                                <!-- <input type="checkbox" name="check[]" class="Trolley-check" value="<?php echo $row['oid']?>" price_sum="<?php echo $row1['price']*$row['fnum']; ?>"> -->
                                                <input type="hidden" name="fid[]" value="<?php echo $row1['fid'];?>">
                                                <!-- 商家号：<?php echo $row1['sid'];?> -->
                                                <!-- 菜品名称 -->
                                                <a style="font-weight: bold;font-size: larger;display: unset;" href="Food_info.php?fid=<?php echo $row1['fid'] ?>" target="_blank">
                                                    <?php echo $row1['fname']; ?>
                                                </a>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <font style="color: #e65353;font-size: inherit;font-weight: 900;"><?php echo "￥".$row1['price']*$row['fnum']; ?></font>
                                            </div>
                                            <div class="item-meta clearfix">
                                                <div class="item-meta-ico bg-ico-{{post.icon}}"
                                                    style="background: url(<?php echo $row1['fpic']; ?>) no-repeat;background-size: cover;background-position: center;width: 100px;height: 100px;">
                                                </div>
                                                <div class="item-meta-date" style="padding-top: 80px;">
                                                    数量：
                                                    <a href="Trolleysub.php?id=<?php echo $row1['fid']; ?>">－</a>
                                                    <?php echo $row['fnum']; ?>
                                                    <a href="Trolleyadd.php?id=<?php echo $row1['fid']; ?>">＋</a>
                                                    <a href="Trolleydel.php?id=<?php echo $row1['fid']; ?>" style="padding-left: 20px;">删除</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
    ?>

</body>

<footer id="footer" class="footer bg-white">
    <div class="inner">
        <div class="footer-meta">
            <div class="footer-container">
                <div class="meta-item meta-copyright">
                    <div class="meta-copyright-info">
                        <div class="info-text">
                            <input id="all1" type="checkbox" name="all" class="Trolley-check" onclick="checkAll()">全部选择
                            <span id="sumMoney">总金额：￥0</span><br>
                            <input type="submit" name="sub" value="支付" class="pay-button"></a><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="js-content">
    <script>
        header_link(3);
    </script>
</div>

</html>

