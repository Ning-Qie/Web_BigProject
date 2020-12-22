<?php
include "include/head.php";
prt_title("我的订单");
islogin();
include "include/header.php";
?>



<div class="search" style="height: 200px;">
    <div calss="search-box">
        <div class="search-bar ">
            <span class="search-container clearfix"><span>
            <form method="get" action="Trolley_order_show.php">
                    <input id="J-search-input" name="search" class="J-search-input" type="text"
                        placeholder="商家、菜品名、订单号搜索" autocomplete="off">
                    <span class="search-bnt-panel">
                        <input type="submit" value="搜索" class="search-btn J-search-btn">
                    </span>
                    <p class="hot-search J-hot-search"> </p>
            </form>
        </div>
    </div>
</div>



<div class="ning-content" style="margin-top: 50px;">
    <?php
    // 1.连接数据库
    require "conn.php";
    @session_start();
    if (isset($_SESSION['valid_user'])) {
        $username = $_SESSION['valid_user'];
        ?>
        <div class="shop-content">
            <?php
            if (!empty($_GET['search'])) {
                $search = $_GET['search'];
                // 2.编写执行sql语句
                $sql = "select distinct oid,cid,sid,ostate,otime from `orders` where `cid`=$username and (`ostate`<>0) and (`oid` like '%$search%' or sid=(select sid from shop where sname like '%$search%') or fid=(select fid from food where fname like '%$search%')) order by `otime` desc,`ostate` asc";
                // echo $sql;
            } else $sql = "SELECT distinct oid,cid,sid,ostate,otime FROM `orders` WHERE cid=$username and (`ostate`=1 or `ostate`=2 or `ostate`=3) order by `otime` desc,`ostate` asc";
            $result = $conn->query($sql);
            // 执行查询语句，并将资源型结果集存储在变量中

            //分页
            $rows = $result->num_rows; //取出记录的总条数
            $totalPage = ceil($rows / $Trolley_orders_info_pageSize); //总页数
            if (!empty($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            if ($page > $totalPage) {
                $page = $totalPage;
            } //超出最大页限制
            $start = ($page - 1) * $Trolley_orders_info_pageSize;
            $fenye = " LIMIT $start,$Trolley_orders_info_pageSize";
            $sql = $sql . $fenye;
            //echo $sql;
            $result = $conn->query($sql);

            // 3.遍历结果集，取出每一行记录
            if(!empty($result)){
                //判断有无订单
                while ($row = $result->fetch_assoc()) {
                    $sql_shop = "select * from shop where sid='{$row['sid']}'";
                    $result_shop = $conn->query($sql_shop);
                    $row_shop = $result_shop->fetch_assoc();
                    ?>
                    <div class="food-main" style="margin-top: 20px;">
                        <div class="food-info-content">
                            <div class="food-info-box" style="min-height: 320px;">
                                <div class="food-info-left" style="width: 100%;padding-right: 0px;">
                                    <div class="food-name">
                                        <a href="Trolley_order_show.php?search=<?php echo $row['oid']; ?>">订单号：<?php echo $row['oid']; ?></a>
                                        <span class="food-price">
                                            <?php
                                                if ($row['ostate'] == 1)
                                                    echo "已取消订单";
                                                else if ($row['ostate'] == 2)
                                                    echo "已接单";
                                                else if ($row['ostate'] == 3)
                                                    echo "已完成";
                                            ?>
                                        </span>
                                        <!-- <br><span class="food-price" style="color:darkgoldenrod;">商家名称：<?php echo $row_shop['sname']; ?></span> -->
                                    </div>
                                    <div class="food-base-info">
                                        <span >商家：
                                            <a href="Shop_Food_info.php?sid=<?php echo $row_shop['sid'] ?>" target="_blank">
                                                <?php echo $row_shop['sname'] ?>
                                            </a>
                                        </span>
                                        <span> | 联系方式：<?php echo $row_shop['stel'] ?></span>
                                        <span> | 地址：<?php echo $row_shop['saddr'] ?></span>
                                    </div>
                                    <div class="food-infos">
                                        <?php
                                        $condition = $row['oid'];
                                        $sql1 = "select * from `orders` where `cid` = $username and `sid`='{$row['sid']}' and (`oid` = '$condition')";
                                        $result1 = $conn->query($sql1);
                                        // echo($sql1);
                                        while ($row1 = $result1->fetch_assoc()) {
                                            $sql_food = "select * from food where fid='{$row1['fid']}'";
                                            $result_food = $conn->query($sql_food);
                                            $row_food = $result_food->fetch_assoc();
                                        ?>
                                            <!-- <p><?php echo $row['fdes'] ?></p> -->
                                            <p>
                                                菜品名称：<?php echo $row_food['fname']; ?>
                                                | 购买数量：<?php echo $row1['fnum']; ?>
                                                | 单价：<?php echo $row_food['price']; ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                    <div style="margin-top:30px;">
                                        <p>订单创建时间:<?php echo $row['otime']; ?>
                                        <?php if ($row['ostate'] == 2) { ?>
                                            <p><a href="Trolley_order_cancel.php?id=<?php echo $row['oid']; ?>" onclick="return confirm('确定要取消订单吗')">取消订单</a></p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
            }
            //没有订单则输出
            else{
                echo "<script>no_orders_confirm();</script>";
            }
            ?>
            <div class="page-num-box">
                <!-- 分页 -->
                <p><a href=Trolley_orders_info.php?page=1>首页</a> |
                <?php
                for ($x = 1; $x <= $totalPage; $x++) {
                    if ($x == $page) {
                        echo $x;
                    } else {
                ?>
                        <a href=Trolley_orders_info.php?page=<?php echo $x ?>><?php echo $x ?></a>
                <?php
                    }
                }
                ?>
                | <a href=Trolley_orders_info.php?page=<?php echo $totalPage ?>>尾页</a></p>
            </div>
        </div>
    <?php
    }else echo "没有权限";
    ?>
</div>

<div id="js-content">
    <script>
        header_link(3);
    </script>
</div>