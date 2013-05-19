# -*- coding=utf-8 -*-
"""
Author: xwsoul
Date: 2011-01-15
线程程序
"""

from Queue import Queue
from threading import Thread
from tools import *


class NThread(Thread):
    """Get from queue"""

    def __init__(self, queue, func, threadNo):
        Thread.__init__(self, name='Thread-' + str(threadNo))
        self.queue = queue
        self.func = func

    def run(self):
        while True:
            data = self.queue.get()
            log('Get "{0}" from MyThread ({1}).'.format(data, self.getName()))
            try:
                self.func(data)
            except Exception as e:
                log('Parse thread ({0}): {1} By {2}.'.format(
                    data, e, self.getName()), 2)
            self.queue.task_done()


def process_queue(list, func):
    """处理队列 3线程"""
    queue = Queue()
    for thread in range(1):
        t = MyThread(queue, func, thread)
        t.setDaemon(True)
        t.start()
    for i in list:
        queue.put(i)
    queue.join()

directWarning('thread', __name__)
