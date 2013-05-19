# -*- coding=utf-8 -*-
"""
Author: xwsoul
Date: 2013-04-30
Didi 网站测试
"""

import sys
reload(sys)
sys.setdefaultencoding('utf-8')
sys.path.append(".")
from noez.tools import *
from sites import Didi

didi = Didi()
#didi.glob()
extra = json_decode('{"cover":"http://voxcast.didigames.com/images/'
                    + 'healthy-breakfast.jpg"}')
didi.download_game("http://www.didigames.com/healthy-breakfast.html", extra)
