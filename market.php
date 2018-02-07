<?php
if(empty($_GET['market']))
	$_GET['market'] = "0";
require("ajax/functions.php");
if(!$userInfo)
	header("Location: index.php");
require("header.php");
?>
    <link rel="stylesheet" href="css/market.css" />
    <link rel="stylesheet" href="css/slider.css" />
    <div class="move-right-position">

        <div class="col-sm-12 col-xs-12 over-padd-btc">
            <div class="col-sm-12 col-xs-12 no-padd live-rate-sec">
                <h5 class="text-center rate-head">Live Rates*</h5>

                <div class="col-sm-2 col-xs-12 no-padd local-text">
                    <p id="ratebuy">..</p>
                </div>

                <div class="col-sm-8 col-xs-12">
                    <div class="progress binary-progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%" id="buyPrg">
                        </div>

                        <div class="progress-bar progress-bar-striped active" style="background-color: #f27271;width: 50%;" role="progressbar" aria-valuenow="100" aria-valuemin="50" aria-valuemax="100" id="sellPrg">
                        </div>
                    </div>
                </div>

                <div class="col-sm-2 col-xs-12 no-padd local-text">
                    <p id="ratesell">..</p>
                </div>

            </div>
        </div>

        <div class="col-sm-12 col-xs-12 no-padd right-side-header">

            <!-- col-md-8 -->
            <div class="col-sm-9 col-xs-12 no-padd">

                <div class="col-sm-12 col-xs-12 no-padd chart-binary">

                    <div id="chart-group" style="min-width: 100%; height: 300px; margin: 0 auto"></div>

                </div>

            </div>
            <!-- col-md-8 -->

            <!-- col-md-3 -->
            <div class="col-sm-3 col-xs-12 no-padd btc-padd-marg">

                <div class="col-sm-12 col-xs-12 no-padd all-data-padd">


                    <div class="col-sm-12 col-xs-12 no-padd timer-bg-box">
                        <div class="col-sm-8 col-xs-8 no-padd expire-head">
                            <h4 id="pair">..</h4>
                        </div>

                        <div class="col-sm-4 col-xs-4 no-padd">

                            <div class="clock-sec-value" style="width:64px">
                                <div class="digital-clock" style="border-right:none;"></div>


                            </div>

                        </div>

                    </div>

                    <div class="col-sm-12 col-xs-12 no-padd main-padd-left">
                        <ul class="time-balance-list">
                            <li>
                                <h4>Time Left to Order <span class="time-world">..</span></h4>
                            </li>
                            <li>
                                <h4>Balance <span class="balance">..</span></h4>
                            </li>
                            <li>
                                <h4>Total Pool <span class="marketTotal">..</span></h4>
                            </li>
                        </ul>
                    </div>


                    <div class="col-sm-12 col-xs-12 no-padd main-padd-left">

                        <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset"><input type="text" class="btc-value-input" value=".." id="amount"></div>


                        <div class="col-sm-12 col-xs-12 no-padd range-slider">
                            <label for="slider" id="slider-label" style="width:100%">Size (50%):</label>
                            <div class="slidecontainer">
                                <input type="range" min="1" max="100" value="50" class="slider" id="rangeslider">
                            </div>
                        </div>
                        <script>
                            var balance = 0.5;
                            $("#rangeslider").on('input', function() {
                                $("#amount").val((balance / 100 * parseInt($("#rangeslider").val())).toFixed(8));
																$("#slider-label").text("Size ("+($("#rangeslider").val()+"%")+"):");
                            });
                        </script>

                    </div>

                    <div class="col-sm-12 col-xs-12 no-padd min-padd" style="padding-top:15px">

                        <div class="col-sm-6 col-xs-6 no-padd binary-service">
                            <button onclick="buy()" class="btn btn-buy ui-link" style="outline:none;" id="buyBtn">Buy</button>
                        </div>

                        <div class="col-sm-6 col-xs-6 no-padd binary-service">
                            <button onclick="sell()" class="btn btn-sell ui-link" style="outline:none;" id="sellBtn">Sell</button>
                        </div>


                    </div>

                </div>

            </div>
            <!-- col-md-4 -->

            <div class="col-sm-12 col-xs-12 no-padd tab-content open-trader-padd">
                <h4 class="open-trader-head text-center"> Open Trades </h4>

                <div class="tab-pane active">
                    <table class="table table-trader table-striped">
                        <thead>
                            <tr class="content-table-sec">
                                <th class="col-sm-2 no-padd">Pair</th>
		                                <th class="col-sm-2 no-padd">Bet Amount</th>
                                <th class="col-sm-2 no-padd">Target</th>
                                <th class="col-sm-2 no-padd">Start Price</th>
                                <th class="col-sm-2 no-padd">Expiration</th>
                            </tr>
                        </thead>
                        <tbody id="openTrades">
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="col-sm-12 col-xs-12 no-padd trade-history-pad">
                <h4 class="open-trader-head text-center"> Trade History </h4>

                <div class="tab-pane">
                    <table class="table table-trader table-striped">
                        <thead>
                            <tr class="content-table-sec">
                                <th class="col-sm-2 no-padd">Order Time</th>
                                <th class="col-sm-2 no-padd">Expiration Time</th>
                                <th class="col-sm-2 no-padd">Bet Amount</th>
                                <th class="col-sm-2 no-padd">Start Price</th>
                                <th class="col-sm-2 no-padd">Finish Price</th>
                                <th class="col-sm-2 no-padd">Profit</th>
                            </tr>
                        </thead>
                        <tbody id="openTrades">
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-12 col-xs-12 no-padd footer-sec-table">
                    <p class="notes-board">*DISCLAIMER: final rates of buy and sell will be calculated after the trade selling time will expire.</p>

                </div>

            </div>

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
    <script type="text/javascript">
        $(document).ready(function() {
            clockUpdate();
            setInterval(clockUpdate, 1000);
        })

        function clockUpdate() {
            var date = new Date();

            function addZero(x) {
                if (x < 10) {
                    return x = '0' + x;
                } else {
                    return x;
                }
            }

            function twelveHour(x) {
                if (x > 12) {
                    return x = x - 12;
                } else if (x == 0) {
                    return x = 12;
                } else {
                    return x;
                }
            }

            var h = addZero(twelveHour(date.getHours()));
            var m = addZero(date.getMinutes());
            // var s = addZero(date.getSeconds());

            $('.digital-clock').text(h + ':' + m)
        }
    </script>

    <script type="text/javascript">
        $(document).bind("pagecreate", function(event, ui) {

            $('#slider').siblings('.ui-slider').bind('tap', function(event, ui) {
                makeAjaxChange($(this).siblings('input'));
            });
            $('#slider').siblings('.ui-slider a').bind('taphold', function(event, ui) {
                makeAjaxChange($(this).parent().siblings('input'));

            });

            function makeAjaxChange(elem) {
                alert(elem.val());
            }
        });
    </script>

    <script type="text/javascript">
        $(function() {
            $('#chart-group').highcharts({
                title: {
                    text: '',
                    x: 0
                },
                subtitle: {
                    text: '',
                    x: 0
                },
                navigation: {
                    buttonOptions: {
                        enabled: false
                    }
                },
                xAxis: {
                    categories: ['11405', '11410', '11415', '11420', '11425', '11430',
                        '11435', '11440', '11445', '11450', '11455', '11460'
                    ]
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    borderColor: '#FFDD90',
                    borderRadius: '3',
                    borderWidth: '1',
                    backgroundColor: '#FFFAD3',
                    formatter: function() {
                        return '<strong>' + this.y + '</strong>';
                    }
                },
                legend: {
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                plotOptions: {
                    area: {
                        fillColor: '#9FDBF7',
                        lineWidth: 3,
                        marker: {
                            enabled: true,
                            fillColor: '#FFF',
                            lineColor: '#4ABDF1',
                            lineWidth: 2
                        },
                        shadow: false,
                        states: {
                            hover: {
                                lineWidth: 3
                            }
                        },
                        threshold: null
                    }
                },
                series: [{
                    name: '',
                    type: 'area',
                    color: '#4ABDF1',
                    data: [780, 760, 770, 780, 760, 780, 780, 790, 780, 770]
                }]
            });
        });
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
		String.prototype.toHHMMSS = function () {
				var sec_num = parseInt(this, 10); // don't forget the second param
				var hours   = Math.floor(sec_num / 3600);
				var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
				var seconds = sec_num - (hours * 3600) - (minutes * 60);

				if (hours   < 10) {hours   = "0"+hours;}
				if (minutes < 10) {minutes = "0"+minutes;}
				if (seconds < 10) {seconds = "0"+seconds;}
				return hours+':'+minutes+':'+seconds;
		};

		function userInfoAjax(){
			$.ajax({
					url: "ajax/userInfo.php?market="+<?=json_encode($_GET['market'])?>,
					dataType: "json",
					success: function(data) {
						$('#openTrades').text("");
						$('#closedTrades').text("");
						$('.balance').text(data.balance);
						for(var i in data.orders){
							var order = data.orders[i];
							var tableId = "open";
							if(order.status == "closed")
								tableId = "closed";
							$('#'+tableId+'Trades').append('<tr class="content-table-sec change-color"> <td class="col-sm-2 no-padd">'+order.amount+'</td> <td class="col-sm-2 no-padd">'+order.totalStake+'</td> <td class="col-sm-2 no-padd">'+order.startPrice+'</td> <td class="col-sm-2 no-padd">'+order.finishPrice+'</td> <td class="col-sm-2 no-padd">'+order.profit+'</td> <td class="col-sm-2 no-padd">'+order.expiry+'</td> </tr>');
						}
					}
			});
		}

		function retrieveMarketsAjax(){
			$.ajax({
					url: "ajax/retrieveMarkets.php",
					dataType: "json",
					success: function(alldata) {
						$('.binary-right-position').text('');
						var found = false;
						for(var index in alldata.markets){
							var data = alldata.markets[index];
							if(data.id == <?=json_encode($_GET['market'])?>){
								found = true;
								var timeNow = new Date().getTime() / 1000;
								var timeLeft = (data.starttime - timeNow).toString().toHHMMSS();
								$('.time-world').text(timeLeft);
								$('#pair').text(data.pair);
								var totalDown = data.totalBetsDown * 0.95;
								var totalUp = data.totalBetsUp * 0.95;
								var total = totalUp + totalDown;
								var upPercent = (100/(total / totalDown)).toFixed(2);
								var downPercent = (100/(total / totalUp)).toFixed(2);
								var multiplyUp = (total / totalUp).toFixed(2);
								var multiplyDown = (total / totalDown).toFixed(2);
								$('#buyPrg').attr("valuenow", upPercent).css("width", upPercent + "%");
								$('#sellPrg').attr("valuenow", downPercent).css("width", downPercent + "%");
								$('#ratebuy').html("" + totalUp + " BTC (%"+upPercent+")");
								$('#ratesell').html("" + totalDown + " BTC (%"+downPercent+")");
								$("#buyBtn").html("Buy<br>"+multiplyUp+"x");
								$("#sellBtn").html("Sell<br>"+multiplyDown+"x");
								$('.marketTotal').text((data.totalBetsDown + data.totalBetsUp) * 0.95 + " BTC");
							}
							$('.binary-right-position').append('<li><h3>' + data.pair + '<span class="binary"><i class="fa fa-caret-up"></i>'+data.price+'</span></h3></li>');
						}
						if(!found){
							alert('The requested market was not found. Market might be closed. Please try again.');
							window.location = 'btc1.html';
						}
					}
			});
		}

		function buy() {
			$.ajax({
				url: "bet.php",
				method: "POST",
				data: "market="+<?=json_encode($_GET['market'])?>+"&amount="+$("#amount").val()+"&direction=up",
				dataType: "json",
				success: function(data){
					if(!data.status){
						alert('Error: ' + data.message);
					} else {
						alert('Successfully processed!');
						$(".balance").text(data.newBalance);
						userInfoAjax();
					}
				}
			});
		}

		function sell() {
			$.ajax({
				url: "bet.php",
				method: "POST",
				data: "market="+<?=json_encode($_GET['market'])?>+"&amount="+$("#amount").val()+"&direction=down",
				dataType: "json",
				success: function(data){
					if(!data.status){
						alert('Error: ' + data.message);
					} else {
						alert('Successfully processed!');
						$(".balance").text(data.newBalance);
						userInfoAjax();
					}
				}
			});
		}
        $(document).ready(function() {
						setInterval(function(){
							retrieveMarketsAjax();
						}, 5000);
						setInterval(function(){
							userInfoAjax();
						}, 5000);
						retrieveMarketsAjax();
						userInfoAjax();
            $('.click-bar').click(function() {
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
        });
    </script>
