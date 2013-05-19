# -*- coding=utf-8 -*-
"""
Author: xwsoul
Date: 2013-04-30
Tools 网站测试
"""

import sys
reload(sys)
sys.setdefaultencoding('utf-8')
sys.path.append(".")
from noez.tools import *

print like_int("1")
print like_int("1.1")
print like_int("x")
