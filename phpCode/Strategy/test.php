<?php
//���Խű�
include_once("init.php");
use \Strategy\FacultyClass;


//1.��������Ψһ��ڣ����췽�����ص������Լ�ʵ��
$res = (new FacultyClass('XXX'))->strategyName->testStrategy('Hello', 'World');//echo Hello World

//2.�ߵ���ģʽ
//$res = FacultyClass::getStrategyInstance('XXX')->testStrategy('Hello', 'World');//echo Hello World

//3.ֱ�ӷ��� XXXStrategy ����,������ Class 'Strategy\BaseStrategyClass' not found 
//$res = new XXXStrategy();
