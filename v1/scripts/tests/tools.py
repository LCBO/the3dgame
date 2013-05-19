# -*- coding=utf-8 -*-
"""
Author: xwsoul
Date: 2013-04-30
3DGames 网站测试
"""

import time
import sys
reload(sys)
sys.setdefaultencoding('utf-8')
sys.path.append(".")
from noez.tools import *

for x in xrange(1, 101):
    printf("Downloading: %-40s %3d%%\r", "", x)
    time.sleep(0.01)

print ""
