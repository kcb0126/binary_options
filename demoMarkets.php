<?php
require("ajax/functions.php");
if(!$userInfo)
	header("Location: index.php");
require("header.php");
?>
 
   <link rel="stylesheet" type="text/css" href="css/style-flot-chart.css">
   
<div class="col-sm-12 col-xs-12 over-padd-btc">
<div class="col-sm-12 col-xs-12 no-padd dash-box">
<h5 class="text-center dash-head">BTC ASSETS</h5>
   
<!-- first box -->
<div class="col-lg-3 col-sm-4 col-xs-12 btc-box-sec text-center">

<div class="col-sm-12 col-xs-12 no-padd border-box-btc">
<div class="col-md-6 col-sm-6 col-xs-6 no-padd ">
<h4 class="box-btc-head"style="text-align: left">Btc/Eth</h4>
</div>
<div class="col-md-6 col-sm-6 col-xs-6 no-padd ">
    <h4 class="box-btc-head" style="text-align: right"><i class="fa fa-caret-up"></i><span id="rate-btc-eth">0.00000</span></h4>
</div>
<div class="col-sm-12 col-xs-12 no-padd">

<div class="col-sm-12 col-xs-12 no-padd flot-chart" style="height: 160px">
     <div class="flot-chart-content" id="flot-line-chart-btc-eth"></div>
</div>


</div>


<div class="col-sm-12 col-xs-12 no-padd text-center">
<h3><span class="label label-success">+ 27% <i class="fa fa-caret-up" style="color:white"></i></span>
    <span class="label label-danger">+ 89%  <i class="fa fa-caret-down" style="color:white"></i></span></h3>

</div>    
    
    
<div class="col-sm-12 col-xs-12 no-padd text-center">
<h4 class="time-left">Time left: <span>02:30</span></h4>

</div>
<a href="demoMarket.php?market=btc-eth" class="btn btn-visit">Expand</a>

</div>
</div>
<!-- first box -->

 <!-- second box -->
<div class="col-lg-3 col-sm-4 col-xs-12 btc-box-sec text-center">

<div class="col-sm-12 col-xs-12 no-padd border-box-btc">
<div class="col-md-6 col-sm-6 col-xs-6 no-padd ">
<h4 class="box-btc-head"style="text-align: left">Btc/Ltc</h4>
</div>
<div class="col-md-6 col-sm-6 col-xs-6 no-padd ">
    <h4 class="box-btc-head" style="text-align: right"><i class="fa fa-caret-up"></i><span id="rate-btc-ltc">0.00000</span></h4>
</div>
<div class="col-sm-12 col-xs-12 no-padd">

<div class="col-sm-12 col-xs-12 no-padd flot-chart" style="height: 160px">
     <div class="flot-chart-content" id="flot-line-chart-btc-ltc"></div>
</div>


</div>


<div class="col-sm-12 col-xs-12 no-padd text-center">
<h3><span class="label label-success">+ 27% <i class="fa fa-caret-up" style="color:white"></i></span>
    <span class="label label-danger">+ 89%  <i class="fa fa-caret-down" style="color:white"></i></span></h3>

</div>


<div class="col-sm-12 col-xs-12 no-padd text-center">
<h4 class="time-left">Time left: <span>02:30</span></h4>

</div>
<a href="demoMarket.php?market=btc-ltc" class="btn btn-visit">Expand</a>

</div>
</div>
<!-- second box --> 
    
<!-- third box -->
<div class="col-lg-3 col-sm-4 col-xs-12 btc-box-sec text-center">

<div class="col-sm-12 col-xs-12 no-padd border-box-btc">
<div class="col-md-6 col-sm-6 col-xs-6 no-padd ">
<h4 class="box-btc-head"style="text-align: left">Btc/Neo</h4>
</div>
<div class="col-md-6 col-sm-6 col-xs-6 no-padd ">
    <h4 class="box-btc-head" style="text-align: right"><i class="fa fa-caret-up"></i><span id="rate-btc-neo">0.00000</span></h4>
