import requests
import json
import threading
import datetime

# constants for urls

url_home = "https://bittrex.com/"
url_apiV11 = url_home + "api/v1.1/"
url_apiV20 = url_home + "Api/v2.0/"

url_ticks_btc_eth = url_apiV20 + "pub/market/GetTicks?marketName=BTC-ETH&tickInterval=oneMin"
url_ticks_btc_ltc = url_apiV20 + "pub/market/GetTicks?marketName=BTC-LTC&tickInterval=oneMin"
url_ticks_btc_neo = url_apiV20 + "pub/market/GetTicks?marketName=BTC-NEO&tickInterval=oneMin"
url_ticks_btc_xrp = url_apiV20 + "pub/market/GetTicks?marketName=BTC-XRP&tickInterval=oneMin"

# sorry but there isn't such api
# so we must calculate from btc-eth :(
# url_ticks_eth_btc = url_apiV20 + "pub/market/GetTicks?marketName=ETH-BTC&tickInterval=oneMin"
url_ticks_eth_ltc = url_apiV20 + "pub/market/GetTicks?marketName=ETH-LTC&tickInterval=oneMin"
url_ticks_eth_neo = url_apiV20 + "pub/market/GetTicks?marketName=ETH-NEO&tickInterval=oneMin"
url_ticks_eth_xrp = url_apiV20 + "pub/market/GetTicks?marketName=ETH-XRP&tickInterval=oneMin"

url_marketsummary_btc_eth = url_apiV11 + "public/getmarketsummary?market=BTC-ETH"
url_marketsummary_btc_ltc = url_apiV11 + "public/getmarketsummary?market=BTC-LTC"
url_marketsummary_btc_neo = url_apiV11 + "public/getmarketsummary?market=BTC-NEO"
url_marketsummary_btc_xrp = url_apiV11 + "public/getmarketsummary?market=BTC-XRP"

# same reason as above
# url_marketsummary_eth_btc = url_apiV11 + "public/getmarketsummary?market=ETH-BTC"
url_marketsummary_eth_neo = url_apiV11 + "public/getmarketsummary?market=ETH-NEO"
url_marketsummary_eth_ltc = url_apiV11 + "public/getmarketsummary?market=ETH-LTC"
url_marketsummary_eth_xrp = url_apiV11 + "public/getmarketsummary?market=ETH-XRP"

url_marketsummaries = url_apiV11 + "public/getmarketsummaries"

# json data for last 30 minutes to draw 8 min charts
log_for_minChart = {}
log_for_market = {}
log_for_stxChart = {}

# before timer(every second), fetch rates last 30 minutes
# even if there is 3~4 minutes error, it is not important because they are mini chart.
def prepare():
    # well, there is a serious problem, same code is repeated 8 times.
    # I'll fix it and rewrite comments :)
    global log_for_minChart
    response = requests.request("GET", url_ticks_btc_eth)
    data = response.json()
    last30 = data['result'][-30:]
    log_for_minChart['btc-eth'] = []
    for oneMinData in last30:
        log_for_minChart['btc-eth'].append(oneMinData['C'])

    response = requests.request("GET", url_ticks_btc_ltc)
    data = response.json()
    last30 = data['result'][-30:]
    log_for_minChart['btc-ltc'] = []
    for oneMinData in last30:
        log_for_minChart['btc-ltc'].append(oneMinData['C'])

    response = requests.request("GET", url_ticks_btc_neo)
    data = response.json()
    last30 = data['result'][-30:]
    log_for_minChart['btc-neo'] = []
    for oneMinData in last30:
        log_for_minChart['btc-neo'].append(oneMinData['C'])

    response = requests.request("GET", url_ticks_btc_xrp)
    data = response.json()
    last30 = data['result'][-30:]
    log_for_minChart['btc-xrp'] = []
    for oneMinData in last30:
        log_for_minChart['btc-xrp'].append(oneMinData['C'])

    # response = requests.request("GET", url_ticks_eth_btc)
    # data = response.json()
    # last30 = data['result'][-30:]
    # log_for_minChart['eth-btc'] = []
    # for oneMinData in last30:
    #     log_for_minChart['eth-btc'].append(oneMinData['C'])
    log_for_minChart['eth-btc'] = []
    for btc_eth in log_for_minChart['btc-eth']:
        log_for_minChart['eth-btc'].append(1.0 / btc_eth)

    response = requests.request("GET", url_ticks_eth_ltc)
    data = response.json()
    last30 = data['result'][-30:]
    log_for_minChart['eth-ltc'] = []
    for oneMinData in last30:
        log_for_minChart['eth-ltc'].append(oneMinData['C'])

    response = requests.request("GET", url_ticks_eth_neo)
    data = response.json()
    last30 = data['result'][-30:]
    log_for_minChart['eth-neo'] = []
    for oneMinData in last30:
        log_for_minChart['eth-neo'].append(oneMinData['C'])

    response = requests.request("GET", url_ticks_eth_xrp)
    data = response.json()
    last30 = data['result'][-30:]
    log_for_minChart['eth-xrp'] = []
    for oneMinData in last30:
        log_for_minChart['eth-xrp'].append(oneMinData['C'])

    print log_for_minChart

    log_for_stxChart['btc-eth'] = []
    log_for_stxChart['btc-ltc'] = []
    log_for_stxChart['btc-neo'] = []
    log_for_stxChart['btc-xrp'] = []
    log_for_stxChart['eth-btc'] = []
    log_for_stxChart['eth-ltc'] = []
    log_for_stxChart['eth-neo'] = []
    log_for_stxChart['eth-xrp'] = []


