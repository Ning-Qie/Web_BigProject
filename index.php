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
                    <form>
                        <input id="J-search-input" class="J-search-input"
                            type="text" placeholder="搜索商户名、地址、菜名、外卖等" autocomplete="off">
                        <span class="search-bnt-panel">
                            <a href="#!" class="search-btn J-search-btn" id="J-all-btn" data-s-chanid="0">
                                <i class="fas fa-search"></i>
                                搜索
                            </a>
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
                            $sql="select * from food where onsale<>0";
                            $result=$conn->query($sql);
                            $s=$result->num_rows;//取出记录的总条数
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
                            $sql="select * from food order by `pro`,`onsale` desc LIMIT $start,$index_PageSize";
                            $result=$conn->query($sql); 
                            while ($row = $result->fetch_assoc()) {
                                $t="select * from shop where sid={$row['sid']}";
                                $shopinfo=$conn->query($t);
                                $s_row = $shopinfo->fetch_assoc();
                            ?>
                        <div class="minsu-item">
                            <?php echo "<a href=\"Food_info.php?fid={$row['fid']}\" target=\"_blank\">"; ?>
                            <div class="product-card-header">
                                <img src="<?php echo $row['fpic']; ?>" class="product-img">
                                <img src="<?php echo $s_row['slogo']; ?>" alt="" class="head-img">
                            </div>
                            <div class="product-info">
                                <p class="product-title"><?php echo $row['fname']; ?></p>
                                <p class="sub-title" style="float: right;"><?php echo $s_row['sname']; ?></p>
                                <p class="sub-title">
                                    <span><?php echo $row['fdes']; ?></span>
                                    <span>
                                    <?php
                                        if($row['onsale']==1){
                                            echo " | 销售量：".$row['soldnum'];
                                        }
                                        else{
                                            echo " | 已售罄";
                                        }
                                    ?>
                                    </span>
                                </p>
                                <p class="price-number numfont price"><span
                                        class="price-icon">￥</span><?php echo $row['price']; ?></p>
                            </div>
                            </a>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="food-page">
                        <a href=index.php?&page=1&key=>首页</a> |
                            <?php
                            for ($x=1; $x<=$totalPage; $x++) {
                                if($x==$page){ echo $x;}
                                else{
                            ?>
                            <a href=index.php?page=<?php echo $x ?>><?php echo $x ?></a>
                            <?php
                                }
                        }
                        ?>
                            | <a href=index.php?page=<?php echo $totalPage ?>>尾页</a>
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

<!-- <?php include "include/footer.php"?> -->
</html>