</div>
<div class="col-sm-12 col-xs-12 no-padd">

<div class="col-sm-12 col-xs-12 no-padd flot-chart" style="height: 160px">
     <div class="flot-chart-content" id="flot-line-chart-btc-neo"></div>
</div>


</div>


<div class="col-sm-12 col-xs-12 no-padd text-center">
<h3><span class="label label-success">+ 27% <i class="fa fa-caret-up" style="color:white"></i></span>
    <span class="label label-danger">+ 89%  <i class="fa fa-caret-down" style="color:white"></i></span></h3>

</div>


<div class="col-sm-12 col-xs-12 no-padd text-center">
<h4 class="time-left">Time left: <span>02:30</span></h4>

</div>
<a href="demoMarket.php?market=btc-neo" class="btn btn-visit">Expand</a>

</div>
</div>
<!-- third box -->
    
<!-- fourth box -->
<div class="col-lg-3 col-sm-4 col-xs-12 btc-box-sec text-center">

<div class="col-sm-12 col-xs-12 no-padd border-box-btc">
<div class="col-md-6 col-sm-6 col-xs-6 no-padd ">
<h4 class="box-btc-head"style="text-align: left">Btc/Xrp</h4>
</div>
<div class="col-md-6 col-sm-6 col-xs-6 no-padd ">
    <h4 class="box-btc-head" style="text-align: right"><i class="fa fa-caret-up"></i><span id="rate-btc-xrp">0.00000</span></h4>
</div>
<div class="col-sm-12 col-xs-12 no-padd">

<div class="col-sm-12 col-xs-12 no-padd flot-chart" style="height: 160px">
     <div class="flot-chart-content" id="flot-line-chart-btc-xrp"></div>
</div>


</div>


<div class="col-sm-12 col-xs-12 no-padd text-center">
<h3><span class="label label-success">+ 27% <i class="fa fa-caret-up" style="color:white"></i></span>
    <span class="label label-danger">+ 89%  <i class="fa fa-caret-down" style="color:white"></i></span></h3>

</div>


<div class="col-sm-12 col-xs-12 no-padd text-center">
<h4 class="time-left">Time left: <span>02:30</span></h4>

</div>
<a href="demoMarket.php?market=btc-xrp" class="btn btn-visit">Expand</a>

</div>
</div>
<!-- fourth box -->    

    
    
    
    
</div>

</div>



<div class="col-sm-12 col-xs-12 over-padd-btc">
<div class="col-sm-12 col-xs-12 no-padd dash-box">
<h5 class="text-center dash-head">ETH ASSETS</h5>



<!-- first box -->
<div class="col-lg-3 col-sm-4 col-xs-12 btc-box-sec text-center">

<div class="col-sm-12 col-xs-12 no-padd border-box-btc">
<div class="col-md-6 col-sm-6 col-xs-6 no-padd ">
<h4 class="box-btc-head"style="text-align: left">Eth/Btc</h4>
</div>
<div class="col-md-6 col-sm-6 col-xs-6 no-padd ">
    <h4 class="box-btc-head" style="text-align: right"><i class="fa fa-caret-up"></i><span id="rate-eth-btc">0.00000</span></h4>
</div>
<div class="col-sm-12 col-xs-12 no-padd">

<div class="col-sm-12 col-xs-12 no-padd flot-chart" style="height: 160px">
     <div class="flot-chart-content" id="flot-line-chart-eth-btc"></div>
</div>


</div>


<div class="col-sm-12 col-xs-12 no-padd text-center">
<h3><span class="label label-success">+ 27% <i class="fa fa-caret-up" style="color:white"></i></span>
    <span class="label label-danger">+ 89%  <i class="fa fa-caret-down" style="color:white"></i></span></h3>

</div>


<div class="col-sm-12 col-xs-12 no-padd text-center">
<h4 class="time-left">Time left: <span>02:30</span></h4>

