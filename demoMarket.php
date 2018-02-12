<?php
require("ajax/functions.php");
if(!$userInfo)
    header("Location: index.php");
require("header.php");
?>

<!-- Use these meta tags to bypass safari touch events on ipad, otherwise scrolling and drawing will not work -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/> <!-- some versions of IE11 do not render correctly without this -->

<!-- Sample css file may be customized -->
<link rel="stylesheet" type="text/css" href="css/stx-standard.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/stx-chart.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/stx-print.css" media="print" />
<!--<script src="js/jquery-3.3.1.min.js"></script>-->


    
 <div id="myCarousel" class="col-sm-12 col-xs-12 over-padd-btc carousel slide">
                            <div class="col-sm-12 col-xs-12 no-padd live-pairs">
                                <h5 class="text-center rate-head">Pairs</h5>

                        <!-- Carousel items -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="row2">

                                    <div class="col-md-1">
                                        <div class="box-home pairs-box">
                                        </div>
                                    </div>

                                    <div class="col-md-2">

                                        <div class="box-home pairs-box">
                                            <h4><nobr><span class="label label-danger pull-right">- 19%</span> BTC/ETH </nobr><h4>
                                            <h5 class="text-danger"><i class="fa fa-caret-down"></i> 0.00235392 </h5>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="box-home pairs-box">
                                            <h4><nobr><span class="label label-success pull-right">+ 3%</span> BTC/LTC </nobr><h4>
                                            <h5 class="text-danger"><i class="fa fa-caret-down"></i> 0.07455392 </h5>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="box-home pairs-box">
                                            <h4><nobr><span class="label label-danger pull-right">- 9%</span> BTC/XRM </nobr><h4>
                                            <h5 class="text-success"><i class="fa fa-caret-up"></i> 0.06839672 </h5>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="box-home pairs-box">
                                            <h4><nobr><span class="label label-success pull-right">+ 27%</span> BTC/TRX </nobr><h4>
                                            <h5 class="text-danger"><i class="fa fa-caret-down"></i> 0.06372859 </h5>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="box-home pairs-box">
                                            <h4><nobr><span class="label label-success pull-right">+ 27%</span> BTC/ZEC </nobr><h4>
                                            <h5 class="text-success"><i class="fa fa-caret-up"></i> 0.00032853 </h5>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="box-home pairs-box">
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                            </div>
                            <!--/item-->
                            <div class="item">
                                <div class="row2">

                                    <div class="col-md-1">
                                        <div class="box-home pairs-box">
                                        </div>
                                    </div>

                                    <div class="col-md-2">

                                        <div class="box-home pairs-box">
                                            <h4><nobr><span class="label label-danger pull-right">- 19%</span> BTC/ETH </nobr><h4>
                                            <h5 class="text-danger"><i class="fa fa-caret-down"></i> 0.00235392 </h5>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="box-home pairs-box">
                                            <h4><nobr><span class="label label-success pull-right">+ 3%</span> BTC/LTC </nobr><h4>
                                            <h5 class="text-danger"><i class="fa fa-caret-down"></i> 0.07455392 </h5>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="box-home pairs-box">
                                            <h4><nobr><span class="label label-danger pull-right">- 9%</span> BTC/XRM </nobr><h4>
                                            <h5 class="text-success"><i class="fa fa-caret-up"></i> 0.06839672 </h5>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="box-home pairs-box">
                                            <h4><nobr><span class="label label-success pull-right">+ 27%</span> BTC/TRX </nobr><h4>
                                            <h5 class="text-danger"><i class="fa fa-caret-down"></i> 0.06372859 </h5>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="box-home pairs-box">
                                            <h4><nobr><span class="label label-success pull-right">+ 27%</span> BTC/ZEC </nobr><h4>
                                            <h5 class="text-success"><i class="fa fa-caret-up"></i> 0.00032853 </h5>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="box-home pairs-box">
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                            </div>
                            <!--/item-->
                           
                        </div>
                        <!--/carousel-inner--> <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>

                        <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
                    
                    <!--/myCarousel-->
                </div>
                <!--/well-->
            </div>   
    
    
<!--Chart Tools    -->   
<div class="col-sm-12 col-xs-12 over-padd-btc">
<div class="col-sm-12 col-xs-12 no-padd live-tools">
<h5 class="text-center rate-head">Chart Tools</h5>

    
<div class="col-md-4 text-center">
        <div class="box-home alert-box button-wrapper text-center" style="height: 113px">
            <h4> Time Frame </h4>
            <a href="javascript:void(0)" onclick="changePeriodicity('12h')" class="btn btn-chart">12h</a>
            <a href="javascript:void(0)" onclick="changePeriodicity('8h')" class="btn btn-chart">8h</a>
            <a href="javascript:void(0)" onclick="changePeriodicity('4h')" class="btn btn-chart">4h</a>
            <a href="javascript:void(0)" onclick="changePeriodicity('2h')" class="btn btn-chart">2h</a>
            <a href="javascript:void(0)" onclick="changePeriodicity('1h')" class="btn btn-chart">1h</a>
            <a href="javascript:void(0)" onclick="changePeriodicity('30m')" class="btn btn-chart">30m</a>
        </div>
      </div>
       
<!--Chart Style    -->  
<div class="col-md-2 text-center">
        <div class="box-home alert-box button-wrapper" style="height: 113px">
            <h4> Chart Style </h4>
            <a href="javascript:void(0)" class="btn btn-chart" onclick="stxx.setChartType('candle');"><img src="image/candle.png" class="img-rounded" alt="CandleStick" style="width: 20px"></a>
            <a href="javascript:void(0)" class="btn btn-chart" onclick="stxx.setChartType('mountain');"><img src="image/line.png" class="img-rounded" alt="LineChart" style="width: 20px"></a>
        </div>
      </div>
    
    
<!--Chart Tools    -->  
<div class="col-md-2 text-center">
        <div class="box-home alert-box">
         <h4> Chart Tools </h4>   
        
<select  onchange="eval(this.value);" style="height:30px !important" autocomplete="off">
    <option value="STX.DrawingToolbar.setDrawingType('',this);STX.DrawingToolbar.setCrosshairs(false, this)">None</option>
    <option value="STX.DrawingToolbar.setDrawingType('',this);STX.DrawingToolbar.setCrosshairs(true, this)">Crosshairs</option>
    <option value="STX.DrawingToolbar.setDrawingType('annotation',this);">Annotation</option>
    <option value="STX.DrawingToolbar.setDrawingType('fibonacci',this);">Fibonacci</option>
    <option value="STX.DrawingToolbar.setDrawingType('horizontal',this);">Horizontal</option>
    <option value="STX.DrawingToolbar.setDrawingType('vertical',this);">Vertical</option>
    <option value="STX.DrawingToolbar.setDrawingType('line', this);">Line</option>
    <option value="STX.DrawingToolbar.setDrawingType('ray',this);">Ray</option>
    <option value="STX.DrawingToolbar.setDrawingType('segment',this);">Segment</option>
    <option value="STX.DrawingToolbar.setDrawingType('rectangle',this);">Rectangle</option>
    <option value="STX.DrawingToolbar.setDrawingType('rectangle',this);">Ellipse</option>
    <option value="stxx.clearDrawings()">Clear Drawings</option>
