<?php 
include "include/Shop_header.php";
isshoplogin();
prt_title("菜品发布-商户中心");
?>

<div class="shop-content">

<?php
    if (isset($_FILES['upfile'])) {
        // echo "<pre>";
        // print_r($_FILES);
        // echo "<pre>";

        //判断上传是否有错
        $allow_files=array('.jpg','.png','.gif');//判断文件后缀
        $type=strchr($_FILES['upfile']['name'],'.');
        if(!in_array($type, $allow_files)) {
            echo "<br>上传文件不是jpg图像<br>";
            exit;
        }

        if ($_FILES['upfile']['type']!='image/jpeg') {//判断mime类型
            echo "<br>上传文件不是jpg图像<br>";
            exit;
        }

        //创建finfo资源
        $info=finfo_open(FILEINFO_MIME_TYPE);
        //将info资源与本身的文件做比较
        $mine=finfo_file($info,$_FILES['upfile']['tmp_name']);

        $allow=array('image/jpeg','image/png','image/gif');//判断文件后缀
        if(!in_array($mine, $allow))   {
            echo "<br>上传文件不是图像文件<br>";
            exit;
        }

        if ($_FILES['upfile']['error']!=0){
            echo "上传失败：".$_FILES['upfile']['error']."<br>";//可以从所有错误号，准确判断
            exit;
        }
        //设置目标位置
        // $upload_dir='./upload/'.$_FILES['upfile']['name'];
        $upload_dir='./image/food/';
        if(is_uploaded_file($_FILES['upfile']['tmp_name'])) {
            
            $type=strrchr($_FILES['upfile']['name'], '.');//从右边开始分割
            $filename=time().rand(100,900).$type;
            $newfile=$upload_dir.$filename;

            //$is = move_uploaded_file($_FILES['upfile']['tmp_name'], $upload_dir);
            $is = move_uploaded_file($_FILES['upfile']['tmp_name'], $newfile);
            if(!$is) {
                echo "<br不能移动到指定目录<br>";
                exit;
            }
        }
        echo "<br>上传成功<br>";
        
        echo "<img src=".$newfile.">";
        // header("location:Shop_Food_add.php?newfile=".$newfile);
        ?>
        <!-- <a href=Shop_show.php?newfile=<?php echo $newfile; ?>>继续添加菜品信息</a> -->
        
        <?php

    }

?>

<form  enctype="multipart/form-data" method="post" action="Shop_Food_add.php">
    <!-- <input type="hidden" name="MAX_FILE_SIZE" value="90000"><!-- 限制表单大小需要在file表单向之前 -->
    <input type="file" name="upfile">
    <input type="submit" value="上传文件">
</form>



<?php
//1、接受表单数据
if(!empty($_POST['sub']) && !empty($_POST['fname']) && !empty($_POST['price'])) {
	$sid=$_POST['sid'];
	$fname=$_POST['fname'];
	$soldnum=$_POST['soldnum'];
	$onsale=$_POST['onsale'];
	$fdes=$_POST['fdes'];
	$fpic=$_POST['fpic'];
	$price=$_POST['price'];

// 2、连接数据库
	require "conn.php";

// 3、编写sql语句
// "INSERT INTO `food`(`fid`, `sid`, `fname`, `soldnum`, `onsale`, `fdes`, `fpic`, `price`) VALUES (null, '$sid', '$fname', '$soldnum', '$onsale', '$fdes', '$fpic', '$price')";
	$sql="INSERT INTO `food`(`fid`, `sid`, `fname`, `soldnum`, `onsale`, `fdes`, `fpic`, `price`) VALUES (null, '$sid', '$fname', '$soldnum', '$onsale', '$fdes', '$fpic', '$price')";
	// echo "$sql";
	// 4、执行sql语句
	$is=$conn->query($sql);
	if($is) {
		// echo $sql;
		// echo"插入成功，<a href=show.php>查看菜品";
		header("location:Shop_show.php");//直接跳转到目标页面
	}
	else
		echo"插入失败";
}
else {
    echo "填内容了憨憨！!";
}


?>
<?php
//图片上传
$fpic="./image/food/default.jpg";//为上传的话使用默认图片
// if(!empty($_GET['newfile'])) {
//     $newfile=$_GET['newfile'];
//     $fpic=$newfile;
// }
if(!empty($newfile)){
    $fpic=$newfile;
}
?>


<div class="security_content">
    <div class="security-right">
        <div data-v-4cbad597="" class="security-right-title"><span data-v-4cbad597="" class="security-right-title-icon"></span> <span data-v-4cbad597="" class="security-right-title-text">登录</span>
        </div>
        <div class="user-setting-warp">
            <div>
                <form class="el-form clearfix" method="post" action="Shop_Food_add.php">
                    <input type="hidden" name="sid" value="<?php @session_start(); $username=$_SESSION['valid_shop']; echo $username; ?>">
                    <input type="hidden" name="soldnum" value=0>
                    <input type="hidden" name="fpic" value="<?php echo $fpic; ?>">
                    <input type="hidden" name="onsale" value=1><br>
                    <div class="el-form-item user-nick-name"><label class="el-form-item__label">菜品名:</label>
                        <div class="el-form-item__content">
                            <div class="el-input">
                                <input autocomplete="off" placeholder="菜品名称" type="text" rows="2" maxlength="16" validateevent="true" class="el-input__inner" name="fname">
                            </div> <span class="nick-name-not"> </span>
                        </div>
                    </div>
                    <div class="el-form-item user-nick-name"><label class="el-form-item__label">价格:</label>
                        <div class="el-form-item__content">
                            <div class="el-input">
                                <input autocomplete="off" placeholder="价格" rows="2" maxlength="16" validateevent="true" class="el-input__inner" type="text" name="price">
                            </div> <span class="nick-name-not"> </span>
                        </div>
                    </div>
                    <div class="el-form-item user-my-sign"><label class="el-form-item__label">菜品简介:</label>
                        <div class="el-form-item__content">
                            <div class="el-textarea"><textarea name="fdes" placeholder="菜品简介" type="textarea" rows="2"
                                    autocomplete="off" validateevent="true" class="el-textarea__inner"></textarea></div>
                        </div>
                    </div>
                    <div class="el-form-item user-my-btn">
                        <div class="el-form-item__content">
                            <div class="padding-dom"></div>
                            <div class="user-my-btn-warp">
                                <input type="submit" name="sub" value="添加菜品" class="el-button el-button--primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>