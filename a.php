<?php
/**
 * Created by PhpStorm.
 * User: smallForest<1032817724@qq.com>
 */


include_once './b.php';
include_once './c.php';

//打开文件按行读取
/**
 * 按行读取文件
 * @param string $filename
 */
function readFileByLine($filename)
{
    $obj  = new b();
    $obj2 = new c();
    $fh   = fopen($filename, 'r');

    while (!feof($fh)) {
        //获取每行数据
        $line = fgets($fh);
        //获取处理后的数据
        $arr = $obj->f_string($line);
        if ($arr[0] != '127.0.0.1') {//本地回环地址不处理
            //插入数据
            $obj2->insert($arr);
        }
        unset($arr);
        unset($line);

    }

    fclose($fh);
}


$filename = "./access.log";

readFileByLine($filename);