</select>
        </div>
      </div>
    
    
<!--Chart Studies    -->   
<div class="col-md-2 text-center">
        <div class="box-home alert-box">
         <h4> Chart Studies </h4>

<select onchange="studyDialog(this.options[this.selectedIndex], this.value)" autocomplete="off">
    <option value="none">Select</option>
    <option value="ADX">ADX/DMS</option>
    <option value="ATR">Average True Range</option>
    <option value="Bollinger Bands">Bollinger Bands</option>
    <option value="COG">Center Of Gravity</option>
    <option value="Chaikin MF">Chaikin Money Flow</option>
    <option value="CCI">Commodity Channel Index</option>
    <option value="Ehler Fisher">Ehler Fisher Transform</option>
    <option value="Elder Force">Elder Force Index</option>
    <option value="Elder Ray">Elder Ray</option>
    <option value="Fractal Chaos Bands">Fractal Chaos Bands</option>
    <option value="Fractal Chaos">Fractal Chaos Oscillator</option>
    <option value="Intraday Mtm">Intraday Momentum Index</option>
    <option value="Keltner">Keltner Channel</option>
    <option value="Lin Fcst">Linear Reg Forecast</option>
    <option value="Lin R2">Linear Reg R2</option>
    <option value="macd">MACD</option>
    <option value="Momentum">Momentum Indicator</option>
    <option value="M Flow">Money Flow Index</option>
    <option value="ma">Moving Average</option>
    <option value="MA Env">Moving Average Envelope</option>
    <option value="On Bal Vol">On Balance Volume</option>
    <option value="PSAR">Parabolic SAR</option>
    <option value="Price Vol">Price Volume Trend</option>
    <option value="RAVI">RAVI</option>
    <option value="rsi">RSI</option>
    <option value="Schaff">Schaff Trend Cycle</option>
    <option value="STD Dev">Standard Deviation</option>
    <option value="stochastics">Stochastics</option>
    <option value="Stch Mtm">Stochastic Momentum Index</option>
    <option value="Swing">Swing Index</option>
    <option value="Trade Vol">Trade Volume Index</option>
    <option value="vol undr">Vol Underlay</option>
    <option value="vchart">Volume</option>
    <option value="Vol Osc">Volume Oscillator</option>
    <option value="Vol ROC">Volume Rate of Change</option>
    <option value="Williams %R">Williams %R</option>
</select>
            
        </div>
      </div>
    
    
<!--More Options    -->   
<div class="col-md-2 text-center">
        <div class="box-home alert-box">
         <h4> More Options </h4>
            <div id="cogBtn" class="stxMenu">
                <div class="ui-btn ui-icon-carat-d ui-btn-icon-right ui-corner-all ui-shadow">
                    <span>Select</span>
                </div>
                <ul id="cog" class="cog menuSelect menuOutline" style="display:none">
                <li class="stx-heading">Timezone</li>
                <li stxToggle="STX.DialogManager.displayDialog('timezoneDialog');STX.TimeZoneWidget.populateDialog('timezoneDialog');">Change Timezone</li>
                <li class="stx-menu-divider">&nbsp;</li>
                <li class="stx-heading">Default Themes</li>
                <li class="stx-menu-content">
                <ul class="menuSelect" id="builtInThemeSelector">
                <li>White</li>
                <li>Black</li>
                </ul></li>
                <li class="stx-menu-content">
                <ul class="injected" id="customThemeSelector">
                <li class="stx-heading">Custom Themes</li>
                <li class="themeSelectorTemplate" style="display:none"><a class="stxItem"></a>
                <div class="stx-btn stx-ico"><span class="stx-ico-close stxClose">x</span></div>
                </li>
                </ul>
                </li>
                <li class="stx-menu-content"><div class="stx-btn theme" stxToggle="STX.DialogManager.displayDialog('themeDialog');STX.ThemeManager.populateDialog('themeDialog', stxx);">New Custom Theme</div></li>
                </ul>
            </div>

            <!--<select onchange="studyDialog(this.options[this.selectedIndex], this.value)" autocomplete="off">-->
                <!--<option value="none">Select</option>-->
            <!--</select>-->
            <!--<div id="cogBtn" class="stx-btn stx-menu-btn stxMenu">&nbsp;<em></em>-->
                <!--<ul id="cog" class="cog menuSelect menuOutline" style="display:none">-->
                    <!--<li class="stx-heading">Timezone</li>-->
                    <!--<li stxToggle="STX.DialogManager.displayDialog('timezoneDialog');STX.TimeZoneWidget.populateDialog('timezoneDialog');">Change Timezone</li>-->
                    <!--<li class="stx-menu-divider">&nbsp;</li>-->
                    <!--<li class="stx-heading">Default Themes</li>-->
                    <!--<li class="stx-menu-content">-->
                        <!--<ul class="menuSelect" id="builtInThemeSelector">-->
                            <!--<li>White</li>-->
                            <!--<li>Black</li>-->
                        <!--</ul></li>-->
                    <!--<li class="stx-menu-content">-->
                        <!--<ul class="injected" id="customThemeSelector">-->
                            <!--<li class="stx-heading">Custom Themes</li>-->
                            <!--<li class="themeSelectorTemplate" style="display:none"><a class="stxItem"></a>-->
                                <!--<div class="stx-btn stx-ico"><span class="stx-ico-close stxClose">x</span></div>-->
                            <!--</li>-->
                        <!--</ul>-->
                    <!--</li>-->
                    <!--<li class="stx-menu-content"><div class="stx-btn theme" stxToggle="STX.DialogManager.displayDialog('themeDialog');STX.ThemeManager.populateDialog('themeDialog', stxx);">New Custom Theme</div></li>-->
                <!--</ul>-->
            <!--</div>-->

        </div>
      </div>    
    
</div>
</div> 
    
<div class="col-sm-12 col-xs-12 no-padd right-side-header">



