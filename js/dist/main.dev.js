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
} // 注销确认


function logout_confirm() {
  var r = confirm("确认注销？");

  if (r == true) {
    location.href = "account_logout.php";
  }
}