#!/usr/bin/python
# 2019.03.07 @ arejay.codes
# fun with if statements

import json
import sys
import urllib
from urllib.request import urlopen

search = urllib.parse.quote_plus(sys.argv[1])


url = "http://redsky.target.com/v1/plp/search" + \
      "?count=24"                              + \
      "&offset=0"                              + \
      "&keyword="+ search                      + \
      "&sort_by=relevance"

response = urlopen(url)
data     = response.read().decode("utf-8")
result   = json.loads(data);

total = 4                                  # only 5 results
n = 0  

for x in result['search_response']['items']['Item']:
   if 'title' in x:
    print("%s" % (x['title']))
   if 'formatted_price' in x:
    print("cost: %s" % (x['list_price']['formatted_price']))
   if 'dpci' in x:
    print("dpci: %s" % (x['dpci']))
   if 'upc' in x:
    print("upc : %s" % (x['upc']))
   if 'tcin' in x:
    print("tcin: %s" % (x['tcin']))
   print("")
   if n == total:                          # stop at total results
      break    
   else:                                   # or keep going until total reached
      n = n + 1
   
 
print("results: {0}" .format(n))
