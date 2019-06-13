<?php
/**
 * Created by PhpStorm.
 * User: smallForest<1032817724@qq.com>
 */
//处理api_access 计算每天每秒钟的访问次数 类型POST




//计算6.11一天的
$start_time = '2019-06-11 00:00:00';
$start_time = strtotime($start_time);
include_once './c.php';
$obj = new c();
for ($i = 0;$i<86400;$i++){//这样太慢 使用swoole的process改一下多线程

    $str = date('Y-m-d H:i:s',$start_time+$i);
    echo $str.PHP_EOL;
    $obj->insert_times($str);
}