<!-- col-md-8 -->
    <div class="col-sm-9 col-xs-12 no-padd chart-container">
        <div class="col-sm-12 col-xs-12 no-padd chart-binary">
            <!--<div id="chart-group" style="min-width: 100%; height: 300px; margin: 0 auto;">-->
                <div class="stx-wrapper">
                    <!-- Nav -->
                    <div class="stx-nav" style="display: none;">
                        <div class="stx-search">
                            <input type="text" id="symbol" name="symbol" autocapitalize="off" autocorrect="off" spellcheck="off" class="stx-input-field">
                        </div>
                        <div id="periodBtn" class="stx-btn stx-menu-btn stxMenu">1D<em></em>
                            <ul id="periodicity" class="periodicity menuSelect menuOutline" style="display:none">
                                <li stxToggle="changePeriodicity('day')">1 D</li>
                                <li stxToggle="changePeriodicity('week')">1 W</li>
                                <li stxToggle="changePeriodicity('month')">1 Mo</li>
                                <li class="stx-menu-divider"></li>
                                <li stxToggle="changePeriodicity(1)">1 Min</li>
                                <li stxToggle="changePeriodicity(5)">5 Min</li>
                                <li stxToggle="changePeriodicity(30)">30 Min</li>
                            </ul>
                        </div>

                        <!-- These are very basic sample menus. You may replace these with another menuing system. Just follow the same onClick convention
                        or provide proxy functions that call the same code-->

                        <div class="stx-menus">

                            <!-- Chart sharing is available as a plug in. It requires stxShare.js. Please contact our account manager for more details -->
                            <div id="shareBtn" class="stx-btn stx-menu-btn" style="display:none;"><span class="stx-ico"></span>Share</div>

                            <div class="stx-btn stx-menu-btn stxMenu">Chart<em></em>
                                <ul id="chart-display" class="chart-display menuSelect menuOutline" style="display:none">
                                    <li class="stx-heading">Chart Style</li>
                                    <li stxToggle="stxx.setChartType('candle')">Candle</li>
                                    <li stxToggle="stxx.setChartType('bar')">Bar</li>
                                    <li stxToggle="stxx.setChartType('colored_bar')">Colored Bar</li>
                                    <li stxToggle="stxx.setChartType('line')">Line</li>
                                    <li stxToggle="stxx.setChartType('hollow_candle')">Hollow Candle</li>
                                    <li stxToggle="stxx.setChartType('mountain')">Mountain</li>
                                    <li class="stx-menu-divider"></li>
                                    <li class="stx-heading">Chart Scale</li>
                                    <li class="stx-option" stxToggle="toggleLog()">Log Scale<span class="stx-checkbox stx-logscale false"></span></li>
                                </ul>
                            </div>
                            <div class="stx-btn stx-menu-btn stxMenu">Studies<em></em>
                                <div id="studies" class="studies menuSelect menuOutline" style="display:none">
                                    <ul class="col">
                                        <li stxToggle="studyDialog(this, 'ADX');">ADX/DMS</li>
                                        <li stxToggle="studyDialog(this, 'ATR');">Average True Range</li>
                                        <li stxToggle="studyDialog(this, 'Bollinger Bands');">Bollinger Bands</li>
                                        <li stxToggle="studyDialog(this, 'COG');">Center Of Gravity</li>
                                        <li stxToggle="studyDialog(this, 'Chaikin MF');">Chaikin Money Flow</li>
                                        <li stxToggle="studyDialog(this, 'CCI');">Commodity Channel Index</li>
                                        <li stxToggle="studyDialog(this, 'Ehler Fisher');">Ehler Fisher Transform</li>
                                        <li stxToggle="studyDialog(this, 'Elder Force');">Elder Force Index</li>
                                        <li stxToggle="studyDialog(this, 'Elder Ray');">Elder Ray</li>
                                        <li stxToggle="studyDialog(this, 'Fractal Chaos Bands');">Fractal Chaos Bands</li>
                                        <li stxToggle="studyDialog(this, 'Fractal Chaos');">Fractal Chaos Oscillator</li>
                                        <li stxToggle="studyDialog(this, 'Intraday Mtm');">Intraday Momentum Index</li>
                                        <li stxToggle="studyDialog(this, 'Keltner');">Keltner Channel</li>
                                        <li stxToggle="studyDialog(this, 'Lin Fcst');">Linear Reg Forecast</li>
                                        <li stxToggle="studyDialog(this, 'Lin R2');">Linear Reg R2</li>
                                        <li stxToggle="studyDialog(this, 'macd');">MACD</li>
                                        <li stxToggle="studyDialog(this, 'Momentum');">Momentum Indicator</li>
                                        <li stxToggle="studyDialog(this, 'M Flow');">Money Flow Index</li>
                                    </ul>
                                    <ul class="col">
                                        <li stxToggle="studyDialog(this, 'ma');">Moving Average</li>
                                        <li stxToggle="studyDialog(this, 'MA Env');">Moving Average Envelope</li>
                                        <li stxToggle="studyDialog(this, 'On Bal Vol');">On Balance Volume</li>
                                        <li stxToggle="studyDialog(this, 'PSAR');">Parabolic SAR</li>
                                        <li stxToggle="studyDialog(this, 'Price Vol');">Price Volume Trend</li>
                                        <li stxToggle="studyDialog(this, 'RAVI');">RAVI</li>
                                        <li stxToggle="studyDialog(this, 'rsi');">RSI</li>
                                        <li stxToggle="studyDialog(this, 'Schaff');">Schaff Trend Cycle</li>
                                        <li stxToggle="studyDialog(this, 'STD Dev');">Standard Deviation</li>
                                        <li stxToggle="studyDialog(this, 'stochastics');">Stochastics</li>
                                        <li stxToggle="studyDialog(this, 'Stch Mtm');">Stochastic Momentum Index</li>
                                        <li stxToggle="studyDialog(this, 'Swing');">Swing Index</li>
                                        <li stxToggle="studyDialog(this, 'Trade Vol');">Trade Volume Index</li>
                                        <li stxToggle="studyDialog(this, 'vol undr');">Vol Underlay<span class="stx-remove-study" id="vol-undr"></span></li>
                                        <li stxToggle="studyDialog(this, 'vchart');">Volume</li>
                                        <li stxToggle="studyDialog(this, 'Vol Osc');">Volume Oscillator</li>
                                        <li stxToggle="studyDialog(this, 'Vol ROC');">Volume Rate of Change</li>
                                        <li stxToggle="studyDialog(this, 'Williams %R');">Williams %R</li>
                                    </ul>
                                </div>
                            </div>
                            <!--<div id="cogBtn" class="stx-btn stx-menu-btn stxMenu">&nbsp;<em></em>-->
                                <!--<ul id="cog" class="cog menuSelect menuOutline" style="display:none">-->
                                    <!--<li class="stx-heading">Timezone</li>-->
                                    <!--<li stxToggle="STX.DialogManager.displayDialog('timezoneDialog');STX.TimeZoneWidget.populateDialog('timezoneDialog');">Change Timezone</li>-->
                                    <!--<li class="stx-menu-divider">&nbsp;</li>-->
                                    <!--<li class="stx-heading">Default Themes</li>-->
                                    <!--<li class="stx-menu-content">-->
                                        <!--<ul class="menuSelect" id="builtInThemeSelector">-->
                                            <!--<li>White</li>-->
                                            <!--<li>Black</li>-->
                                        <!--</ul></li>-->
                                    <!--<li class="stx-menu-content">-->
                                        <!--<ul class="injected" id="customThemeSelector">-->
                                            <!--<li class="stx-heading">Custom Themes</li>-->
                                            <!--<li class="themeSelectorTemplate" style="display:none"><a class="stxItem"></a>-->
                                                <!--<div class="stx-btn stx-ico"><span class="stx-ico-close stxClose">x</span></div>-->
                                            <!--</li>-->
                                        <!--</ul>-->
                                    <!--</li>-->
                                    <!--<li class="stx-menu-content"><div class="stx-btn theme" stxToggle="STX.DialogManager.displayDialog('themeDialog');STX.ThemeManager.populateDialog('themeDialog', stxx);">New Custom Theme</div></li>-->
                                <!--</ul>-->
                            <!--</div>-->
                            <div class="stx-btn" id="fullscreen" onclick="toggleFullScreenMode()">F
                            </div>
                        </div>
                    </div>
                    <!-- End Nav -->

                    <!-- Toolbar -->
                    <div class="stx-toolbar" id="stx-toolbar" style="display: none;">
                        <div class="drawOptions">
                            <!--<div class="drawBtn stx-btn" onClick="stxx.undoLast()">Undo</div>-->
                            <div class="drawBtn stx-btn stx-menu-btn stxMenu"> <span id="toolSelection">Select Tool</span> <em></em>
                                <ul id="toolbarDraw" class="draw menuSelect menuOutline" style="display:none">
                                    <li stxtoggle="STX.DrawingToolbar.setDrawingType('',this);STX.DrawingToolbar.setCrosshairs(false, this)">None</li>
                                    <li stxtoggle="STX.DrawingToolbar.setDrawingType('',this);STX.DrawingToolbar.setCrosshairs(true, this)">Crosshairs</li>
                                    <li stxtoggle="STX.DrawingToolbar.setDrawingType('annotation',this);">Annotation</li>
                                    <li stxtoggle="STX.DrawingToolbar.setDrawingType('fibonacci',this);">Fibonacci</li>
                                    <li stxtoggle="STX.DrawingToolbar.setDrawingType('horizontal',this);">Horizontal</li>
                                    <li stxtoggle="STX.DrawingToolbar.setDrawingType('vertical',this);">Vertical</li>
                                    <li stxtoggle="STX.DrawingToolbar.setDrawingType('line', this);">Line</li>
                                    <li stxtoggle="STX.DrawingToolbar.setDrawingType('ray',this);">Ray</li>
                                    <li stxtoggle="STX.DrawingToolbar.setDrawingType('segment',this);">Segment</li>
                                    <li stxtoggle="STX.DrawingToolbar.setDrawingType('rectangle',this);">Rectangle</li>
                                    <li stxtoggle="STX.DrawingToolbar.setDrawingType('ellipse',this);">Ellipse</li>
                                    <li stxtoggle="stxx.clearDrawings()">Clear Drawings</li>
                                </ul>
                            </div>
                            <div class="stx-drawing">
                                <div class="stx-draw-settings stxToolbarFill">
                                    <div class="stx-heading">Fill:</div>
                                    <div class="stx-color stxFillColorPicker" style="background-color: #7DA6F5;"><span></span></div>
                                </div>
                                <div class="stx-draw-settings stxToolbarLine">
                                    <div class="stx-heading">Line:</div>
                                    <div class="stx-color stxLineColorPicker" style="background-color: transparent;"><span></span></div>
                                    <div class="stx-line-style stx-btn stx-menu-btn stxMenu stxToolbarLinePicker"> <span class="stx-line style1 weight1 stxLineDisplay"></span><em></em>
                                        <ul id="stx-line-style-menu" class="stx-line-style-menu menuSelect menuOutline" style="display:none;">
                                            <li stxToggle="STX.DrawingToolbar.setLine(1,'solid', this)"><span class="stx-line style1 weight1"></span></li>
                                            <li stxToggle="STX.DrawingToolbar.setLine(3,'solid', this)"><span class="stx-line style1 weight3"></span></li>
                                            <li stxToggle="STX.DrawingToolbar.setLine(5,'solid', this)"><span class="stx-line style1 weight5"></span></li>
                                            <li class="stxToolbarDotted stx-menu-divider"></li>
                                            <li class="stxToolbarDotted" stxToggle="STX.DrawingToolbar.setLine(1,'dotted', this)"><span class="stx-line style2 weight1"></span></li>
                                            <li class="stxToolbarDotted" stxToggle="STX.DrawingToolbar.setLine(3,'dotted', this)"><span class="stx-line style2 weight3"></span></li>
                                            <li class="stxToolbarDotted" stxToggle="STX.DrawingToolbar.setLine(5,'dotted', this)"><span class="stx-line style2 weight5"></span></li>
                                            <li class="stxToolbarDashed stx-menu-divider"></li>
                                            <li class="stxToolbarDashed" stxToggle="STX.DrawingToolbar.setLine(1,'dashed', this)"><span class="stx-line style3 weight1"></span></li>
                                            <li class="stxToolbarDashed" stxToggle="STX.DrawingToolbar.setLine(3,'dashed', this)"><span class="stx-line style3 weight3"></span></li>
                                            <li class="stxToolbarDashed" stxToggle="STX.DrawingToolbar.setLine(5,'dashed', this)"><span class="stx-line style3 weight5"></span></li>
                                            <li class="stxToolbarNone stx-menu-divider"></li>
                                            <li class="stxToolbarNone" stxToggle="STX.DrawingToolbar.setLine(0,'none', this)">None</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="stx-draw-settings stxToolbarAxisLabel">
                                    <div class="stx-heading">Axis Label:</div>
                                    <span class="stx-checkbox stxAxisLabel" onclick="STX.DrawingToolbar.toggleAxisLabel(this);"></span>
                                </div>
                            </div>
                        </div>

                        <ul class="hu">
                            <li><span class="huLabel">O: </span><span id="huOpen" class="huField"></span></li>
                            <li><span class="huLabel">H: </span><span id="huHigh" class="huField"></span></li>
                            <li><span class="huLabel">C: </span><span id="huClose" class="huField"></span></li>
                            <li><span class="huLabel">L: </span><span id="huLow" class="huField"></span></li>
                            <li><span class="huLabel">V: </span><span id="huVolume" class="huField"></span></li>
                        </ul>
                    </div>
                    <!-- End Toolbar -->

                    <!-- Dialog Container -->
                    <div class="stx-dialog-container">

                        <!-- Indicator Dialogs -->
                        <!-- The studyDialog is a general purpose dialog for entering the parameters for studies. It may be customized so long
                        as the id an class names remain the same. Note that it contains templates which are replicated dynamically -->
                        <div id="studyDialog" style="display:none;" class="stx-dialog">
                            <h4 class="title" style="color: black"></h4>
                            <div onClick="STX.DialogManager.dismissDialog()" class="stx-btn stx-ico"><span class="stx-ico-close"></span></div>
                            <div id="inputs">
                                <div class="inputTemplate" style="display:none">
                                    <div class="stx-heading"></div>
                                    <div class="stx-data"></div>
                                </div>
                            </div>
                            <div id="outputs">
                                <hr/>
                                <div class="outputTemplate" style="display:none">
                                    <div class="stx-heading"></div>
                                    <div class="stx-color"><span></span></div>
                                </div>
                            </div>
                            <div id="parameters"></div>
                            <div onClick="createStudy();STX.DialogManager.dismissDialog()" class="stx-btn">Create</div>
                        </div>

                        <div id="studyOverZones" style="display:none">Show Zones
                            <input id="studyOverZonesEnabled" type="checkbox" class="stx-input-check">
                            <div class="outputTemplate">
                                <div class="stx-heading">OverBought</div>
                                <div class="stx-data">
                                    <input id="studyOverBoughtValue" type="text" style="width:18px;" class="stx-input-field">
                                    <div class="stx-color" id="studyOverBoughtColor"><span></span></div>
                                </div>
                            </div>
                            <div class="outputTemplate">
                                <div class="stx-heading">OverSold</div>
                                <div class="stx-data">
                                    <input id="studyOverSoldValue" type="text" style="width:18px;" class="stx-input-field">
                                    <div class="stx-color" id="studyOverSoldColor"><span></span></div>
                                </div>
                            </div>
                        </div>


                        <!-- Timezone Dialogs -->
                        <div id="timezoneDialog" style="display:none;" class="stx-dialog">
                            <h4 class="title">Choose Timezone</h4>
                            <div onClick="STX.DialogManager.dismissDialog()" class="stx-btn stx-ico"><span class="stx-ico-close">Close</span></div>
                            <p>To set your timezone use the location button below, or scroll through the following list...</p>
                            <div class="detect">
                                <div class="stx-btn" onClick="STX.TimeZoneWidget.removeTimeZone();STX.DialogManager.dismissDialog();">Use My Current Location</div>
                            </div>
                            <div id="timezoneDialogWrapper" style="max-height:360px;">
                                <ul>
                                    <li id="timezoneTemplate" style="display:none;cursor:pointer;"></li>
                                </ul>
                            </div>
                            <div class="instruct">(Scroll for more options)</div>
                        </div>

                        <!-- Sharing Dialogs. This requires stxShare.js-->
                        <div id="sharedLinkDialog" style="display:none; width:300px;text-align:center;" class="stx-dialog">
                            <h4 class="title">Chart Shared Successfully!</h4>
                            <div onClick="STX.DialogManager.dismissDialog()" class="stx-btn stx-ico"><span class="stx-ico-close">Close</span></div>
                            <p>Use the following link to share your chart:</p>
                            <div id="shareCopyPaste"></div>
                            <p class="or">or...</p>
                            <p><a id="shareLink" target="_blank" href="">Open shared chart in new window</a></p>
                        </div>

                        <!-- Theme Dialog -->
                        <div id="themeDialog" style="display:none" class="stx-dialog">
                            <h4>Create a New Custom Theme</h4>
                            <div onClick="STX.DialogManager.dismissDialog()" class="stx-btn stx-ico"><span class="stx-ico-close">Close</span></div>

                            <div class="settings">
                                <ul>
                                    <li class="stx-heading">Chart Style</li>
                                    <li>
                                        <div class="stx-heading"><span>Candle</span>/<span>Bar</span>/<span>Line</span></div>
                                        <div class="stx-data">
                                            <div class="stx-color stx_candle_up"><span></span></div>
                                            <div class="stx-color stx_candle_down"><span></span></div>
                                        </div>
                                        <div class="stx-heading"><span>Wick</span></div>
                                        <div class="stx-data">
                                            <div class="stx-color stx_candle_shadow_up"><span></span></div>
                                            <div class="stx-color stx_candle_shadow_down"><span></span></div>
                                        </div>
                                        <div class="stx-heading"><input id="candleBordersOn" type="checkbox" class="stx-input-check" checked> <span>Candle Borders</span></div>
                                        <div class="stx-data">
                                            <div class="stx-border-color stx_candle_up"><span></span></div>
                                            <div class="stx-border-color stx_candle_down"><span></span></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="stx-heading"><span>Monotone</span> <span>Bar</span>/<span>Line</span></div>
                                        <div class="stx-data">
                                            <div class="stx-color stx_candle_shadow"><span></span></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="stx-heading"><div><span>Mountain Charts</span></div>
                                            <input id="mountainGradientOn" type="checkbox" class="stx-input-check" style="margin-left:5px" checked> <span>Gradient</span></div>
                                        <div class="stx-data">
                                            <div class="stx-border-color stx_mountain"><span></span></div>
                                        </div>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="stx-heading">Background</li>
                                    <li>
                                        <div class="stx-heading">Background</div>
                                        <div class="stx-data">
                                            <div class="stx-color backgroundColor"><span></span></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="stx-heading">Grid Lines</div>
                                        <div class="stx-data">
                                            <div class="stx-color stx_grid"><span></span></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="stx-heading">Date Dividers</div>
                                        <div class="stx-data">
                                            <div class="stx-color stx_grid_dark"><span></span></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="stx-heading">Axis Text</div>
                                        <div class="stx-data">
                                            <div class="stx-color stx_xaxis_dark"><span></span></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <label class="themeName" for="themeName">New Theme Name:</label>
                            <input type="text" id="themeName" name="themeName" autocapitalize="off" autocorrect="off" spellcheck="off" value="My Theme" class="stx-input-field">
                            <div onClick="STX.ThemeManager.saveTheme($$('themeName').value, stxx);STX.DialogManager.dismissDialog()" class="stx-btn">Save Theme</div>
                        </div>

                    </div>
                    <!-- End Dialog Container -->

                    <!-- Chart -->
                    <div class="chartContainer" style="height: 340px;">  <!-- This is the container for the chart itself. This div will be passed in to the STXChart object. You may place this anywhere on your page. -->

                        <!-- Attribution -->
                        <p class="attribution">
                            <span class="xignite"><a target="_blank" href="http://www.xignite.com">Market Data</a> by Xignite.</span>
                            <span class="real-time">Quote is real-time.</span>
                            <span class="delayed">Data delayed 15 min.</span>
                            <span class="bats">BATS BZX real-time.</span>
                            <span class="eod">End of day quote.</span>
                            <span class="random">Quote is randomized.</span>
                        </p>

                    </div>
                    <!-- End Chart -->

                    <img class="stx-loader" src="image/stx-loading.gif" style="display:none">
                </div>
            <!--</div>-->
        </div>
    </div>