</div>
<a href="demoMarket.php?market=eth-btc" class="btn btn-visit">Expand</a>

</div>
</div><!-- first box -->

 <!-- second box -->
<div class="col-lg-3 col-sm-4 col-xs-12 btc-box-sec text-center">

<div class="col-sm-12 col-xs-12 no-padd border-box-btc">
<div class="col-md-6 col-sm-6 col-xs-6 no-padd ">
<h4 class="box-btc-head"style="text-align: left">Eth/Ltc</h4>
</div>
<div class="col-md-6 col-sm-6 col-xs-6 no-padd ">
    <h4 class="box-btc-head" style="text-align: right"><i class="fa fa-caret-up"></i><span id="rate-eth-ltc">0.00000</span></h4>
</div>
<div class="col-sm-12 col-xs-12 no-padd">

<div class="col-sm-12 col-xs-12 no-padd flot-chart" style="height: 160px">
     <div class="flot-chart-content" id="flot-line-chart-eth-ltc"></div>
</div>


</div>


<div class="col-sm-12 col-xs-12 no-padd text-center">
<h3><span class="label label-success">+ 27% <i class="fa fa-caret-up" style="color:white"></i></span>
    <span class="label label-danger">+ 89%  <i class="fa fa-caret-down" style="color:white"></i></span></h3>

</div>


<div class="col-sm-12 col-xs-12 no-padd text-center">
<h4 class="time-left">Time left: <span>02:30</span></h4>

</div>
<a href="demoMarket.php?market=eth-ltc" class="btn btn-visit">Expand</a>

</div>
</div>
<!-- second box -->
    
<!-- third box -->
<div class="col-lg-3 col-sm-4 col-xs-12 btc-box-sec text-center">

<div class="col-sm-12 col-xs-12 no-padd border-box-btc">
<div class="col-md-6 col-sm-6 col-xs-6 no-padd ">
<h4 class="box-btc-head"style="text-align: left">Eth/Neo</h4>
</div>
<div class="col-md-6 col-sm-6 col-xs-6 no-padd ">
    <h4 class="box-btc-head" style="text-align: right"><i class="fa fa-caret-up"></i><span id="rate-eth-neo">0.00000</span></h4>
</div>
<div class="col-sm-12 col-xs-12 no-padd">

<div class="col-sm-12 col-xs-12 no-padd flot-chart" style="height: 160px">
     <div class="flot-chart-content" id="flot-line-chart-eth-neo"></div>
</div>


</div>


<div class="col-sm-12 col-xs-12 no-padd text-center">
<h3><span class="label label-success">+ 27% <i class="fa fa-caret-up" style="color:white"></i></span>
    <span class="label label-danger">+ 89%  <i class="fa fa-caret-down" style="color:white"></i></span></h3>

</div>


<div class="col-sm-12 col-xs-12 no-padd text-center">
<h4 class="time-left">Time left: <span>02:30</span></h4>

</div>
<a href="demoMarket.php?market=eth-neo" class="btn btn-visit">Expand</a>

</div>
</div>
<!-- third box -->
    
<!-- fourth box -->
<div class="col-lg-3 col-sm-4 col-xs-12 btc-box-sec text-center">

<div class="col-sm-12 col-xs-12 no-padd border-box-btc">
<div class="col-md-6 col-sm-6 col-xs-6 no-padd ">
<h4 class="box-btc-head"style="text-align: left">Eth/Xrp</h4>
</div>
<div class="col-md-6 col-sm-6 col-xs-6 no-padd ">
    <h4 class="box-btc-head" style="text-align: right"><i class="fa fa-caret-up"></i><span id="rate-eth-xrp">0.00000</span></h4>
</div>
<div class="col-sm-12 col-xs-12 no-padd">

<div class="col-sm-12 col-xs-12 no-padd flot-chart" style="height: 160px">
     <div class="flot-chart-content" id="flot-line-chart-eth-xrp"></div>
</div>


</div>


