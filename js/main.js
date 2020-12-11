// 当前header-link显示
function header_link(id){
    document.getElementById("header-link-"+id).setAttribute("class","active");
    console.log("link-"+id);
}