<!-- col-md-8 -->




<!-- col-md-3 -->
<div class="col-sm-3 col-xs-12 no-padd btc-padd-marg">

<div class="col-sm-12 col-xs-12 no-padd all-data-padd">


<div class="col-sm-12 col-xs-12 no-padd timer-bg-box">
<div class="col-sm-8 col-xs-8 no-padd expire-head">
  <h4>BTC/ETC</h4>
</div>

<div class="col-sm-4 col-xs-4 no-padd">






</div>



</div>

<div class="col-sm-12 col-xs-12 no-padd main-padd-left">
<ul class="time-balance-list">
<li>

<!--            <select class="form-control" id="expiry" style="height: 10px !important;">-->
<!--                <option>1 Minute</option>-->
<!--                <option>5 Minutes</option>-->
<!--                <option>15 Minutes</option>-->
<!---->
<!--            </select>-->


<!--<select  onchange="eval(this.value);" style="height:30px !important" autocomplete="off">-->
<!--    <option value="STX.DrawingToolbar.setDrawingType('',this);STX.DrawingToolbar.setCrosshairs(false, this)">Expiry</option>-->
<!--    <option value="STX.DrawingToolbar.setDrawingType('',this);STX.DrawingToolbar.setCrosshairs(true, this)">Crosshairs</option>-->
<!--    <option value="STX.DrawingToolbar.setDrawingType('annotation',this);">Annotation</option>-->
<!--</select>-->


        <h4> Expiry <span>
        <a href="javascript:void(0)" onclick="expiry=1" class="btn btn-chart">1m</a>
        <a href="javascript:void(0)" onclick="expiry=5" class="btn btn-chart">5m</a>
        <a href="javascript:void(0)" onclick="expiry=15" class="btn btn-chart">15m</a>

            </span></h4>