<div class="col-sm-12 col-xs-12 no-padd text-center">
<h3><span class="label label-success">+ 27% <i class="fa fa-caret-up" style="color:white"></i></span>
    <span class="label label-danger">+ 89%  <i class="fa fa-caret-down" style="color:white"></i></span></h3>

</div>


<div class="col-sm-12 col-xs-12 no-padd text-center">
<h4 class="time-left">Time left: <span>02:30</span></h4>

</div>
<a href="demoMarket.php?market=eth-xrp" class="btn btn-visit">Expand</a>

</div>
</div>
<!-- fourth box -->   


</div>

</div>

  </div>
</div>
<!-- container-fluid -->




</body>
</html>




<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script>
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
</script>


<script>

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

  <script type="text/javascript">
  
      $(document).ready(function(){
          $('.click-bar').click(function(){
              $('.menu-header').slideToggle();
          });
      });    

  </script>
  
  
  <script>
  
      var rightJS = {
  init: function(){
    rightJS.Tags = document.querySelectorAll('.rightJS');
    for(var i = 0; i < rightJS.Tags.length; i++){
      rightJS.Tags[i].style.overflow = 'hidden';
    }
    rightJS.Tags = document.querySelectorAll('.rightJS div');
    for(var i = 0; i < rightJS.Tags.length; i++){
      rightJS.Tags[i].style.position = 'relative';
      rightJS.Tags[i].style.right = '-'+rightJS.Tags[i].parentElement.offsetWidth+'px';
    }
    rightJS.loop();
  },
  loop: function(){
    for(var i = 0; i < rightJS.Tags.length; i++){
      var x = parseFloat(rightJS.Tags[i].style.right);
      x ++;
      var W = rightJS.Tags[i].parentElement.offsetWidth;
      var w = rightJS.Tags[i].offsetWidth;
      if((x/100) * W  > w) x = -W;
      rightJS.Tags[i].style.right = x + 'px';
    } 
    requestAnimationFrame(this.loop.bind(this));
  }
};
window.addEventListener('load',rightJS.init);

/* JQUERY */

$(function(){
  var rightJQ = {
    init: function(){
    $('.rightJQ').css({
        overflow: 'hidden'
      });
      rightJQ.loop();
    },
    loop: function(){
      $('.rightJQ div').css({
        position: 'relative',
        right: '-100%'
      }).animate({
        right: '100%'
      }, 15000, 'linear' );
      setTimeout(rightJQ.loop, 15010);
    }
  };
  rightJQ.init();
});
  
      
      
  </script>
    
    
    <script>
/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction2() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>

<!-- Vendor scripts -->
<script src="vendor/jquery-flot/jquery.flot.js"></script>
<script src="vendor/jquery.flot.spline/index.js"></script>

<!-- App scripts -->



