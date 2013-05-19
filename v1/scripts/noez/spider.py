# -*- coding=utf-8 -*-
"""
Author: xwsoul
Date: 2011-01-15
通过XPath解析页面,抓取数据的蜘蛛基类
"""

import urllib
import urllib2
import lxml.html as H
from tools import *


class NSpider(object):

    def __init__(self):
        self.site_url = ""
        pass

    def url2string(self, url):
        """获取url的内容转换为string"""
        try:
            return urllib2.urlopen(url).read()
        except Exception, e:
            log("Download String: {0}".format(url))

    def url2dom(self, url):
        """通过URL读取HTML并解析为DOM"""
        try:
            return H.fromstring(self.url2string(url))
        except Exception, e:
            log("Parse url: {0}".format(url))

    def string2dom(self, string):
        """将字符串转换为Dom"""
        try:
            return H.fromstring(string)
        except Exception, e:
            log("Parse string: {0}".format(url))

    def file2dom(self, filename):
        """通过文件读取HTML并解析为DOM"""
        html = open(filename, 'r').read()
        return H.fromstring(html)

    def dom2string(self, dom):
        """将 DOM 还原为 HTML"""
        return H.tostring(dom)

    def download(self, url, path, headers={}, data={}, progress=False):
        """从远程服务器下载文件"""
        boolean = True
        try:
            if not progress:
                remote = urllib2.urlopen(url)
                f = open(path, 'wb+')
                f.write(remote.read())
                f.close()
            else:
                urllib.urlretrieve(url, path, downcall)
                print ""
        except Exception, e:
            log('download {0}'.format(str(e)))
            boolean = False
        return boolean

    def get_full_url(self, url):
        """获取完整路径"""
        if not self.site_url:
            raise ValueError("Invalid domain.")
        if url.find("http://") == -1 and url.find("https://") == -1:
            site_url = self.site_url.strip('/')
            if url.find('/') != 0:
                site_url += '/'
            url = site_url + url
        return url

    def get_elements(self, html, rule):
        """ 获取页面节点信息"""
        dom = self.string2dom(html)
        if dom is not None:
            return dom.xpath(rule)

    def items(self, url, rule):
        """获取所有条目"""
        dom = self.url2dom(url)
        if dom is not None:
            return dom.xpath(rule)

    def item(self, url, rule):
        """获取一个条目"""
        dom = self.url2dom(url)
        if dom is not None:
            elements = dom.xpath(rule)
            if len(elements) > 0:
                return elements[0]

directWarning('spider', __name__)
