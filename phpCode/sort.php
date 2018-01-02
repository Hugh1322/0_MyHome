<?php

//��ʼ
run();

function run()
{
    $array = array(31, 54, 6, 8, 3, 100, 23, 38);
    //01 ð������
    #$array = bubbleSort($array);
    
    //02 ��������
    #$array = insertSort($array);

    //03 ѡ������
    #$array = selectSort($array);

    //04 ϣ������
    #$array = shellSort($array);

    //05 ������
    #$array = heapSort($array);

    //06 �鲢����
    $array = mergeSort($array);
    var_dump(1111,$array);exit;
}

//01 ð������
function bubbleSort($array)
{/*{{{*/
    /**01 ð������ ˵�������ǵ�һ��λ���ϵ����������ڵڶ���λ���ϵ����Ƚϣ�����������ڵ���С�������߽���λ�ã����򲻽��������ŵ�һ��λ���ϵ����������λ���ϵ����Ƚϴ�С��Ҳ��С�򽻻���һֱ�������һ��λ�õ����ȽϽ�����ϡ�Ȼ������һ��ѭ�������ǵڶ���λ���ϵ����ظ�����ıȽϽ���������ֱ�����������б����һ����С������������С�
     *  
     */
    $count = count($array);
    for($i=0; $i<$count; $i++)
    {
        for($j=$i+1; $j<$count; $j++)
        {
            if($array[$i] > $array[$j])
            {
                $res = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $res;
            }
        }
    }
    return $array;
}/*}}}*/

//02 ��������
function insertSort($array)
{/*{{{*/
    /**02 �������� ˵������һ�Ѵ������������ѡ����һ����Сֵ(������Ϊ��һ�������������������)��Ȼ���ʣ��Ĵ������������ѡ������Сֵ����ŵ�������������У����β�����ֱ���������ж���һ����С�������������Ϊֹ
     *  
     */
    $count = count($array);
    for($i=1; $i< $count; $i++)
    {
        $min = $i;
        //�ó��������е���Сֵ
        for($j = $i + 1; $j < $count; $j++)
        {
            if($array[$min] > $array[$j])
            {
                $min = $j;
            }
        }
        //������������ֱ�Ӹ�ֵ������������ݶ�ʧ
        swap($array[$i], $array[$min]);

        //�ó���ֵ���뵽�������������
        for($k=$i-1; $k>=0; $k--)
        {
            if($array[$i] < $array[$k])
            {
                swap($array[$i], $array[$k]);
            }else{
                break;
            }

        }
    }
    return $array;
}/*}}}*/


//03 ѡ������
function selectSort($array)
{/*{{{*/
    /**03 ѡ������ ˵������һ�Ѵ������������ѡ����һ����Сֵ���ŵ��µ�����ĵ�һ��λ�ã�������ʣ���������ѡȡ��Сֵ���뵽�����У��ظ�����Ĳ��裬�����ֶ�ȡ�����ų��µ���������
     *  
     */
    $count = count($array);
    $newArr = array();
    for($i=0; $i< $count; $i++)
    {
        $min = selectSortChild($array);
        $newArr[$i] = $array[$min];
        unset($array[$min]);
        $array = array_merge($array, array());
    }
    return $newArr;
}/*}}}*/

//03.1 ѡ�������Ӻ���
function selectSortChild($array)
{/*{{{*/
    $count = count($array);
    $min = 0;
    //�ó��������е���Сֵ
    for($j = 1; $j < $count; $j++)
    {
        if($array[$min] > $array[$j])
        {
            $min = $j;
        }
    }
    return $min;
}/*}}}*/

//04 ϣ������
function shellSort($array)
{/*{{{*/
    /**04 ϣ������ ˵�������������һ�ָĽ����ȱȽ�һ�������Ԫ�س�Ϊ�������У��ٱȽ���С���������Ԫ��(��ΪԪ�ص�������һ��)��һֱ���Ƚϵ�������Ԫ�ص�ʱ�򣬾ͳ�Ϊ�˲�������
     *  
     */
    //����ѭ��
    for($loop = floor(count($array)); $loop > 0; $loop = floor($loop/2))
    {
        for($i=$loop; $i<count($array); $i++)
        {
            for($j=$i-$loop; $j>=0 && $array[$j] > $array[$j+$loop]; $j = $j-$loop)
            {
               swap($array[$j], $array[$j+$loop]); 
            }
        }
    }
    return $array;

}/*}}}*/

