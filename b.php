<?php
/**
 * Created by PhpStorm.
 * User: smallForest<1032817724@qq.com>
 */

class b
{
    protected $ip;//访问者IP
    protected $action;//访问者方式
    protected $url;//访问的URL
    protected $access_time;//访问时间
    protected $code;//返回码

    public function __construct()
    {
    }

    //获取格式化后的时间字符串
    protected function f_date($time_str)
    {
        $time_str = explode(' ', $time_str)[0];
        preg_match('/(.*)\/(.*)\/(.*):(.*):(.*):(.*)/u', $time_str, $res);

        $str = $res[1] . '-' . $res[2] . '-' . $res[3] . ' ' . $res[4] . ':' . $res[5] . ':' . $res[6];
        $str = date('Y-m-d H:i:s', strtotime($str));
        return $str;
    }

    public function f_string($s_line)
    {


        $p = '/^(\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3})\s-\s(.*)\s\[(.*)\]\s"(.*)\"\s(\d{3})\s(\d+)\s"(.*)"\s\"(.*)\"(.*)$/u';

        preg_match($p, $s_line, $a_match);
        $this->access_time = $this->f_date($a_match[3]);
        $tmp_arr           = explode(' ', $a_match[4]);
        $this->action      = $tmp_arr[0];
        $this->url         = $tmp_arr[1];
        $this->code        = $a_match[5];
        $this->ip          = $a_match[1];
        return [
            $this->ip,
            $this->action,
            $this->url,
            $this->access_time,
            $this->code
        ];
    }
}


