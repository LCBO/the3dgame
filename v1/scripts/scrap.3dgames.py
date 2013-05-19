# -*- coding=utf-8 -*-
"""
Author: xwsoul
Date: 2013-04-30
3DGames 抓取
"""

import sys
reload(sys)
sys.setdefaultencoding('utf-8')
sys.path.append(".")
from noez.tools import *
from sites import Games3D

gs = Games3D()
gs.scrape()
