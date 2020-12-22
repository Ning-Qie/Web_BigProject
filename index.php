<!DOCTYPE html>
<html>
<?php include "include/head.php"?>
<?php prt_title("首页"); ?>

<body>
    <?php include "include/header.php"?>
    <?php include "include/top-scroll.php"?>
    <div class="search">
        <div calss="search-box">
            <div class="search-bar ">
                <span class="search-container clearfix"><span>
                <form method="get" action="index.php">
                        <input id="J-search-input" name="key" class="J-search-input" type="text"
                            placeholder="搜索商户名、菜名" autocomplete="off">
                        <span class="search-bnt-panel">
                            <input type="submit" value="搜索" class="search-btn J-search-btn">
                        </span>
                        <p class="hot-search J-hot-search"> </p>
                </form>
            </div>
        </div>
    </div>
    <main>
        <div class="foods-content">
            <div class="zhenguo-container">
                <div class="minsu-ls-view clearfix">
                    <div class="products" style="display: flex;">
                        <?php
                            $conn = new mysqli('localhost', 'root', '', 'waimai_db');
                            $conn->query("set names utf8");
                            // $index_PageSize=4;//每页显示条数
                            //获取总页数
                            if(!empty($_GET['key'])){
                                // $k="(fname like '%key%' or sname like '%key%')";
                                $key = $_GET['key'];
                                $k="(fname like '%$key%' or sid=(select sid from shop where sname like '%$key%'))";
                                $sql="select * from food where $k";
                                $result=$conn->query($sql);
                                $s=$result->num_rows;//取出记录的总条数
                            }
                            else{
                                $sql="select * from food";
                                $result=$conn->query($sql);
                                $s=$result->num_rows;//取出记录的总条数
                            }
                            if($s==0){ echo "<script>index_no_search_res();</script>"; }
                            $totalPage = ceil($s/$index_PageSize);//总页数
                            if(!empty($_GET['page'])){
                                $page=$_GET['page'];
                            }
                            else{
                                $page=1;
                            }
                            if ($page>$totalPage){
                                $page=$totalPage;
                            }//超出最大页限制
                            $start=($page-1)*$index_PageSize;
                            if(!empty($_GET['key'])){
                            // $k="(fname like '%key%' or sname like '%key%')";
                            $sql="select * from food where $k order by `pro` desc,`onsale` desc LIMIT $start,$index_PageSize";
                            }
                            else{
                            $sql="select * from food order by `pro` desc,`onsale` desc,`soldnum` desc LIMIT $start,$index_PageSize";
                            }
                            $result=$conn->query($sql); 
                            while ($row = $result->fetch_assoc()) {
                                $t="select * from shop where sid={$row['sid']}";
                                $shopinfo=$conn->query($t);
                                $s_row = $shopinfo->fetch_assoc();
                            ?>
                        <div class="minsu-item">
                            <div class="product-card-header">
                                <a href="Food_info.php?fid=<?php echo $row['fid'] ?>" target="_blank">
                                    <img src="<?php echo $row['fpic']; ?>" class="product-img">
                                </a>
                                <a href="Shop_Food_info.php?sid=<?php echo $s_row['sid'] ?>" target="_blank">
                                    <img src="<?php echo $s_row['slogo']; ?>"alt="" class="head-img" 
                                    title="商家：<?php echo $s_row['sname']; ?>
                                    &#10;联系方式：<?php echo $s_row['stel']; ?>
                                    &#10;地址：<?php echo $s_row['saddr']; ?>">
                                </a>
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
                    <div class="food-page">
                        <a href=index.php?&page=1&key=<?php if(!empty($_GET['key'])) echo $_GET['key']; ?>>首页</a> |
                            <?php
                            for ($x=1; $x<=$totalPage; $x++) {
                                if($x==$page){ echo $x;}
                                else{
                            ?>
                            <a href=index.php?page=<?php echo $x ?>&key=<?php if(!empty($_GET['key'])) echo $_GET['key']; ?>><?php echo $x ?></a>
                            <?php
                                }
                        }
                        ?>
                            | <a href=index.php?page=<?php echo $totalPage ?>&key=<?php if(!empty($_GET['key'])) echo $_GET['key']; ?>>尾页</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

<div id="js-content">
    <script>
        header_link(0);
        document.getElementsByClassName("csr-header")[0].setAttribute("class", "csr-header csr-header-transparent");
        window.addEventListener("scroll", header_change);

        function header_change() {
            var sh = document.documentElement.scrollTop;
            // console.log(sh);
            if (sh > 10) document.getElementsByClassName("csr-header")[0].setAttribute("class", "csr-header");
            else document.getElementsByClassName("csr-header")[0].setAttribute("class",
                "csr-header csr-header-transparent");
        }
    </script>
</div>

</html>