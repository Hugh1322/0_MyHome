<?php
namespace Strategy;


//XXXStrategy ���������
class XXXStrategy extends BaseStrategyClass implements IStrategy
{/*{{{*/
    public $cooperation;

    public function __construct()
    {
        $this->cooperation = new XXXCooperation();
    }

    //ʵ�ֲ���
    public function testStrategy($argsOne, $argsTwo)
    {
        echo $argsOne." ".$argsTwo;
    }
}/*}}}*/

