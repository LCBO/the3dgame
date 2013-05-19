# -*- coding=utf-8 -*-
"""
Author: xwsoul
Date: 2013-04-30
漫画采集对象
"""

import re
import ConfigParser
import uuid
from noez.tools import *
from noez.spider import NSpider
from db import *


class NSite(NSpider):
    """采集基类"""

    def __init__(self):
        super(NSite, self).__init__()
        #MH DB
        self.db = GameDB()
        #Store Config
        conf = ConfigParser.ConfigParser()
        conf.read("main.ini")
        self.conf = conf
        #other setting
        self._setting()
        self.pages = []

    def _setting(self):
        pass

    def scrape(self, overwrite=False):
        """采集漫画"""
        sql = ("SELECT l.id, l.site, l.url, l.extra FROM clone_log l"
               + " WHERE l.status = 0 AND l.site = %s"
               + " ORDER BY l.id"
               + " LIMIT 10;")
        rs = self.db.queryAll(sql, (self.idtag))
        if len(rs) > 0:
            #避免重复
            ids = []
            for r in rs:
                ids.append(str(r[0]))
            idStr = ", ".join(ids)
            sql = "UPDATE clone_log SET status = 9 WHERE id IN(%s)" % idStr
            self.db.execute(sql)
            for r in rs:
                lid = r[0]
                site = r[1]
                url = r[2]
                extra = json_decode(r[3])
                if self.download_game(url, extra):
                    self.db.finish_log(lid)
                    log("Imported.")
                #缓抓两秒
                time.sleep(2)

    def do_download(self, gid, code, game, extra):
        """下载封面和游戏"""
        down_ok = True
        data = {}
        game_path = self.conf.get('store', 'game_path')
        imgName = code + "." + extname(extra["cover"])
        gameName = code + "." + extname(game)
        try:
            #下载封面
            log("Download cover: " + extra["cover"])
            self.download(extra["cover"], game_path + imgName)
            #下载游戏
            log("Download game: " + game)
            self.download(game, game_path + gameName)
            data = {"url": '{SITE_CDN}' + gameName,
                    "image": '{SITE_CDN}' + imgName}
        except Exception, e:
            log(str(e), 3)
            self.db.delete_inactive_game(gid, code)
            if(file_exists(game_path + imgName)):
                unlink(game_path + imgName)
            if(file_exists(game_path + gameName)):
                unlink(game_path + gameName)
            down_ok = False
        return down_ok, data


class GirlGame(NSite):
    """女孩游戏网站"""
    pass


class Didi(GirlGame):
    """didgames.com 采集"""

    def _setting(self):
        """设置属性"""
        self.idtag = "didi"
        self.site_url = "http://www.didigames.com"

    def glob(self):
        """获取所有漫画"""
        cates = self.get_category_pages()
        links = []
        for cate in cates:
            self.pages = []
            self.collect_pages_by_category(cate["url"], cate["text"])

    def get_category_pages(self):
        url = self.get_full_url("/")
        rule = '//div[@id="leme"]/div[1]/div/ul[@class="me"]/li/a'
        elements = self.items(url, rule)
        cateLinks = []
        if elements:
            for e in elements:
                element = {"url": e.get("href"),
                           "text": e.text_content()}
                cateLinks.append(element)
        return cateLinks

    def collect_pages_by_category(self, url, name):
        url = self.get_full_url(url)
        if url not in self.pages:
            log("Get " + name + " Games in: " + url)
            self.pages.append(url)
            dom = self.url2dom(url)
            wait(3, True)
            # 解析游戏元素
            gameRule = '//div[@id="bo"]/div/div[1]/div[@class="box"]/a'
            games = dom.xpath(gameRule)
            if games:
                for g in games:
                    cover = g.xpath("img")[0].get("src")
                    url = g.get("href")
                    if not self.db.is_logged(self.idtag, url):
                        self.db.save_log(self.idtag, url, {'cover': cover})
                        log("url saved.")
                    else:
                        log("url exists.")
            # 解析更多页面
            pageRule = '//div[@class="pag"]/table/tr/td/a'
            elements = dom.xpath(pageRule)
            if elements:
                for e in elements:
                    pTxt = e.text_content()
                    if like_int(pTxt):
                        self.collect_pages_by_category(e.get("href"), name)

    def download_game(self, url, extra):
        """下载游戏"""
        r = False
        dom = self.url2dom(url)
        if dom is not None:
            #名称
            eName = dom.xpath('//h1')
            name = eName[0].text
            gid, code = self.db.insert_game(name, 'Default')
            #tags
            tags = []
            eTags = dom.xpath('//h2[@class="ptitle"]/a[@class="tag"]')
            for eTag in eTags:
                if eTag.text:
                    tags.append(eTag.text.strip())
            cats = tags
            #游戏路径
            eGame = dom.xpath('//div[@id="ga"]/noscript/object/embed')
            if len(eGame) > 0:
                game = eGame[0].get('src')
                down_ok, data = self.do_download(gid, code, game, extra)
                if down_ok and self.db.active_game(gid, data, cats):
                    r = True
            else:
                self.db.delete_inactive_game(gid, code)
                log("Parse Game: %s" % url, 3)
        return r


class Game3D(NSite):
    """3D游戏网站"""
    pass


class Games3D(Game3D):
    """3dgames.org 采集"""

    def _setting(self):
        """设置属性"""
        self.idtag = "3dgames"
        self.site_url = "http://www.3dgames.org"

    def glob(self):
        """获取所有漫画"""
        self.collect_pages('/')

    def collect_pages(self, url):
        """通过链接手机页面链接"""
        url = self.get_full_url(url)
        if url not in self.pages:
            log("Get Games in: " + url)
            self.pages.append(url)
            dom = self.url2dom(url)
            wait(3, True)
            # 解析游戏元素
            gameRule = '//center/div[4]/ul/li/a'
            games = dom.xpath(gameRule)
            if games:
                for g in games:
                    cover = g.xpath("img")[0].get("src")
                    url = g.get("href")
                    if not self.db.is_logged(self.idtag, url):
                        self.db.save_log(self.idtag, url, {'cover': cover})
                        log("url saved.")
                    else:
                        log("url exists.")
            # 解析更多页面
            pageRule = '//div[@id="page"]/a'
            elements = dom.xpath(pageRule)
            if elements:
                for e in elements:
                    pTxt = e.text_content()
                    if like_int(pTxt):
                        self.collect_pages(e.get("href"))

    def download_game(self, url, extra):
        print url
        """下载游戏"""
        r = False
        dom = self.url2dom(url)
        if dom is not None:
            #名称
            eName = dom.xpath('//h1')
            name = eName[0].text
            #分类/标签
            cats = []
            eCats = dom.xpath('//center/div[1]/div[2]/div[1]/div[3]/div/a')
            for eCat in eCats:
                if eCat.text:
                    cats.append(self.getCatname(eCat.text))
            cate = 'Default'
            if len(cats) > 0:
                cate = cats[0]
            gid, code = self.db.insert_game(name, cate)
            #游戏路径
            eGame = dom.xpath('//object[@id="3d_games"]/embed')
            if len(eGame) > 0:
                game = eGame[0].get('src')
                down_ok, data = self.do_download(gid, code, game, extra)
                if down_ok and self.db.active_game(gid, data, cats):
                    r = True
            else:
                self.db.delete_inactive_game(gid, code)
                log("Parse Game: %s" % url, 3)
        return r

    def getCatname(self, s):
        """获取分类名"""
        return s.replace('3D', '').replace('Games', '').strip()


directWarning('sites', __name__, '')
