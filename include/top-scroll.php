<div id="backTop" class="top-scroll" style="display: block;">
    <a class="btn-floating" href="#">
        <i class="fas fa-arrow-up"></i>
    </a>
</div>
<div id="js-content">
    <script>
        document.getElementById("backTop").setAttribute("style","display:none;");
        window.addEventListener("scroll", backtop_change);
        function backtop_change(){
            var toph = document.documentElement.scrollTop;
            // console.log(toph);
            if(toph<50) document.getElementById("backTop").setAttribute("style","display:none;");
            else document.getElementById("backTop").setAttribute("style","display:block;");
        }
    </script>
</div>