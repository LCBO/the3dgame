# -*- coding=utf-8 -*-
"""
Author: xwsoul
Date: 2013-05-14
3DGames 全局收集
"""

import sys
reload(sys)
sys.setdefaultencoding('utf-8')
sys.path.append(".")
from noez.tools import *
from sites import Games3D

gs = Games3D()
gs.glob()