</li>
    <li><h4>Payout <span class="text-success">65%</span></h4></li>
<li><h4>Balance <span id="demoBalance">0.12345678 DEMO</span></h4></li>
    <li><h4>Market <span><i id="marketArrow" class="fa fa-caret-up"></i> <span id="marketValue">0.12345678 BTC</span></span></h4></li>
</ul>
</div>


<div class="col-sm-12 col-xs-12 no-padd main-padd-left">

<input type="text" id="amount" name="" class="btc-value-input" value="0.0100 Btc">


<div class="col-sm-12 col-xs-12 no-padd range-slider">
      <label for="slider">Size:</label> 
    <input type="range" name="slider" id="slider" value="0" min="0" max="100" data-highlight="true" class="volume-type-slide" />
      
</div>


</div>


<div class="col-sm-12 col-xs-12 no-padd min-padd">

<div class="col-sm-6 col-xs-6 no-padd binary-service">
<a href="#" onclick="buy();" class="btn btn-buy">Buy</a>
  </div>

<div class="col-sm-6 col-xs-6 no-padd binary-service">
<a href="#" onclick="sell()" class="btn btn-sell">Sell</a>
</div>


</div>

</div>

</div>
<!-- col-md-4 -->






<div class="col-lg-12  col-sm-12 col-xs-12 no-padd tab-content open-trader-padd">
  <h4 class="open-trader-head text-center"> Open traders </h4>  

    <div class="tab-pane active">