//05 ������
function heapSort($array)
{/*{{{*/
    /**05 ������ ˵����1) ����󶥶� 2�������Ѷ��Ͷѵ� 3)�ظ�ǰ��Ĳ�������������� 
     * https://www.cnblogs.com/chengxiao/p/6129630.html
     *  
     */
    $count = count($array);
    //1. ����󶥶�
    for($i=floor($count/2) - 1; $i>=0; $i--)
    {
        adjustHeap($array, $i, $count);
    }

    //2. ����
    for($j=$count-1; $j>=0; $j--)
    {
        swap($array[0], $array[$j]);
        adjustHeap($array, 0, $j);
    }

    return $array;

}/*}}}*/

//05.1 �������Ӻ���
function adjustHeap(&$array, $i, $length)
{/*{{{*/
    if($i<0)
        return false;
    $tmp = $array[$i];
    for($j=$i*2+1; $j<$length; $j=$j*2+1)
    {
        if($j+1< $length && $array[$j] < $array[$j+1])//���ӽڵ�����ӽڵ����jָ�����ӽڵ�
            $j++;

        if($array[$j] > $tmp)//�ӽڵ�ȸ��ڵ�����ӽڵ��ֵ�������ڵ�(���ý���)
        {
            $array[$i] = $array[$j];
            $i = $j;
        }
        else
        {
            break;
        }

    }
    $array[$i] = $tmp;//ʵ�ֽ���(i�б仯ʱ)

}/*}}}*/

//06 �鲢����
function mergeSort($array)
{/*{{{*/
    /**06 �鲢���� ˵�������ǽ�����������п����ǵ�������������У�Ȼ����кϲ���ֱ���ϲ��������������������
     *  
     */
    //1.���й鲢
    $length = count($array);
    for($gap = 1; $gap<$length; $gap = $gap*2)
    {
        mergePass($array, $gap, $length);
    }
    return $array;

}/*}}}*/

//06.1 �鲢�����Ӻ���1--�ϲ�
function mergePass(&$array, $gap, $length)
{/*{{{*/
    //1. �鲢������gap�����������ӱ�
    for($i=0; $i+2*$gap-1<$length; $i=$i+2*$gap)
    {
        merge($array, $i, $i+$gap-1, $i+2*$gap-1);
    }

    //2. ���µ������ֱ�ϲ������ߵĳ���С��gap
    if($i+$gap-1 < $length)
    {
        merge($array, $i, $i+$gap-1, $length-1);
    }
}/*}}}*/

//06.02 �鲢�����Ӻ���2--�ϲ�������������
function merge(&$array, $low, $mid, $high)
{/*{{{*/
    $i = $low;//��һ�����е��±�
    $j = $mid + 1;//�ڶ������е��±�
    $k = 0;
    $arrayNew = array();//�µ���ʱ�ϲ�����

    //ɨ���һ�����к͵ڶ������У�ֱ����һ������ɨ�����
    while($i<=$mid && $j<=$high)
    {
        //�Ƚ������ϲ������飬С�ķŵ��µ���ʱ�ϲ�������
        if($array[$i] > $array[$j])
        {
            $arrayNew[$k] = $array[$j];
            $k++;
            $j++;
        }else{
            $arrayNew[$k] = $array[$i];
            $k++;
            $i++;
        }
    }

    //����1����ûɨ���Ԫ�أ�ֱ�Ӹ��Ƶ���������
    while($i <= $mid)
    {
        $arrayNew[$k] = $array[$i];
        $k++;
        $i++;
    }

    //����2����ûɨ���Ԫ�أ�ֱ�Ӹ��Ƶ���������
    while($j <= $high)
    {
        $arrayNew[$k] = $array[$j];
        $k++;
        $j++;
    }

    //���ϲ������鸴�Ƶ�ԭ������
    for($i=$low,$k=0; $i<=$high; $i++,$k++)
    {
        $array[$i] = $arrayNew[$k];
    }
}/*}}}*/

//��������
function swap(&$a, &$b)
{/*{{{*/
    $res = $a;
    $a = $b;
    $b = $res;
}/*}}}*/
