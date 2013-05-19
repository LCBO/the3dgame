# -*- coding=utf-8 -*-
"""
Author: xwsoul
Date: 2013-04-30
3DGames 网站测试
"""

import sys
reload(sys)
sys.setdefaultencoding('utf-8')
sys.path.append(".")
from noez.tools import *
from sites import Games3D

g3d = Games3D()
#g3d.glob()
extra = json_decode('{"cover":"http://www.3dgames.org/images/'
                    + 'urban-basketball.jpg"}')
g3d.download_game("http://www.3dgames.org/games.asp?id=648", extra)
