<?php
namespace Strategy;

//������
class FacultyClass
{/*{{{*/
    public $strategyName;
    public function __construct($strategyName)
    {
        $strategyClass = 'Strategy\\'.$strategyName.'Strategy';
        $this->strategyName = new $strategyClass; 
        return $this->strategyName;//�ⲿ���ղ�����������ǹ������Լ���ʵ��
    }

    public static function getStrategyInstance($strategyName)
    {
        static $ins;
        $strategyClass = 'Strategy\\'.$strategyName.'Strategy';
        //����ģʽ
        if(false == $ins instanceOf $strategyClass)
        {
            $ins = new $strategyClass;
        }

        return $ins;
    }
}/*}}}*/

//���Ի���
class BaseStrategyClass
{

}

//��������������
class BaseCooperationClass
{

}


//���Խӿ�
interface IStrategy
{
    public function testStrategy($argsOne, $argsTwo);
}
