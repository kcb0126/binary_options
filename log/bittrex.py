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

url_marketsummury_btc_eth = url_apiV11 + "public/getmarketsummary?market=BTC-ETH"
url_marketsummury_btc_ltc = url_apiV11 + "public/getmarketsummary?market=BTC-LTC"
url_marketsummury_btc_neo = url_apiV11 + "public/getmarketsummary?market=BTC-NEO"
url_marketsummury_btc_xrp = url_apiV11 + "public/getmarketsummary?market=BTC-XRP"

# same reason as above
# url_marketsummury_eth_btc = url_apiV11 + "public/getmarketsummary?market=ETH-BTC"
url_marketsummury_eth_neo = url_apiV11 + "public/getmarketsummary?market=ETH-NEO"
url_marketsummury_eth_ltc = url_apiV11 + "public/getmarketsummary?market=ETH-LTC"
url_marketsummury_eth_xrp = url_apiV11 + "public/getmarketsummary?market=ETH-XRP"

url_market = url_apiV11 + "public/getmarkets"

# json data for last 30 minutes to draw 8 min charts
log_for_minChart = {}
log_for_market = {}


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


pastSec = -1


def update_log_for_minChart():
    global log_for_minChart, pastSec
    sec = datetime.datetime.now().second
    pastSec = pastSec != -1 and pastSec or sec

    try:
        response = requests.request("GET", url_marketsummury_btc_eth)
        data = response.json()
        value_btc_eth = data['result'][0]['Last']

        response = requests.request("GET", url_marketsummury_btc_ltc)
        data = response.json()
        value_btc_ltc = data['result'][0]['Last']

        response = requests.request("GET", url_marketsummury_btc_neo)
        data = response.json()
        value_btc_neo = data['result'][0]['Last']

        response = requests.request("GET", url_marketsummury_btc_xrp)
        data = response.json()
        value_btc_xrp = data['result'][0]['Last']

        # response = requests.request("GET", url_marketsummury_eth_btc)
        # data = response.json()
        # value_eth_btc = data['result'][0]['Last']
        value_eth_btc = 1.0 / value_btc_eth

        response = requests.request("GET", url_marketsummury_eth_ltc)
        data = response.json()
        value_eth_ltc = data['result'][0]['Last']

        response = requests.request("GET", url_marketsummury_eth_neo)
        data = response.json()
        value_eth_neo = data['result'][0]['Last']

        response = requests.request("GET", url_marketsummury_eth_xrp)
        data = response.json()
        value_eth_xrp = data['result'][0]['Last']

        print sec, pastSec

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

        log_for_market['btc-eth'] = value_btc_eth
        log_for_market['btc-ltc'] = value_btc_ltc
        log_for_market['btc-neo'] = value_btc_neo
        log_for_market['btc-xrp'] = value_btc_xrp

        log_for_market['eth-btc'] = value_eth_btc
        log_for_market['eth-ltc'] = value_eth_ltc
        log_for_market['eth-neo'] = value_eth_neo
        log_for_market['eth-xrp'] = value_eth_xrp

    except Exception as e:
        print e

    pastSec = sec

    f1 = open("last30minutes.json", "w")
    print >> f1, json.dumps(log_for_minChart)
    f1.close()

    f2 = open("markets.json", "w")
    print >> f2, json.dumps(log_for_market)
    f2.close()

    threading.Timer(0, update_log_for_minChart).start()



# begin from here
prepare()
threading.Timer(0, update_log_for_minChart).start()