# second of time when api is called last
# used to detect beginning of new minute
pastSec = -1


def update_log_for_minChart():
    global log_for_minChart, pastSec
    sec = datetime.datetime.now().second
    pastSec = pastSec != -1 and pastSec or sec

    try:
        # get summaries of all markets
        response = requests.request("GET", url_marketsummaries)
        data = response.json()
        if data['success'] == False:
            return

        # get last value and timestamps of eight markets
        value_btc_eth = 0
        value_btc_ltc = 0
        value_btc_neo = 0
        value_btc_xrp = 0
        value_eth_ltc = 0
        value_eth_neo = 0
        value_eth_xrp = 0
        timestamp_btc_eth = ''
        timestamp_btc_ltc = ''
        timestamp_btc_neo = ''
        timestamp_btc_xrp = ''
        timestamp_eth_ltc = ''
        timestamp_eth_neo = ''
        timestamp_eth_xrp = ''

        for market in data['result']:
            if market['MarketName'] == 'BTC-ETH':
                value_btc_eth = market['Last']
                timestamp_btc_eth = market['TimeStamp']
            if market['MarketName'] == 'BTC-LTC':
                value_btc_ltc = market['Last']
                timestamp_btc_ltc = market['TimeStamp']
            if market['MarketName'] == 'BTC-NEO':
                value_btc_neo = market['Last']
                timestamp_btc_neo = market['TimeStamp']
            if market['MarketName'] == 'BTC-XRP':
                value_btc_xrp = market['Last']
                timestamp_btc_xrp = market['TimeStamp']
            if market['MarketName'] == 'ETH-LTC':
                value_eth_ltc = market['Last']
                timestamp_eth_ltc = market['TimeStamp']
            if market['MarketName'] == 'ETH-NEO':
                value_eth_neo = market['Last']
                timestamp_eth_neo = market['TimeStamp']
            if market['MarketName'] == 'ETH-XRP':
                value_eth_xrp = market['Last']
                timestamp_eth_xrp = market['TimeStamp']

        value_eth_btc = 1.0 / value_btc_eth
        timestamp_eth_btc = timestamp_btc_eth

        # if new minute begins append to array and remove oldest one
        # else, update last minute's value
        if sec < pastSec:
            log_for_minChart['btc-eth'].append(value_btc_eth)
            log_for_minChart['btc-ltc'].append(value_btc_ltc)
            log_for_minChart['btc-neo'].append(value_btc_neo)
            log_for_minChart['btc-xrp'].append(value_btc_xrp)

            log_for_minChart['eth-btc'].append(value_eth_btc)
            log_for_minChart['eth-ltc'].append(value_eth_ltc)
            log_for_minChart['eth-neo'].append(value_eth_neo)
            log_for_minChart['eth-xrp'].append(value_eth_xrp)

            log_for_minChart['btc-eth'].pop(0)
            log_for_minChart['btc-ltc'].pop(0)
            log_for_minChart['btc-neo'].pop(0)
            log_for_minChart['btc-xrp'].pop(0)

            log_for_minChart['eth-btc'].pop(0)
            log_for_minChart['eth-ltc'].pop(0)
            log_for_minChart['eth-neo'].pop(0)
            log_for_minChart['eth-xrp'].pop(0)

        else:
            log_for_minChart['btc-eth'][-1] = value_btc_eth
            log_for_minChart['btc-ltc'][-1] = value_btc_ltc
            log_for_minChart['btc-neo'][-1] = value_btc_neo
            log_for_minChart['btc-xrp'][-1] = value_btc_xrp

            log_for_minChart['eth-btc'][-1] = value_eth_btc
            log_for_minChart['eth-ltc'][-1] = value_eth_ltc
            log_for_minChart['eth-neo'][-1] = value_eth_neo
            log_for_minChart['eth-xrp'][-1] = value_eth_xrp

        # store only eight value for update current value in client
        log_for_market['btc-eth'] = value_btc_eth
        log_for_market['btc-ltc'] = value_btc_ltc
        log_for_market['btc-neo'] = value_btc_neo
        log_for_market['btc-xrp'] = value_btc_xrp

        log_for_market['eth-btc'] = value_eth_btc
        log_for_market['eth-ltc'] = value_eth_ltc
        log_for_market['eth-neo'] = value_eth_neo
        log_for_market['eth-xrp'] = value_eth_xrp

        ########### store 12 hours log for stx chart ###############
        if sec < pastSec:
            log_for_stxChart['btc-eth'].append({'TimeStamp':timestamp_btc_eth,'open':value_btc_eth,'close': value_btc_eth,'high': value_btc_eth,'low': value_btc_eth})
            log_for_stxChart['btc-ltc'].append({'TimeStamp':timestamp_btc_ltc,'open':value_btc_ltc,'close': value_btc_ltc,'high': value_btc_ltc,'low': value_btc_ltc})
            log_for_stxChart['btc-neo'].append({'TimeStamp':timestamp_btc_neo,'open':value_btc_neo,'close': value_btc_neo,'high': value_btc_neo,'low': value_btc_neo})
            log_for_stxChart['btc-xrp'].append({'TimeStamp':timestamp_btc_xrp,'open':value_btc_xrp,'close': value_btc_xrp,'high': value_btc_xrp,'low': value_btc_xrp})
            log_for_stxChart['eth-btc'].append({'TimeStamp':timestamp_eth_btc,'open':value_eth_btc,'close': value_eth_btc,'high': value_eth_btc,'low': value_eth_btc})
            log_for_stxChart['eth-ltc'].append({'TimeStamp':timestamp_eth_ltc,'open':value_eth_ltc,'close': value_eth_ltc,'high': value_eth_ltc,'low': value_eth_ltc})
            log_for_stxChart['eth-neo'].append({'TimeStamp':timestamp_eth_neo,'open':value_eth_neo,'close': value_eth_neo,'high': value_eth_neo,'low': value_eth_neo})
            log_for_stxChart['eth-xrp'].append({'TimeStamp':timestamp_eth_xrp,'open':value_eth_xrp,'close': value_eth_xrp,'high': value_eth_xrp,'low': value_eth_xrp})

            log_for_stxChart['btc-eth'] = log_for_stxChart['btc-eth'][-720:]
            log_for_stxChart['btc-ltc'] = log_for_stxChart['btc-ltc'][-720:]
            log_for_stxChart['btc-neo'] = log_for_stxChart['btc-neo'][-720:]
            log_for_stxChart['btc-xrp'] = log_for_stxChart['btc-xrp'][-720:]
            log_for_stxChart['eth-btc'] = log_for_stxChart['eth-btc'][-720:]
            log_for_stxChart['eth-ltc'] = log_for_stxChart['eth-ltc'][-720:]
            log_for_stxChart['eth-neo'] = log_for_stxChart['eth-neo'][-720:]
            log_for_stxChart['eth-xrp'] = log_for_stxChart['eth-xrp'][-720:]

        else:
            if len(log_for_stxChart['btc-eth']) > 0:
                candle_last = log_for_stxChart['btc-eth'][-1]
                candle_last['close'] = value_btc_eth
                candle_last['high'] = candle_last['high'] > value_btc_eth and candle_last['high'] or value_btc_eth
                candle_last['low'] = candle_last['low'] < value_btc_eth and candle_last['low'] or value_btc_eth
                log_for_stxChart['btc-eth'][-1] = candle_last

            if len(log_for_stxChart['btc-ltc']) > 0:
                candle_last = log_for_stxChart['btc-ltc'][-1]
                candle_last['close'] = value_btc_ltc
                candle_last['high'] = candle_last['high'] > value_btc_ltc and candle_last['high'] or value_btc_ltc
                candle_last['low'] = candle_last['low'] < value_btc_ltc and candle_last['low'] or value_btc_ltc
                log_for_stxChart['btc-ltc'][-1] = candle_last

            if len(log_for_stxChart['btc-neo']) > 0:
                candle_last = log_for_stxChart['btc-neo'][-1]
                candle_last['close'] = value_btc_neo
                candle_last['high'] = candle_last['high'] > value_btc_neo and candle_last['high'] or value_btc_neo
                candle_last['low'] = candle_last['low'] < value_btc_neo and candle_last['low'] or value_btc_neo
                log_for_stxChart['btc-neo'][-1] = candle_last

            if len(log_for_stxChart['btc-xrp']) > 0:
                candle_last = log_for_stxChart['btc-xrp'][-1]
                candle_last['close'] = value_btc_xrp
                candle_last['high'] = candle_last['high'] > value_btc_xrp and candle_last['high'] or value_btc_xrp
                candle_last['low'] = candle_last['low'] < value_btc_xrp and candle_last['low'] or value_btc_xrp
                log_for_stxChart['btc-xrp'][-1] = candle_last

            if len(log_for_stxChart['eth-btc']) > 0:
                candle_last = log_for_stxChart['eth-btc'][-1]
                candle_last['close'] = value_eth_btc
                candle_last['high'] = candle_last['high'] > value_eth_btc and candle_last['high'] or value_eth_btc
                candle_last['low'] = candle_last['low'] < value_eth_btc and candle_last['low'] or value_eth_btc
                log_for_stxChart['eth-btc'][-1] = candle_last

            if len(log_for_stxChart['eth-ltc']) > 0:
                candle_last = log_for_stxChart['eth-ltc'][-1]
                candle_last['close'] = value_eth_ltc
                candle_last['high'] = candle_last['high'] > value_eth_ltc and candle_last['high'] or value_eth_ltc
                candle_last['low'] = candle_last['low'] < value_eth_ltc and candle_last['low'] or value_eth_ltc
                log_for_stxChart['eth-ltc'][-1] = candle_last

            if len(log_for_stxChart['eth-neo']) > 0:
                candle_last = log_for_stxChart['eth-neo'][-1]
                candle_last['close'] = value_eth_neo
                candle_last['high'] = candle_last['high'] > value_eth_neo and candle_last['high'] or value_eth_neo
                candle_last['low'] = candle_last['low'] < value_eth_neo and candle_last['low'] or value_eth_neo
                log_for_stxChart['eth-neo'][-1] = candle_last

            if len(log_for_stxChart['eth-xrp']) > 0:
                candle_last = log_for_stxChart['eth-xrp'][-1]
                candle_last['close'] = value_eth_xrp
                candle_last['high'] = candle_last['high'] > value_eth_xrp and candle_last['high'] or value_eth_xrp
                candle_last['low'] = candle_last['low'] < value_eth_xrp and candle_last['low'] or value_eth_xrp
                log_for_stxChart['eth-xrp'][-1] = candle_last

        pastSec = sec

        # save data for mini charts
        f1 = open("last30minutes.json", "w")
        print >> f1, json.dumps(log_for_minChart)
        f1.close()

        # save data for market_value labels
        f2 = open("markets.json", "w")
        print >> f2, json.dumps(log_for_market)
        f2.close()

        # save data for stx charts
        f3 = open("stxBTC-ETH.json", "w")
        print >> f3, json.dumps(log_for_stxChart['btc-eth'])
        f3.close()

        f3 = open("stxBTC-LTC.json", "w")
        print >> f3, json.dumps(log_for_stxChart['btc-ltc'])
        f3.close()

        f3 = open("stxBTC-NEO.json", "w")
        print >> f3, json.dumps(log_for_stxChart['btc-neo'])
        f3.close()

        f3 = open("stxBTC-XRP.json", "w")
        print >> f3, json.dumps(log_for_stxChart['btc-xrp'])
        f3.close()

        f3 = open("stxETH-BTC.json", "w")
        print >> f3, json.dumps(log_for_stxChart['eth-btc'])
        f3.close()

        f3 = open("stxETH-LTC.json", "w")
        print >> f3, json.dumps(log_for_stxChart['eth-ltc'])
        f3.close()

        f3 = open("stxETH-NEO.json", "w")
        print >> f3, json.dumps(log_for_stxChart['eth-neo'])
        f3.close()

        f3 = open("stxETH-XRP.json", "w")
        print >> f3, json.dumps(log_for_stxChart['eth-xrp'])
        f3.close()

    except Exception as e:
        print e


    threading.Timer(0, update_log_for_minChart).start()



# begin from here
prepare()
threading.Timer(0, update_log_for_minChart).start()
