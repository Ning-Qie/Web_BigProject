"use strict";

// 当前header-link显示
function header_link(id) {
  document.getElementById("header-link-" + id).setAttribute("class", "active"); // console.log("link-"+id);
} // 自动跳转页面


function go_somepage(t1, url) {
  var time = t1; //时间,秒

  function redirect() {
    //跳转页
    window.location.href = "" + url + ""; //指定要跳转到的目标页面
  }

  timer = setTimeout(redirect(), time * 1000); //跳转
} // 用户注销确认


function account_logout_confirm() {
  var r = confirm("确认注销？");

  if (r == true) {
    location.href = "account_logout.php";
  }
} //商家注销确认


function shop_logout_confirm() {
  var r = confirm("确认注销？");

  if (r == true) {
    location.href = "shop_logout.php";
  }
} //管理员注销确认


function manage_logout_confirm() {
  var r = confirm("确认注销？");

  if (r == true) {
    location.href = "manage_logout.php";
  }
} //用户信息修改确认


function account_info_change_confirm() {
  var r = confirm("确认修改用户信息？");

  if (r == true) {
    return true;
  } else {
    return false;
  }
} //用户信息错误提示


function register_error() {
  var r = confirm("注册信息不规范，请返回重新注册。");

  if (r == true) {// location.href="account_register.php"; 
  } else {// location.href="account_register.php"; 
    }
} //注册确认


function register_finish() {
  var r = confirm("注册成功！");

  if (r == true) {
    location.href = "account_logout.php";
  } else {
    location.href = "account_logout.php";
  }
} //无订单确认


function no_orders_confirm() {
  var r = confirm("您还没有订单，请到处看看吧！");

  if (r == true) {
    location.href = "index.php";
  } else {
    location.href = "index.php";
  }
} //商户订单状态订单确认


function shop_edit_order_confirm() {
  var r = confirm("订单状态修改成功！");

  if (r == true) {
    location.href = "Shop_order.php";
  } else {
    location.href = "Shop_order.php";
  }
} //商户菜品编辑确认


function shop_food_edit_confirm() {
  var r = confirm("菜品信息修改成功！");

  if (r == true) {
    location.href = "Shop_show.php";
  } else {
    location.href = "Shop_show.php";
  }
} //订单支付确认


function Trolley_pay_confirm() {
  var r = confirm("确认支付？");

  if (r == true) {
    return true;
  } else {
    return false;
  }
} //管理员注销确认


function index_no_search_res() {
  var r = confirm("没有搜索到内容，请重新搜索!");

  if (r == true) {
    location.href = "index.php";
  } else {
    location.href = "index.php";
  }
} //<!-- 全选 -->


function checkAll() {
  console.log("全选");
  var allchecked = document.getElementById("all1").checked;
  var check = document.getElementsByName("check[]");

  for (var i = 0; i < check.length; i++) {
    check[i].checked = allchecked;
  }

  calculateMoney();
} //<!-- 全选判断-->


function calculateMoney() {
  var allchecked = document.getElementById("all1");
  var check = document.getElementsByName("check[]");
  var count = 0; //定义一个计数器

  for (var m = 0; m < check.length; m++) {
    //判断是否取消全选
    if (!check[m].checked) {
      allchecked.checked = false;
    } else {
      //如果是选中状态，计数器+1
      count++; // console.log("count++：",count);
      // console.log("cl",check.length);
    } //判断是否都是选中状态/如果是则自动选中全选按钮


    if (count == check.length) {
      allchecked.checked = true;
    }
  } // console.log("统计金额");


  var sum = 0;
  var check = document.getElementsByName("check[]");

  for (var i = 0; i < check.length; i++) {
    if (check[i].checked) {
      // console.log(check[i].getAttribute('price_sum'));
      // document.getElementsByName("check").getAttribute
      sum += parseFloat(check[i].getAttribute('price_sum'));
    }
  }

  var sumMoneyObj = document.getElementById("sumMoney");
  sumMoneyObj.innerHTML = "总金额：￥" + sum;
} //给每个产品复选框加上自动统计功能


function iniEvent() {
  // console.log("自动统计");
  var check = document.getElementsByName("check[]");

  for (var i = 0; i < check.length; i++) {
    check[i].onclick = calculateMoney;
  }
}