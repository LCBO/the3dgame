# -*- coding=utf-8 -*-
"""
Author: xwsoul
Date: 2013-04-30
Didi 抓取
"""

import sys
reload(sys)
sys.setdefaultencoding('utf-8')
sys.path.append(".")
from noez.tools import *
from sites import Didi

gs = Didi()
gs.scrape()
