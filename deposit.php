<?php
	require("ajax/functions.php");
	if(!$userInfo)
		header("Location: index.php");
	require("header.php");
	?>
<div class="col-sm-12 col-xs-12 over-padd-btc">
	<h5 class="text-center dash-head" style="margin-top: 20px; padding-bottom: 10px;">DEPOSIT</h5>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 over-padd-btc">
	<div class="col-md-12 col-sm-12 col-xs-12 no-padd live-rate-sec text-center" style="width: 100%;">
		<h5 class="text-center tab-title" style="color: #fff">Your Bitcoin Wallet</h5>
		<img src="image/bitc.png" class="img-responsive" style="width: 5%;margin: 0 auto;">
		<p id="p1" style="color:white;">..</p>
		<a href="javascript:void(0)" class="btn btn-info btn-copy" id="copybtn">COPY</a>
	</div>
</div>
<div class="col-sm-12 col-xs-12 over-padd-btc">
	<h5 class="text-center table-head" style="margin-top: 10px; padding-bottom: 10px; margin-bottom: 0px;">Bitcoin Transactions</h5>
</div>
<div class="col-sm-12 col-xs-12 no-padd tab-content over-padd-btc between-marg-sec">
	<div class="tab-pane active">
		<table class="table table-trader table-striped">
			<tr class="content-table-sec">
				<th class="col-sm-2 no-padd">ID</th>
				<th class="col-sm-2 no-padd">Date</th>
				<th class="col-sm-2 no-padd">Status</th>
				<th class="col-sm-2 no-padd">Transaction ID</th>
			</tr>
			<tr class="content-table-sec change-color">
				<td class="col-sm-2 no-padd">103212</td>
				<td class="col-sm-2 no-padd">11-01-2018</td>
				<td class="col-sm-2 no-padd">pending</td>
				<td class="col-sm-2 no-padd"> 9ew3ur9fh32jhfu43h78f3h8fd3he8edf</td>
			</tr>
		</table>
	</div>
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
	$(document).ready(function() {
	    $('.click-bar').click(function() {
	        $('.menu-header').slideToggle();
	    });
	});
</script>
<script>
	function userInfoAjax() {
	    $.ajax({
	        url: "ajax/userInfo.php",
	        dataType: "json",
	        success: function(data) {
	            var addr = data.depositAddress;
	            if (addr == "null") {
	                $('#p1').text("");
	                $('#copybtn').text("Create New Address");
	                $('#copybtn').unbind('click').click(function() {
	                    $.ajax({
	                        url: "ajax/generateAddress.php",
	                        dataType: "json",
	                        success: function(data) {
	                            if (!data.status)
	                                alert(data.message);
	                            else {
	                                $('#p1').text(data.address);
	                                $('#copybtn').text("Copy Address");
	                                $('#copybtn').unbind('click').click(function() {
	                                    copyToClipboard('#p1');
	                                });
	                            }
	                        }
	                    });
	                });
	            } else {
	                $('#p1').text(addr);
	                $('#copybtn').text("Copy Address");
	                $('#copybtn').unbind('click').click(function() {
	                    copyToClipboard('#p1');
	                });
	            }
	        }
	    });
	}
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
	    setInterval(function() {
	        userInfoAjax();
	    }, 5000);
	    userInfoAjax();
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
