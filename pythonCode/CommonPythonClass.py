#!/usr/bin/python
# -*- coding: UTF-8 -*-
 
class CommonPyClass:
#{#{{{
   '����Python�Ļ���'
   __secretCount = 0  # ˽�б���
   empCount = 0

    #���췽��
   #def __init__(self, runFuncName):
   #    self.runFuncName = runFuncName 

    #���к���--���
   def run(self):
       #self.testOne()
       #self.testSomeCode()
       self.testMysql()

    #01 ����1
   def testOne(self):
       print "hello world"
       print "����"

    #02 ����2
   def testSomeCode(self):
       strOne = 'hello'
       print strOne * 2 #�ظ�����ַ���

    #03 �������ݿ�
   def testMysql(self):
   #{#{{{
        import MySQLdb

        # �����ݿ�����
        db = MySQLdb.connect("localhost","user","passwd","database" )

        # ʹ��cursor()������ȡ�����α� 
        cursor = db.cursor()

        # ʹ��execute����ִ��SQL���
        cursor.execute("SELECT VERSION()")

        # ʹ�� fetchone() ������ȡһ������
        data = cursor.fetchone()

        print "Database version : %s " % data

        # �ر����ݿ�����
        db.close()

   #}#}}}

#}#}}}

test = CommonPyClass()
test.run()
