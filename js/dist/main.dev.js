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
} //管理员注销确认


function account_info_change_confirm() {
  var r = confirm("确认修改用户信息？");

  if (r == true) {
    return true;
  } else {
    return false;
  }
} //<!-- 全选 -->


function checkAll() {
  console.log("全选");
  var allchecked = document.getElementById("all1").checked;
  var check = document.getElementsByName("check");

  for (var i = 0; i < check.length; i++) {
    check[i].checked = allchecked;
  }

  calculateMoney();
} //<!-- 全选判断-->


function calculateMoney() {
  var allchecked = document.getElementById("all1");
  var check = document.getElementsByName("check");
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
  var check = document.getElementsByName("check");

  for (var i = 0; i < check.length; i++) {
    if (check[i].checked) {
      // console.log(check[i].getAttribute('price_sum'));
      // document.getElementsByName("check").getAttribute
      sum += parseFloat(check[i].getAttribute('price_sum'));
    }
  }

  var sumMoneyObj = document.getElementById("sumMoney");
  sumMoneyObj.innerHTML = "总金额:" + sum;
} //给每个产品复选框加上自动统计功能


function iniEvent() {
  // console.log("自动统计");
  var check = document.getElementsByName("check");

  for (var i = 0; i < check.length; i++) {
    check[i].onclick = calculateMoney;
  }
}