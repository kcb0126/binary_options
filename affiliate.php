<?php
require("ajax/functions.php");
if(!$userInfo)
	header("Location: index.php");
require("header.php");
?>
    <div class="col-sm-12 col-xs-12 over-padd-btc">
        <h5 class="text-center table-head" style="margin-top: 20px; margin-bottom: 0px;">Affiliate Link</h5>
        <div class="col-sm-12 col-xs-12 no-padd live-rate-sec text-center">
            <h5 style="color: #fff;">Referral link: <a href="#">http://cobinix.com/?v=<?=$userInfo['id']?> </a></h5>
        </div>
    </div>
    <div class="col-sm-12 col-xs-12 over-padd-btc">
        <h5 class="text-center table-head" style="margin-top: 20px; margin-bottom: 1px;">Affiliate Statistics</h5>
    </div>
    <?php
			$thisMonthStart = strtotime(date("d-m-Y 00:00:00", strtotime("first day of this month")));;
			$previousMonthStart = strtotime(date("d-m-Y 00:00:00", strtotime("first day of previous month")));;
			$nextMonthStart = strtotime(date("d-m-Y 00:00:00", strtotime("first day of next month")));;
			$bets = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(bets.amount) as total FROM archivedBets as bets INNER JOIN users as users ON bets.userid=users.id WHERE users.referrer='$userInfo[id]' AND bets.date <= '$thisMonthStart' AND bets.time >= '$previousMonthStart'"));
			if($bets['amount'] < 0.005)
				$rank = "beginner";
			elseif($bets['amount'] < 0.01)
				$rank = "bronze";
			elseif($bets['amount'] < 0.03)
				$rank = "silver";
			elseif($bets['amount'] < 0.1)
				$rank = "gold";
			elseif($bets['amount'] < 1)
				$rank = "platinum";
			elseif($bets['amount'] >= 1)
				$rank = "boss";
			$commissions = array("beginner"=>5, "bronze"=>15, "silver"=>20, "gold"=>30, "platinum"=>50, "boss"=>75);

			$bets = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(bets.amount) as total FROM archivedBets as bets INNER JOIN users as users ON bets.userid=users.id WHERE users.referrer='$userInfo[id]' AND bets.date >= '$thisMonthStart'"));
			if($bets['amount'] < 0.005)
				$nrank = "beginner";
			elseif($bets['amount'] < 0.01)
				$nrank = "bronze";
			elseif($bets['amount'] < 0.03)
				$nrank = "silver";
			elseif($bets['amount'] < 0.1)
				$nrank = "gold";
			elseif($bets['amount'] < 1)
				$nrank = "platinum";
			elseif($bets['amount'] >= 1)
				$nrank = "boss";
		?>
        <div class="col-sm-12 col-xs-12 no-padd graph-commision-padd">
            <div class="row">
                <div class="col-sm-6 col-xs-6 no-padd more-padd">
                    <div class="affiliate-wining-text">
                        <h3> <i class="fa fa-star" aria-hidden="true"></i> Rank:
                            <?=ucwords($rank)?>
                        </h3>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-6 no-padd more-padd">
                    <div class="affiliate-wining-text">
                        <h3>Next Rank:
                            <?=ucwords($nrank)?>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-sm-6 col-xs-6 no-padd time-left-padd">
                    <h4 class="time-sec-head"><i class="fa fa-money" aria-hidden="true"></i> Commissions:
                        <?=$commissions[$rank]?>%</h4>
                </div>
                <div class="col-sm-6 col-xs-6 no-padd time-left-padd">
                    <h4 class="time-sec-head">Time for next rank:
                        <?=floor(($nextMonthStart - time()) / 86400)?> days</h4>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 no-padd over-padd-btc tab-content sign-table-padd">
            <div id="affiliate" class="tab-pane fade in active">
                <table class="table table-trader table-striped">
									<thead>
										<tr class="content-table-sec" style="background: #3f3e4e;">
												<th class="col-sm-2 no-padd">Affiliate ID</th>
												<th class="col-sm-2 no-padd">Signup Date</th>
												<th class="col-sm-2 no-padd">Affiliate Email</th>
												<th class="col-sm-2 no-padd">Volume Previous Month</th>
												<th class="col-sm-2 no-padd">Volume This Month</th>
												<th class="col-sm-2 no-padd">Earned This Month</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$sql = mysqli_query($sql, "SELECT u.id, u.signupdate, u.email, SUM(case when bets.date >= '$thisMonthStart' then amount else 0 end) as thisMonthVolume, SUM(case when bets.date < '$thisMonthStart' then previousMonthVolume else 0 end) as previousMonthVolume FROM users as u LEFT JOIN archivedBets as bets ON bet.userid=u.id WHERE u.referrer='$userInfo[id]' bets.time >= '$previousMonthStart'");
										while($data = mysqli_fetch_array($sql)){ ?>
												<tr class="content-table-sec change-color">
														<td class="col-sm-2 no-padd">
																<?=$data['id']?>
														</td>
														<td class="col-sm-2 no-padd">
																<?=date("d-m-Y H:i:s", $data['signupdate'])?>
														</td>
														<td class="col-sm-2 no-padd">
																<?=$data['email']?>
														</td>
														<td class="col-sm-2 no-padd">
																<?=number_format((float)$data['previousMonthVolume'], 8, ".", "")?> BTC</td>

														<td class="col-sm-2 no-padd">
																<?=number_format((float)$data['thisMonthVolume'], 8, ".", "")?> BTC</td>

														<td class="col-sm-2 no-padd">
																<?=number_format((float)$data['thisMonthVolume'] / 100 * 5 / 100 * $commissions[$rank], 8, ".", "")?> BTC</td>
												</tr>
												<?php } ?>
												<tbody>
								</table>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <!-- container-fluid -->
        </body>

        </html>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script type="text/javascript">
            google.load("visualization", "1", {
                packages: ["corechart"]
            });
            google.setOnLoadCallback(drawChart1);

            function drawChart1() {
                var data = google.visualization.arrayToDataTable([
                    ['Year', 'Sales', 'Expenses'],
                    ['2004', 1000, 400],
                    ['2005', 1170, 460],
                    ['2006', 660, 1120],
                    ['2007', 1030, 540]
                ]);
                var options = {
                    title: 'Points scored',
                    hAxis: {
                        title: 'Year',
                        titleTextStyle: {
                            color: 'red'
                        }
                    }
                };
                var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
                chart.draw(data, options);
            }
            google.load("visualization", "1", {
                packages: ["corechart"]
            });
            google.setOnLoadCallback(drawChart2);

            function drawChart2() {
                var data = google.visualization.arrayToDataTable([
                    ['Year', 'Sales', 'Expenses'],
                    ['2013', 1000, 400],
                    ['2014', 1170, 460],
                    ['2015', 660, 1120],
                    ['2016', 1030, 540]
                ]);
                var options = {
                    title: 'Company Performance',
                    hAxis: {
                        title: 'Year',
                        titleTextStyle: {
                            color: '#000'
                        }
                    },
                    vAxis: {
                        minValue: 0
                    }
                };
                var chart = new google.visualization.AreaChart(document.getElementById('chart_div2'));
                chart.draw(data, options);
            }
            $(window).resize(function() {
                drawChart1();
                drawChart2();
            });
        </script>
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
