# -*- coding=utf-8 -*-
# @author : king
# @date : 2011.4.20
# animepaper.net 用户校验登陆类

# 载入核心库
import urllib
import urllib2
import cookielib
import ConfigParser

class User:

	"""构造函数"""
	def __init__(self):
		# 用户状态，校验是否登录
		self.login_status = False
		self.parse_config()
		pass

	# 载入配置
	def parse_config(self):
		conf = ConfigParser.ConfigParser()
		conf.read("config.ini")
		self.name = conf.get("login", "name")
		self.password = conf.get("login", "password")
		self.path = conf.get("login", "path")
		self.host = conf.get("login", "host")
		self.testLogin = conf.get("login", "testLogin")
		pass

	# 测试是否存在 cookie
	def check_login(self):
		if self.login_status==True:
			return True
		jar = cookielib.LWPCookieJar()
		try:
			jar.revert('animepaper.cookie')
		except Exception,e:
			print e
		opener=urllib2.build_opener(urllib2.HTTPCookieProcessor(jar))
		opener.addheaders = [('User-agent', 'Mozilla/5.0')]
		urllib2.install_opener(opener)
		reqest = urllib2.urlopen(self.testLogin)
		if reqest.geturl().find('login'):
			print 'start login'
			return self.parse_login()
		return True

	# 无cookie，模拟登陆
	def parse_login(self):
		jar = cookielib.LWPCookieJar()
		opener=urllib2.build_opener(urllib2.HTTPCookieProcessor(jar))
		opener.addheaders = [('User-agent', 'Mozilla/5.0')]
		urllib2.install_opener(opener)

		# 模拟数据
		data = {'loginusername':self.name,'loginpassword':self.password}
		headers={'Host': self.host,'Content-Type': 'application/x-www-form-urlencoded'}
		request = urllib2.Request(self.path, urllib.urlencode(data),headers)
		operate = urllib2.urlopen(request)
		print operate.geturl()
		if operate.geturl().find('my')!=-1:
			self.login_status = True
			print 'login Success!'
			jar.save("animepaper.cookie")
		else:
			print 'login Error'
		return self.login_status