<table class="table table-trader table-striped">

<tr class="content-table-sec">
<th class="col-sm-2 no-padd">Pair</th>
<th class="col-sm-2 no-padd">Amount</th>
<th class="col-sm-2 no-padd">Target</th>
<th class="col-sm-2 no-padd">Market</th>
<th class="col-sm-2 no-padd">Expiration Time</th>
<th class="col-sm-2 no-padd">Profit</th>
</tr>

<tr class="content-table-sec change-color">
<td class="col-sm-2 no-padd"><i class="fa fa-caret-up"></i>BTC/ETH</td>
<td class="col-sm-2 no-padd">BTC 0.01432342</td>
<td class="col-sm-2 no-padd">0.021123242</td>
<td class="col-sm-2 no-padd"> 0.023145233</td>
<td class="col-sm-2 no-padd">15:30</td>
<td class="col-sm-2 no-padd">BTC 0.0123215</td>
</tr>


<tr class="content-table-sec change-color">
<td class="col-sm-2 no-padd"><i class="fa fa-caret-down"></i>BTC/ETH</td>
<td class="col-sm-2 no-padd">BTC 0.01</td>
<td class="col-sm-2 no-padd">0.02112</td>
<td class="col-sm-2 no-padd"> 0.0233</td>
<td class="col-sm-2 no-padd">15:30</td>
<td class="col-sm-2 no-padd">BTC 0.05</td>
</tr>

</table>
</div>


</div>

    
  


<div class="col-sm-12 col-xs-12 no-padd trade-history-pad">
 <h4 class="open-trader-head text-center"> Trade History </h4> 


<div class="tab-pane">
<table class="table table-trader table-striped">

<tr class="content-table-sec">
<th class="col-sm-2 no-padd">Asset</th>
<th class="col-sm-2 no-padd">Order Time</th>
<th class="col-sm-2 no-padd">Expiration Time</th>
<th class="col-sm-2 no-padd">Amount</th>
<th class="col-sm-2 no-padd">Strike Price</th>
<th class="col-sm-2 no-padd">Close Price</th>
<th class="col-sm-2 no-padd">Result</th>
<th class="col-sm-2 no-padd">Returns</th>
</tr>

<tr class="content-table-sec change-color">
    <td class="col-sm-2 no-padd"><i class="fa fa-caret-up"></i>BTC/ETH</td>
<td class="col-sm-2 no-padd">11/01/2018 11:28:05</td>
<td class="col-sm-2 no-padd">11/01/2018 11:45</td>
<td class="col-sm-2 no-padd">BTC 0.010125</td>
<td class="col-sm-2 no-padd">0.0021516</td>
<td class="col-sm-2 no-padd">0.0021724</td>
<td class="col-sm-2 no-padd"><p class="text-success">WON</p></td>
<td class="col-sm-2 no-padd">0.0102312</td>
</tr>

<tr class="content-table-sec change-color">
<td class="col-sm-2 no-padd"><i class="fa fa-caret-down"></i>BTC/ETH</td>
<td class="col-sm-2 no-padd">11/01/2018 11:28:05</td>
<td class="col-sm-2 no-padd">11/01/2018 11:45</td>
<td class="col-sm-2 no-padd">BTC 0.010125</td>
<td class="col-sm-2 no-padd">0.0021516</td>
<td class="col-sm-2 no-padd">0.0021724</td>
<td class="col-sm-2 no-padd"><p class="text-danger">LOST</p></td>
<td class="col-sm-2 no-padd">0.0102312</td>
</tr>
    
<tr class="content-table-sec change-color">
<td class="col-sm-2 no-padd"><i class="fa fa-caret-up"></i>BTC/ETH</td>
<td class="col-sm-2 no-padd">11/01/2018 11:28:05</td>
<td class="col-sm-2 no-padd">11/01/2018 11:45</td>
<td class="col-sm-2 no-padd">BTC 0.010125</td>
<td class="col-sm-2 no-padd">0.0021516</td>
<td class="col-sm-2 no-padd">0.0021724</td>
    <td class="col-sm-2 no-padd" ><p class="text-success">WON</p></td>
<td class="col-sm-2 no-padd">0.0102312</td>
</tr>

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

<script src="js/stxThirdParty.js"></script>		<!-- W3C intl support. Use this until browsers have internal support for ECMA-402. -->
<script src="js/stxTimeZoneData.js"></script>	<!-- Timezone support, JSONP data file -->
<script src="js/stx.js"></script>
<script src="js/stxLibrary.js"></script>
<script src="js/stxKernelOs.js"></script>
<script src="js/translations.js"></script>