<script>

    var chartUsersOptions = {
        series: {
            splines: {
                show: true,
                tension: 0.4,
                lineWidth: 1,
                fill: 0.5
            },
        },
        grid: {
            tickColor: "#f0f0f0",
            borderWidth: 1,
            borderColor: 'f0f0f0',
            color: '#6a6c6f',
            backgroundColor: "#000",
            show: false

        },
        colors: [ "#f0f0f", "#efefef"],
    };

    function drawMinChart() {

        var href = location.href;
        var dir = href.substring(0, href.lastIndexOf('/')) + "/";
        var url = dir + "log/last30minutes.json";
        $.ajax({
            url: url,
            dataType: "json",
            type: "GET",
            success: function(resp) {
                var btc_eth = resp['btc-eth'];
                var btc_eth_plot = [];
                for(var i = 0; i < btc_eth.length; i ++) {
                    btc_eth_plot[i] = [];
                    btc_eth_plot[i][0] = i;
                    btc_eth_plot[i][1] = btc_eth[i];
                }
                $.plot($("#flot-line-chart-btc-eth"), [btc_eth_plot], chartUsersOptions);
                $("#rate-btc-eth").html(btc_eth[btc_eth.length - 1].toFixed(8));

                var btc_ltc = resp['btc-ltc'];
                var btc_ltc_plot = [];
                for(var i = 0; i < btc_ltc.length; i ++) {
                    btc_ltc_plot[i] = [];
                    btc_ltc_plot[i][0] = i;
                    btc_ltc_plot[i][1] = btc_ltc[i];
                }
                $.plot($("#flot-line-chart-btc-ltc"), [btc_ltc_plot], chartUsersOptions);
                $("#rate-btc-ltc").html(btc_ltc[btc_ltc.length - 1].toFixed(8));

                var btc_neo = resp['btc-neo'];
                var btc_neo_plot = [];
                for(var i = 0; i < btc_neo.length; i ++) {
                    btc_neo_plot[i] = [];
                    btc_neo_plot[i][0] = i;
                    btc_neo_plot[i][1] = btc_neo[i];
                }
                $.plot($("#flot-line-chart-btc-neo"), [btc_neo_plot], chartUsersOptions);
                $("#rate-btc-neo").html(btc_neo[btc_neo.length - 1].toFixed(8));

                var btc_xrp = resp['btc-xrp'];
                var btc_xrp_plot = [];
                for(var i = 0; i < btc_xrp.length; i ++) {
                    btc_xrp_plot[i] = [];
                    btc_xrp_plot[i][0] = i;
                    btc_xrp_plot[i][1] = btc_xrp[i];
                }
                $.plot($("#flot-line-chart-btc-xrp"), [btc_xrp_plot], chartUsersOptions);
                $("#rate-btc-xrp").html(btc_xrp[btc_xrp.length - 1].toFixed(8));

                var eth_btc = resp['eth-btc'];
                var eth_btc_plot = [];
                for(var i = 0; i < eth_btc.length; i ++) {
                    eth_btc_plot[i] = [];
                    eth_btc_plot[i][0] = i;
                    eth_btc_plot[i][1] = eth_btc[i];
                }
                $.plot($("#flot-line-chart-eth-btc"), [eth_btc_plot], chartUsersOptions);
                $("#rate-eth-btc").html(eth_btc[eth_btc.length - 1].toFixed(8));

                var eth_ltc = resp['eth-ltc'];
                var eth_ltc_plot = [];
                for(var i = 0; i < eth_ltc.length; i ++) {
                    eth_ltc_plot[i] = [];
                    eth_ltc_plot[i][0] = i;
                    eth_ltc_plot[i][1] = eth_ltc[i];
                }
                $.plot($("#flot-line-chart-eth-ltc"), [eth_ltc_plot], chartUsersOptions);
                $("#rate-eth-ltc").html(eth_ltc[eth_ltc.length - 1].toFixed(8));

                var eth_neo = resp['eth-neo'];
                var eth_neo_plot = [];
                for(var i = 0; i < eth_neo.length; i ++) {
                    eth_neo_plot[i] = [];
                    eth_neo_plot[i][0] = i;
                    eth_neo_plot[i][1] = eth_neo[i];
                }
                $.plot($("#flot-line-chart-eth-neo"), [eth_neo_plot], chartUsersOptions);
                $("#rate-eth-neo").html(eth_neo[eth_neo.length - 1].toFixed(8));

                var eth_xrp = resp['eth-xrp'];
                var eth_xrp_plot = [];
                for(var i = 0; i < eth_xrp.length; i ++) {
                    eth_xrp_plot[i] = [];
                    eth_xrp_plot[i][0] = i;
                    eth_xrp_plot[i][1] = eth_xrp[i];
                }
                $.plot($("#flot-line-chart-eth-xrp"), [eth_xrp_plot], chartUsersOptions);
                $("#rate-eth-xrp").html(eth_xrp[eth_xrp.length - 1].toFixed(8));

                setTimeout("drawMinChart()", 1000);
            }
        });
    }

    setTimeout("drawMinChart()", 1000);

</script>
