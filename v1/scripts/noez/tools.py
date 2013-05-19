# -*- coding=utf-8 -*-
"""
Author: xwsoul
Date: 2012-12-27
工具模块
"""

import os
import time
import re
import json
#from pwd import getpwnam
#from grp import getgrnam
import lxml.html as H
import sys
reload(sys)
sys.setdefaultencoding('utf-8')


def exists(path):
    """路径是否存在"""
    return os.path.exists(path)


def mkdir(path):
    """创建路径"""
    if not exists(path):
        os.makedirs(path)
        if not exists(path):
            return False
    return True


def chown(path, uname, gname):
    """修改路径所属权限"""
    uid = getpwnam(uname).pw_uid
    gid = getgrnam(gname).gr_gid
    os.chown(path, uid, gid)


def basename(path):
    """basename"""
    return os.path.basename(path)


def extname(p):
    """扩展名"""
    pl = p.split('.')
    return pl[len(pl) - 1]


def chdir(path):
    """chdir"""
    os.chdir(path)


def system(cmd):
    """system"""
    os.system(cmd)


def filesize(path):
    """filesize"""
    statinfo = os.stat(path)
    return statinfo.st_size


def file_exists(p):
    """文件是否存在"""
    return os.path.exists(p)


def unlink(p):
    """删除文件"""
    os.unlink(p)


def encode(string, replacer="_"):
    """将普通字符串转换成CODE数据
    @param string
    @return string"""
    #小写化
    string = string.lower().strip()
    #去除非空格,非字母数字
    string = re.sub(r"[^\w\s]", ' ', string)
    #转换多空格到'-'
    string = re.sub(r"\s+", replacer, string)
    string = string.strip(replacer)
    return string


def json_encode(o={}):
    """Encode Json"""
    return json.dumps(o, separators=(',', ':'))


def json_decode(s="{}"):
    """Decode Json String
    return object"""
    return json.loads(s)


def like_int(s):
    """字符串是否像数字"""
    if re.compile('^\d+$').match(s) is None:
        return False
    else:
        return True


def printf(format, *args):
    """printf for pythone"""
    sys.stdout.write(format % args)
    sys.stdout.flush()


def downcall(count, size, total_filesize):
    """count已下载数据块, size为数据块大小，total_filesize为文件总大小"""
    per = 100.0 * count * size / total_filesize
    if per > 100:
        per = 100
    printf("Downloading: %-25s| %3d%%\r", "#" * int(per / 4), per)


def wait(t=3, output=False):
    """等待时间"""
    for i in xrange(t):
        if output:
            print "Time left:", str(abs(i - t))
        time.sleep(1)


def directWarning(module, name, package="noez."):
    """直接调用警告"""
    if name == "__main__":
        log('Using `' + package + module + '` directly.', 2)


def log(content, level=0):
    """日志信息"""
    levelList = ['Info', 'Notice', 'Warning', 'Error']
    print '[{0}]{1}'.format(levelList[level], content)

directWarning('tools', __name__)
