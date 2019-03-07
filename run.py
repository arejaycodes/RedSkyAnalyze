#!/usr/bin/python
# 2019.03.07 @ arejay.codes

import json
import sys
import urllib
from urllib.request import urlopen
print(sys.argv[1])
search = urllib.parse.quote_plus(sys.argv[1])

url = "http://redsky.target.com/v1/plp/search" + \
      "?count=24"                              + \
      "&offset=0"                              + \
      "&keyword="+ search                      + \
      "&isDLP=false"                           + \
      "&sort_by=relevance"


response = urlopen(url)			           # load url as string
data     = response.read().decode("utf-8") # store properly encoded
result   = json.loads(data);               # load json structure

total = 4                                  # only 5 results
n = 0                                      
for x in result['search_response']['items']['Item']:
   try: print("%s" % (x['title'])) 
   except KeyError: pass
   try: print("cost: %s" % (x['list_price']['formatted_price']))
   except KeyError: pass
   try: print("dpci: %s" % (x['dpci']))
   except KeyError: pass
   try: print("upc : %s" % (x['upc']))
   except KeyError: pass
   try: print("tcin: %s" % (x['tcin']))
   except KeyError: pass
   print("")
   if n == total:                          # stop at total results
      break    
   else:                                   # or keep going until total reached
      n = n + 1
   
   