<script>
    // Declare a STXChart object. This is the main object for drawing charts
    var stxx=new STXChart({container:$$$(".chartContainer")});

    //stxx.setTimeZone("Etc/Greenwich");			// Optionally set the timezone for your data feed.
    //STX.I18N.setLocale(stxx, "ru");              	// Optionally set locale in order to localize dates, numbers and months.
    //STX.I18N.setLanguage(stxx, "ru");				// Optionally set translation services

    // Add any additional intervals that you support to the displayMap
    function changePeriodicity(newInterval){
        var displayMap={
            "12h":[24, "minute"],
            "8h":[16, "minute"],
            "4h":[8, "minute"],
            "2h":[4, "minute"],
            "1h":[2, "minute"],
            "30m":[1, "minute"]
        };
        var valueAndUnit = displayMap[newInterval];
        stxx.setPeriodicityV2(valueAndUnit[0], valueAndUnit[1], function(err){
            if(!err){
                $$$("#periodBtn").childNodes[0].data=displayMap[newInterval][1];
                showAttribution();
            }
        });
    }

    /*
     * Initial function that is called when chart loads. If you want the chart to default to a security, or if you're passing a security in with a query string then load it here
    */

    function displayChart(){
        console.log("display");
        clearTimeout();
        stxx.setPeriodicityV2(1, "minute");
        stxx.newChart("SPY",null,null,showAttribution);
    }

    /**
     * Create your own QuoteFeed class derived from STX.QuoteFeed. See documentation or stx.js on how to do this.
     */
    stxx.attachQuoteFeed(new STX.QuoteFeed.Demo(),{"interval":"minute", "refreshInterval":1});

    /*
     * Modify the components in this function to establish the behavior of your UI.
     */
    function runSampleUI(){
        STX.ThemeManager.builtInThemes={
            "Light":true,
            "Dark":true
        };
        // Set up menu manager
        STX.MenuManager.makeMenus();
        STX.MenuManager.registerChart(stxx);

        var currentTheme=STX.StorageManager.get("themes");
        if(currentTheme){
            STX.ThemeManager.setThemes(JSON.parse(currentTheme), stxx);
        }else{
            STX.ThemeManager.loadBuiltInTheme(stxx, "Dark"); // Set "Light" as the default theme
        }

        // candle or mountain? mountain
        stxx.setChartType('mountain');

        STX.ThemeManager.themesToMenu($$("customThemeSelector"), $$("builtInThemeSelector"), stxx, STX.StorageManager.callbacker("themes"));

        var toolbar=new STX.DrawingToolbar($$$(".stx-wrapper .stx-toolbar"), stxx);

        STX.TimeZoneWidget.initialize(STX.StorageManager.get("timezone"), STX.StorageManager.callbacker("timezone"));

        function textCallback(that, txt, filter, clicked){
            if(clicked) that.config.input.value="";

            // Here is dummy code that demonstrates the format which your lookup module should return

            var sampleResults=[
                {symbol:"S",description:"Sprint Corporation", exchange:"NYSE"},
                {symbol:"SPY",description:"SPDR S&amp;P 500 ETF", exchange:"NYSE"},
                {symbol:"^GSPC",description:"SPDR S&amp;P 500", exchange:""},
                {symbol:"CSCO",description:"Cisco Systems, Inc.", exchange:"NASDAQ"},
                {symbol:"SWKS",description:"Skyworks Solutions Inc.", exchange:"NASDAQ"},
                {symbol:"GLD",description:"SPDR Gold Shares", exchange:"NYSE"},
                {symbol:"WMT",description:"Wal-Mart Stores Inc.", exchange:"NYSE"},
                {symbol:"SLV",description:"iShares Silver Trust", exchange:"NYSE"},
                {symbol:"DDD",description:"3D Systems Corp.", exchange:"NYSE"},
                {symbol:"GS",description:"The Goldman Sachs Group, Inc.", exchange:"NYSE"},
                {symbol:"^USDCAD",description:"US Dollar Canadian Dollar", exchange:"FX"},
                {symbol:"^EURUSD",description:"Euro US Dollar", exchange:"FX"}
            ];

            // This is a sample filtering function for sampleResults above.
            // You may want to do your filtering within own search method
            (function(filter){
                var myResults=[];
                if(filter){
                    var elems={
                        "STOCKS":[0,1,3,4,5,6,7,8,9],
                        "FOREX":[10,11],
                        "INDEXES":[2]
                    };
                    if(!elems[filter]) return;
                    for(var i=0;i<elems[filter].length;i++){
                        myResults.push(sampleResults[elems[filter][i]]);
                    }
                    sampleResults=[].concat(myResults);
                }
                myResults=[];
                for(var j=0;j<sampleResults.length;j++){
                    if(sampleResults[j].description.toLowerCase().indexOf(txt.toLowerCase())>-1 ||
                        sampleResults[j].symbol.toLowerCase().indexOf(txt.toLowerCase())===0){
                        myResults.push(sampleResults[j]);
                    }
                }
                sampleResults=[].concat(myResults);
            })(filter);

            // Display the results in the drop down
            that.displayResults(sampleResults);

            /*
            // this is sample code for enabling simple suggestive search using an ajax query
            // have your server return a JSON object in the format of sampleResults above
            function processSearchResults(that){
              return function(status, results){
                if(status==200){
                  that.displayResults(JSON.parse(results));
                }
              };
            }
            var url="http://yourdomain.com?search=" + txt + "&filter=" + filter;
            STX.postAjax(url, null, processSearchResults(that));
            */
        }

        function selectCallback(that, symbol, filter){
            if(symbol){
                stxx.newChart(symbol,null,null,showAttribution);
            }
        }

        var config={
            input: $$$("#symbol"),
            textCallback: textCallback,					// If you don't have a symbol lookup then just leave this blank
            selectCallback: selectCallback,
            filters:["ALL","STOCKS","FOREX","INDEXES"],	// Names of the filters you are supporting
            stx: stxx									// the chart object -- needed for translations
        };
        var stxLookupWidget=new STX.LookupWidget(config);
        stxLookupWidget.init();

    }

    /*
     * Everything from here on is code to support the stx-standard.html user interface. You should not need to modify this code.
     */


    function createStudy(){
        STX.Studies.go($$("studyDialog"), stxx);
    }

    /**
     * @deprecated
     */
    function createVolumePanel(){
        if(!stxx || !stxx.chart.dataSet) return;
        if(stxx.panelExists("vchart")) return;
        stxx.createPanel("Volume", "vchart", 100);
        stxx.draw();
    }

    /**
     * @deprecated
     */
    function toggleVolumeUnderlay(){
        if(!stxx || !stxx.chart.dataSet) return;
        stxx.setVolumeUnderlay(!stxx.layout.volumeUnderlay);
    }

    function toggleLog(){
        stxx.layout.semiLog=!stxx.layout.semiLog;
        STX.swapClassName($$$(".stx-logscale"),stxx.layout.semiLog.toString(),(!stxx.layout.semiLog).toString());
        stxx.draw();
        stxx.changeOccurred("layout");
        stxx.doDisplayCrosshairs();
    }

    // Indirection function for creating the study dialog.
    function studyDialog(obj, study){
        if(study=='none')return;
        if(!stxx || !stxx.chart.dataSet) return;
        $$("studyDialog").querySelectorAll(".title")[0].innerHTML=obj.innerHTML;
        STX.Studies.studyDialog(stxx, study, $$("studyDialog"));
        var delay=STX.ipad?400:0;  // so that touch devices don't register taps from menu selection on dialog
        setTimeout(function(){
            STX.DialogManager.displayDialog("studyDialog");
        }, delay);
    }

    function prependHeadsUpHR(){
        //var tick=Math.floor((STXChart.crosshairX-this.left)/this.layout.candleWidth);
        var tick=this.barFromPixel(this.cx);
        var prices=this.chart.xaxis[tick];

        $$("huOpen").innerHTML="";
        $$("huClose").innerHTML="";
        $$("huHigh").innerHTML="";
        $$("huLow").innerHTML="";
        $$("huVolume").innerHTML="";
        if(prices!=null){
            if(prices.data){
                $$("huOpen").innerHTML=this.formatPrice(prices.data.Open);
                $$("huClose").innerHTML=this.formatPrice(prices.data.Close);
                $$("huHigh").innerHTML=this.formatPrice(prices.data.High);
                $$("huLow").innerHTML=this.formatPrice(prices.data.Low);
                $$("huVolume").innerHTML=STX.condenseInt(prices.data.Volume);
            }
        }
    }

    STXChart.prototype.prepend("headsUpHR", prependHeadsUpHR);

    /** This injection creates a legend for overlays that cannot be deleted with a right click  */
    STXChart.prototype.append("draw", function(){
        if(!this.layout.studies) return;

        function closure(stx, sd){
            return function(e){
                STX.Studies.removeStudy(stx,sd);
                e.stopPropagation();
                STX.clearSafeClickTouches(e.target);
                e.target.style.display="";
            };
        };
        for(var id in this.layout.studies){
            var sd=this.layout.studies[id];
            if(!sd.libraryEntry.customRemoval) continue;
            var closeIcon=$$$("#studies #" + sd.name.replace(" ","-"));
            if(closeIcon){
                closeIcon.style.display="inline-block";
                if(!closeIcon.safeClickTouchEvents){
                    STX.safeClickTouch(closeIcon, closure(this, sd));
                }
            }
        }
    });

    function resizeContainers(){
        if(STX.ipad && STX.isIOS7or8){
            // IOS7 bug in landscape mode doesn't report the pageHeight correctly. The fix is to fix the height
            // in css and then adjust the body height to the new size
            STX.appendClassName($$$("html"),"ipad ios7");
            $$$("body").style.height=STX.pageHeight()+"px";
        }

        var chartContainer=$$$(".chartContainer");
        var chartArea=$$$(".stx-wrapper");
        var sidePanel=$$$(".stx-panel-side");
        var panelWidth=2;
        if(sidePanel && sidePanel.offsetLeft){
            panelWidth=chartArea.offsetWidth-sidePanel.offsetLeft;
        }

        chartContainer.style.width=(chartArea.offsetWidth-panelWidth)+"px";

        var bottomMargin=2;
        if($$$(".stx-footer")) bottomMargin=$$$(".stx-footer").offsetHeight;

        chartContainer.style.height=(STX.pageHeight()-STX.getPos(chartContainer).y - bottomMargin) + "px";
        chartArea.style.height=(STX.pageHeight()-STX.getPos(chartArea).y - bottomMargin) + "px";

        if(stxx && stxx.chart.canvas!=null){
            stxx.resizeChart();
        }
    }

    function toggleFullScreenMode(){
        var wrapper=$$$(".stx-wrapper");
        if(window.fullScreenMode){
            window.fullScreenMode=false;
            wrapper.style.position=null;
            wrapper.style.left=null;
            wrapper.style.top=null;
            wrapper.style.width=null;
            var chartContainer=$$$(".chartContainer");
            console.log(chartContainer.prevWidth);
            chartContainer.style.height=chartContainer.prevHeight;
            chartContainer.style.width=chartContainer.prevWidth;
            wrapper.style.height=null;
            wrapper.style.width=null;
            resizeScreen();
        }else{
            window.fullScreenMode=true;
            var chartContainer=$$$(".chartContainer");
            chartContainer.prevHeight=chartContainer.clientHeight+"px";
            chartContainer.prevWidth=chartContainer.clientWidth+"px";
            // stx-wrapper must be at the body level of the page for full screen to work
            // and it must have a z-index greater than anything else on the page
            wrapper.style.position="absolute";
            wrapper.style.left="0px";
            wrapper.style.top="0px";
            wrapper.style.width="100%";
            resizeScreen();
        }
        stxx.draw();
    }

    function resizeScreen(){
        if(stxx && stxx.chart.canvas!=null){
            if(window.fullScreenMode){
                resizeContainers();
            }else{
                stxx.resizeChart();
            }
        }
    }

    function showAttribution(){
        $$$(".attribution").className="attribution";
        if(!stxx.chart.attribution) return;
        var source=stxx.chart.attribution.source;
        var attribution=$$$(".attribution");
        STX.appendClassName(attribution,source.toLowerCase());
        if(source && source!="chartiq")
            STX.appendClassName(attribution,stxx.chart.attribution.exchange.toLowerCase());
    }

    if($$("shareBtn") && typeof STXSocial!="undefined") {
        $$("shareBtn").style.display="";
        $$("shareBtn").onclick=function(){
            STXSocial.shareChart(stxx, null,
                function(link){
                    $$$("#shareLink").href=link;
                    $$$("#shareCopyPaste").innerHTML=link;
                    STX.DialogManager.displayDialog("sharedLinkDialog");
                },
                function(err){STX.alert("err=" + err);}
            )
        };
    }



    window.onresize=resizeScreen;

    runSampleUI();
