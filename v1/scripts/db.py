# -*- coding=utf-8 -*-
"""
Author: xwsoul
Date: 2013-04-30
游戏站数据库操作
"""

import time
from noez.tools import *
from noez.db import DB


class GameDB(DB):
    """游戏数据库"""

    def insert_game(self, name, category_name):
        """插入游戏数据, 使用先插入后激活的方式是为了避免seo_url被占用"""
        sql = ("INSERT INTO `ava_games`"
               + " (`name`, `description`, `url`, `category_id`, `image`,"
               + " `instructions`, `rating`, `featured`, `date_added`,"
               + " `seo_url`)"
               + " VALUES(%s, '', '', %s, '', '', 0.0, 0, NOW(), %s);")
        cid = self.get_category_id(category_name)
        code = self.get_code(name)
        self.execute(sql, (name, cid, code))
        gid = self.insertId()
        #TODO 管理 ava_seonames
        sql = ("INSERT INTO `ava_seonames` (`seo_name`, `type`, `uses`)"
               + " VALUES(%s, 'game', 1);")
        self.execute(sql, code)
        return gid, code

    def delete_inactive_game(self, gid, code):
        """删除未激活的游戏"""
        sql = "DELETE FROM `ava_games` WHERE id = %s;"
        self.execute(sql, (gid))
        sql = "DELETE FROM `ava_seonames` WHERE `seo_name`=%s AND type='game';"
        self.execute(sql, (code))

    def get_category_id(self, name):
        """获取分类ID, 获取不到则新建"""
        sql = "SELECT id FROM `ava_cats` WHERE `name` = %s"
        rs = self.queryOne(sql, name)
        if not rs:
            sql = ("INSERT INTO `ava_cats`"
                   + " (`name`, `cat_order`, `seo_url`, `parent_id`)"
                   + " VALUES(%s, 2.0, %s, 0)")
            self.execute(sql, (name, encode(name)))
            cid = self.insertId()
        else:
            cid = rs[0]
        return cid

    def active_game(self, gid, data={}, tags=[]):
        """激活游戏数据, 存入游戏,封面等等"""
        self.save_tags(gid, tags)
        sql = ("UPDATE `ava_games` SET url=%s, image=%s, published=1"
               + " WHERE id = %s;")
        return self.execute(sql, (data["url"], data["image"], gid))

    def save_tags(self, gid, tags):
        """存储游戏的tag"""
        sql = "SELECT id FROM ava_tags WHERE tag_name = %s"
        sqli = ("INSERT INTO `ava_tags`"
                + " (tag_name, seo_url) VALUES (%s, %s);")
        sqlr = ("INSERT INTO `ava_tag_relations`"
                + " (`game_id`, `tag_id`) VALUES (%s, %s);")
        if len(tags) > 0:
            for tag in tags:
                rs = self.queryOne(sql, tag)
                if not rs:
                    self.execute(sqli, (tag, encode(tag)))
                    tid = self.insertId()
                else:
                    tid = rs[0]
                self.execute(sqlr, (gid, tid))

    def get_code(self, name):
        rcode = code = encode(name)
        i = 2
        while self.is_code_exists(rcode):
            rcode = code + "_v" + str(i)
            i += 1
        return rcode

    def is_code_exists(self, code):
        sql = "SELECT id FROM `ava_games` WHERE `seo_url` = %s"
        return self.queryOne(sql, (code)) is not None

    def save_log(self, site, url, extra={}):
        """保存log"""
        data = json_encode(extra)
        sql = ("INSERT INTO `clone_log`"
               + " (`site` , `url`, `extra`, `entry_time`, `status`)"
               + " VALUES(%s, %s, %s, %s, 0);")
        return self.execute(sql, (site, url, data, time.time()))

    def is_logged(self, site, url):
        """是否记录过"""
        sql = ("SELECT id FROM `clone_log` WHERE site = %s AND url = %s;")
        return self.queryOne(sql, (site, url)) is not None

    def update_log(self, lid, status):
        """更新log状态"""
        sql = "UPDATE clone_log SET status = %s WHERE id = %s"
        return self.execute(sql, (status, lid))

    def finish_log(self, lid):
        """完结log"""
        return self.update_log(lid, 1)

directWarning('db', __name__, '')
