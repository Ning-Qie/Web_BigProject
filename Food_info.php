<?php
    include "include/head.php";
    include "include/header.php";
    prt_title("菜品详情");
?>
<!-- 菜品详情 -->
<?php
    Food_info_show();
    function Food_info_show()
    {
        $fid = $_GET['fid'];
        require('conn.php');
        $sql="select * from food where fid='{$fid}'";
        $result=$conn->query($sql); 
        while ($row = $result->fetch_assoc()) {
            $t="select * from shop where sid={$row['sid']}";
            $shopinfo=$conn->query($t);
            $s_row = $shopinfo->fetch_assoc();
        ?>
            <div class="food-main">
                <div class="food-info-content">
                    <div class="food-info-box">
                        <div class="food-info-left">
                            <div class="food-name">
                                <?php echo $row['fname']; ?>
                                <span class="food-price">￥<?php echo $row['price'] ?></span>
                            </div>
                            <div class="food-base-info">
                                <span >销售量：<?php echo $row['soldnum'] ?></span>
                                <span ><?php if($row['onsale']==1){echo "正在销售<br>";}else{echo "售罄"."<br>";}?></span>
                            </div>
                            <div class="food-infos">
                                <p><?php echo $row['fdes'] ?></p>
                            </div>
                            <div class="shop-info">
                                <div class="shop-logo-img">
                                    <img src='<?php echo $s_row['slogo'] ?>'>
                                </div>
                                <a href="Shop_Food_info.php?sid=<?php echo $s_row['sid'] ?>" target="_blank">
                                    <h3 style="margin-top: unset;"><?php echo $s_row['sname'] ?></h3>
                                </a>
                                <p>联系方式：<?php echo $s_row['stel'] ?></p>
                                <p>地址：<?php echo $s_row['saddr'] ?></p>
                            </div>
                            <div style="margin-top:30px;">
                                <?php if($row['onsale']==1) echo "<a href=\"Add_to_Trolley.php?fid={$row['fid']}&sid={$row['sid']}\">添加至餐车</a>"; ?>
                            </div>
                        </div>
                        <div class="food-info-right">
                            <img src='<?php echo $row['fpic'] ?>'>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    }
?>