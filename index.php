<!DOCTYPE html>
<html>
    <?php include "include/head.php"?>
    <?php prt_title("首页"); ?>

<body>
    <?php include "include/header.php"?>
    <?php include "include/top-scroll.php"?>
    <main style="height: 10000px;">
        <div class="search">
            <div calss="search-box">
                <div class="search-bar ">
                    <span class="search-container clearfix"> <i class="i-search"></i> <span>
                            <input id="J-search-input" class="J-search-input" x-webkit-speech=""
                                x-webkit-grammar="builtin:translate"
                                data-s-pattern="https://www.dianping.com/search/keyword/{0}/{1}_"
                                data-s-epattern="https://www.dianping.com/lanzhou/{0}" data-s-cateid="0"
                                data-s-cityid="1" type="text" placeholder="搜索商户名、地址、菜名、外卖等" autocomplete="off"> </span>
                        <span class="search-bnt-panel"> <a target="_blank" class="search-btn J-search-btn"
                                id="J-all-btn" data-s-chanid="0">搜索</a> </span> </span>
                    <p class="hot-search J-hot-search"> </p>
                </div>
            </div>
        </div>
    </main>
</body>
<div id="js-content">
    <script>
        header_link(0);
    </script>
</div>
</html>

