<?php
require("ajax/functions.php");
if(!$userInfo)
	header("Location: index.php");
require("header.php");
?>
				<div class="move-right-position">
					<div class="col-sm-12 col-xs-12 no-padd deposit-sec-padd" id="markets">
					</div>
				</div>
			</div>
		</div>
		<!-- container-fluid -->
	</body>
</html>
<link rel="stylesheet" type="text/css" href="css/markets.css">
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
			init: function() {
					rightJS.Tags = document.querySelectorAll('.rightJS');
					for (var i = 0; i < rightJS.Tags.length; i++) {
							rightJS.Tags[i].style.overflow = 'hidden';
					}
					rightJS.Tags = document.querySelectorAll('.rightJS div');
					for (var i = 0; i < rightJS.Tags.length; i++) {
							rightJS.Tags[i].style.position = 'relative';
							rightJS.Tags[i].style.right = '-' + rightJS.Tags[i].parentElement.offsetWidth + 'px';
					}
					rightJS.loop();
			},
			loop: function() {
					for (var i = 0; i < rightJS.Tags.length; i++) {
							var x = parseFloat(rightJS.Tags[i].style.right);
							x++;
							var W = rightJS.Tags[i].parentElement.offsetWidth;
							var w = rightJS.Tags[i].offsetWidth;
							if ((x / 100) * W > w) x = -W;
							rightJS.Tags[i].style.right = x + 'px';
					}
					requestAnimationFrame(this.loop.bind(this));
			}
	};
	window.addEventListener('load', rightJS.init);

	/* JQUERY */

	$(function() {
			var rightJQ = {
					init: function() {
							$('.rightJQ').css({
									overflow: 'hidden'
							});
							rightJQ.loop();
					},
					loop: function() {
							$('.rightJQ div').css({
									position: 'relative',
									right: '-100%'
							}).animate({
									right: '100%'
							}, 15000, 'linear');
							setTimeout(rightJQ.loop, 15010);
					}
			};
			rightJQ.init();

			setInterval(function(){
				retrieveMarketsAjax();
			}, 5000);
			retrieveMarketsAjax();
	});

	String.prototype.toHHMMSS = function () {
	    var sec_num = parseInt(this, 10); // don't forget the second param
	    var hours   = Math.floor(sec_num / 3600);
	    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
	    var seconds = sec_num - (hours * 3600) - (minutes * 60);

	    if (hours   < 10) {hours   = "0"+hours;}
	    if (minutes < 10) {minutes = "0"+minutes;}
	    if (seconds < 10) {seconds = "0"+seconds;}
	    return hours+':'+minutes+':'+seconds;
	}
	function retrieveMarketsAjax(){
		$.ajax({
				url: "ajax/retrieveMarkets.php",
				dataType: "json",
				success: function(alldata) {
					$('.binary-right-position').text('');
					$('#markets').text('');
					for(var index in alldata.markets){
						var data = alldata.markets[index];
						var timeNow = new Date().getTime() / 1000;
						var timeLeftint = (data.starttime - timeNow)
						if(timeLeftint < 4)
							continue;
						var timeLeft = timeLeftint.toString().toHHMMSS();
						if(timeLeft.startsWith('00:'))
							timeLeft = timeLeft.replace('00:', '');
						$('.binary-right-position').append('<li><h3>' + data.pair + '<span class="binary"><i class="fa fa-caret-up"></i>'+data.price+'</span></h3></li>');
						var total = data.totalBetsDown + data.totalBetsUp;
						$('#markets').append('<div class="col-sm-4 col-xs-12 btc-box-sec text-center"> <div class="col-sm-12 col-xs-12 no-padd border-box-btc"> <h4 class="box-btc-head">'+data.pair+' <i class="fa fa-caret-up"></i>'+data.price+'</h4> <div class="col-sm-12 col-xs-12 no-padd"> <div class="col-sm-8 col-xs-7 no-padd"> <img src="image/graph2.png" class="img-responsive btc-graph-img" width="100%"> </div><div class="col-sm-4 col-xs-5 no-padd view-percent-text"> <p>'+(total / data.totalBetsUp).toFixed(2)+'x <i class="fa fa-caret-up"></i></p> <p>'+(total / data.totalBetsDown).toFixed(2)+'x <i class="fa fa-caret-down"></i></p> </div> </div> <div class="col-sm-12 col-xs-12 no-padd"> <h4 class="time-left">Time left: <span>'+timeLeft+'</span></h4> </div> <a href="market.php?market='+data.id+'" class="btn" style="background: #3f3e4e;color:#fff;width: 191px; color: #fff; font-size: 20px; padding: 0px; margin: 10px;">Visit</a> </div> </div>');
					}
				}
		});
	}
</script>
