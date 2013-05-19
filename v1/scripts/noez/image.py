# -*- coding=utf-8 -*-
# @author : king
# @date : 2011.4.9
# animepaper.net 图片分辨率生成

import os
import time
import ConfigParser
from PIL import Image
from tools import *


class NImage:

    def __init__(self, path, filename):
        """构建函数"""
        self.filename = filename
        self.filepath = path
        self.im = Image.open(path + filename)
        self.im = self.im.convert('RGB')

    def thumbnail(self, path, size):
        """缩放图片并保存"""
        im = self.im.thumbnail(size, Image.ANTIALIAS)
        create_dir(path)
        return im.save(path + self.filename, quality=100)

    def resize(self, path, size):
        """强制缩放图片"""
        im = self.im.resize(size, Image.ANTIALIAS)
        create_dir(path)
        return im.save(path + self.filename, quality=100)

    def crop(self, path, size):
        """智能裁剪图片 先裁剪再thumbnail"""
        w, h = size
        o_w, o_h = self.im.size
        if o_w * h > o_h * w:
            n_w = o_h * w / h
            offset = (o_w - n_w) / 2
            box = offset, 0, o_w - offset, o_h
        else:
            n_h = o_w * h / w
            offset = (o_h - n_h) / 2
            box = 0, offset, o_w, o_h - offset
        im = self.im.crop(box)
        im.thumbnail(size, Image.ANTIALIAS)
        create_dir(path)
        return im.save(path + self.filename, quality=100)

    def gcd(self, a, b):
        """求最大公约数"""
        if a < b:
            a, b = b, a
        while b != 0:
            a, b = b, a % b
        return a

directWarning('image', __name__)
