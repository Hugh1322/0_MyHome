#!/usr/bin/python
# -*- coding: UTF-8 -*-
 
class CommonPythonClass:
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

       #03 �������ݿ�
       self.testMysql()

       #04 ����import�����
       #self.testImport()

       #05 ����python�Դ���web������
       #self.testPythonOwnWeb()

       #06 ����GUI
       #self.testGUI()

    #01 ����1
   def testOne(self):
       #���� python 3.x
       print("hello world")

    #02 ����2
   def testSomeCode(self):
       strOne = 'hello'
       print strOne * 2 #�ظ�����ַ���

    #03 �������ݿ�
   def testMysql(self):
   #{#{{{
        #Ҫ��֤MySQL-Python�Ѿ���װ��mac�°�װ��http://blog.csdn.net/u013107656/article/details/52245144
        #Linux�°�װ�����ذ�װ����http://blog.csdn.net/wklken/article/details/7271019
       import MySQLdb

       # �����ݿ�����
       db = MySQLdb.connect("localhost","root","111","test_avatar" )

       # ʹ��cursor()������ȡ�����α� 
       cursor = db.cursor()

       # ʹ��execute����ִ��SQL���
       #cursor.execute("SELECT VERSION()")
       cursor.execute("select * from room limit 1")

       # ʹ�� fetchone() ������ȡһ������
       data = cursor.fetchone()

       #print "Database version : %s " % data
       print  data

       # �ر����ݿ�����
       db.close()

   #}#}}}

   #04 ����import
   def testImport(self):
   #{#{{{

        #�����Զ���ģ�飺 http://blog.csdn.net/pwc1996/article/details/52577148
        #import sys
        #sys.path.append("your_path")
        import demo
        "���� Employee ��ĵ�һ������"
        emp1 = demo.Employee("Zara", 2000)
        emp1.displayEmployee()
        print "Total Employee %d" % demo.Employee.empCount

   #}#}}}

   #05 ����python�Դ���web������
   def testPythonOwnWeb(self):
   #{#{{{
        #���õ�  http://blog.csdn.net/tanghaiyu777/article/details/74315752
        #TODO
        print ('test Web');
   #}#}}}

   #06 ����python GUI -- ��֤�Լ��Ļ�������GUI,����mac windows��linux������������û��GUI,���Կ�����Ч��
   def testGUI(self):
   #{#{{{
        from Tkinter import *           # ���� Tkinter ��
        root = Tk()                     # �������ڶ���ı���ɫ
                                        # ���������б�
        li     = ['C','python','php','html','SQL','java']
        movie  = ['CSS','jQuery','Bootstrap']
        listb  = Listbox(root)          #  ���������б����
        listb2 = Listbox(root)
        for item in li:                 # ��һ��С������������
            listb.insert(0,item)

        for item in movie:              # �ڶ���С������������
            listb2.insert(0,item)

        listb.pack()                    # ��С�������õ���������
        listb2.pack()
        root.mainloop()                 # ������Ϣѭ��
   #}#}}}
#}#}}}

test = CommonPythonClass()
test.run()
