<?php


$url = "http://www.igaoyin.com/weixin/v3/ord/add";
//$url ="http://120.27.221.108/test/index.php/Activity/Fmmarket/ee";

$post_data =array('phone' => 13587015766,
    'qq'=>87859521111,
    'name'=>'测试');


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// post数据
curl_setopt($ch, CURLOPT_POST, 1);
// post的变量
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
$output = curl_exec($ch);
curl_close($ch);
//打印获得的数据
print_r($output);
?>