</script>
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
console.log("pagecreated");
    $('#slider').siblings('.ui-slider').bind('tap', function(event, ui){ makeAjaxChange($(this).siblings('input')); });
    $('#slider').siblings('.ui-slider a').bind('taphold', function(event, ui){ makeAjaxChange($(this).parent().siblings('input'));

});

function makeAjaxChange( elem ) {
    alert("change");
    alert(elem.val());
}
});
  

</script>





<script type="text/javascript">
  $(function () {
      displayChart();
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

<script>
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
//                $('.balance').text(data.balance);
                userBalance = data.demoBalance;
                $("#demoBalance").html("" + data.demoBalance + " DEMO");
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
            url: "log/markets.json",
            dataType: "json",
            success: function(alldata) {
                var oldMarketValue = marketValue;
                marketValue = alldata['<?php echo $_GET['market']; ?>'];
                $("#marketValue").html("" + marketValue.toFixed(8) + " " + "<?php echo $_GET['market']; ?>".substr(0, 3).toUpperCase());
                if(oldMarketValue != -1 && oldMarketValue != marketValue) {
                    $("#marketArrow").removeClass("fa-caret-up");
                    $("#marketArrow").removeClass("fa-caret-down");
                    if(marketValue > oldMarketValue) {
                        $("#marketArrow").addClass("fa-caret-up");
                    }
                    else {
                        $("#marketArrow").addClass("fa-caret-down");
                    }
                }
            }
        });
    }

    function buy() {
        $.ajax({
            url: "ajax/demoBet.php",
            method: "POST",
            data: "market="+<?=json_encode($_GET['market'])?>+"&amount="+ getNumber($("#amount").val())+"&direction=up"+"&expiry="+expiry,
            dataType: "json",
            success: function(data){
                console.log(data);
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
            url: "ajax/demoBet.php",
            method: "POST",
            data: "market="+<?=json_encode($_GET['market'])?>+"&amount="+getNumber($("#amount").val()) + "&direction=down" + "&expiry="+expiry,
            dataType: "json",
            success: function (data) {
                if (!data.status) {
                    alert('Error: ' + data.message);
                } else {
                    alert('Successfully processed!');
                    $(".balance").text(data.newBalance);
                    userInfoAjax();
                }
            }
        });
    }

    function getNumber(mixture) {
        while(isNaN(Number(mixture))) {
            mixture = mixture.substring(0, mixture.length - 1);
        }
        return Number(mixture);
    }


</script>

  <script type="text/javascript">
  
      $(document).ready(function(){
          setInterval(function(){
              userInfoAjax();
          }, 5000);

          setInterval(function() {
              retrieveMarketsAjax();
          }, 5000);


          retrieveMarketsAjax();



          userInfoAjax();

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

    var userBalance = 0;
    var marketValue = -1;
    var expiry = 1;

    $(document).ready(function() {
        $('#myCarousel').carousel({
            interval: 10000
        })

        $('#myCarousel').on('slid.bs.carousel', function() {
            //alert("slid");
        });

        // var slider = document.getElementById("slider");
        // slider.addEventListener('change', function() {
        //     console.log("changed");
        // }, false);
        //

        function makeAjaxChange( elem ) {
            alert("change");
            alert(elem.val());
        }

    });
</script>

