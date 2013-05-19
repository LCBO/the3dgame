# -*- coding=utf-8 -*-
"""
Author: xwsoul
Date: 2012-12-27
数据库基类
"""

import ConfigParser
import MySQLdb
from tools import *


class DB(object):
    """数据库基类"""

    def __init__(self, config="main.ini", confSec="db"):
        """构造函数
        @param 配置文件名
        @param 配置字段名
        """
        conf = ConfigParser.ConfigParser()
        conf.read(config)
        host = conf.get(confSec, "db_host")
        user = conf.get(confSec, "db_user")
        passwd = conf.get(confSec, "db_pass")
        db = conf.get(confSec, "db_name")
        self.conn = MySQLdb.connect(host, user, passwd, db)
        self.c = self.conn.cursor()
        self.c.execute("SET NAMES utf8")

    def execute(self, sql, params=()):
        """执行SQL"""
        return self.c.execute(sql, params)

    def fetchone(self):
        """获取一条数据"""
        return self.c.fetchone()

    def fetchall(self):
        """获取全部数据"""
        return self.c.fetchall()

    def queryOne(self, sql, params=()):
        """获取单条数据"""
        return self._fetch(self.fetchone, sql, params)

    def queryAll(self, sql, params=()):
        """获取全部数据"""
        return self._fetch(self.fetchall, sql, params)

    def insertId(self):
        """刚插入的数据的ID"""
        return self.conn.insert_id()

    def _fetch(self, method, sql, params=()):
        """实际获取数据的操作"""
        try:
            self.execute(sql, params)
            return method()
        except Exception, e:
            log(str(e), 3)
            return ()

    def touch(self):
        """发送一次链接信号 避免 Gone away"""
        self.execute("SELECT 1")

directWarning('db', __name__)
