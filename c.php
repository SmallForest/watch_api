<?php
/**
 * Created by PhpStorm.
 * User: smallForest<1032817724@qq.com>
 */

class c
{
    public function insert($arr)
    {
        try {
            // 连接数据库
            $dbh = new PDO('mysql:host=127.0.0.1;dbname=ceshi;port=8889', 'root', 'root');
            //预处理SQL ?为占位符
            $sth = $dbh->prepare('insert into api_access(ip,action,url,access_time,code) values(?,?,?,?,?)');
            //进行占位符顺序替换，并进行执行
            $sth->execute($arr);
            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function insert_times($time)
    {
        try {
            // 连接数据库
            $dbh = new PDO('mysql:host=127.0.0.1;dbname=ceshi;port=8889', 'root', 'root');
            //预处理SQL ?为占位符
            $sth = $dbh->prepare('select count(id) as times  from api_access where access_time=? and action=\'POST\'');
            //进行占位符顺序替换，并进行执行
            $sth->execute([$time]);
            $r = $sth->fetchAll();

            //插入语句
            $sth1 = $dbh->prepare('insert into api_access_time(time,times) values (?,?)');
            //执行语句
            $sth1->execute([$time,$r[0]['times']]);
            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    //
}
