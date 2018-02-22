<?php

/**
 * 以json方式格式化输出
 * @param int $status 状态：0-失败，1-成功
 * @param int $msg 返回状态码
 * @param string/array $data 数据
 * @param string $text 提示文字
 * @return string
 */
function my_jsonReturn($status=0, $code=0, $data='', $msg='',$type = 1){
    $json_arr = array('status'=>$status,'code'=>$code);
    if(!empty($msg)){
        $json_arr['msg'] = $msg;
    }
    if(!empty($data)){
        $json_arr['data'] = $data;
    }
    header('Content-Type:application/json; charset=utf-8');
    if ($type == 1) {
        exit(json_encode($json_arr));
    } else if ($type == 2) {
        return json_encode($json_arr);
    }

}

/**
 * @param $status 检查特效status是否为on 将其改为1或者0
 * @return int
 */
function checkOn($status){
    if ($status == 'on'){
        $status = 1;
    }else{
        $status = 0;
    }
    return $status;
}

/**删除图片
 *
 * @param $path 图片路径
 */
function delPic($path){
    if (is_array($path)){
        foreach ($path as $v){
            @unlink("./PUBLIC".$v);
        }
    }else{
        @unlink("./PUBLIC".$path);
    }
}

//排列组合
function getArrSet($arrs,$_current_index=-1)
{
    static $_total_arr;
    static $_total_arr_index;
    static $_total_count;
    static $_temp_arr;
    if($_current_index<0){
        $_total_arr=array();
        $_total_arr_index=0;
        $_temp_arr=array();
        $_total_count=count($arrs)-1;
        getArrSet($arrs,0);
    }else{
        foreach($arrs[$_current_index] as $v){
            if($_current_index<$_total_count){
                $_temp_arr[$_current_index]=$v;
                getArrSet($arrs,$_current_index+1);
            }elseif ($_current_index==$_total_count){
                $_temp_arr[$_current_index]=$v;
                $_total_arr[$_total_arr_index]=$_temp_arr;
                $_total_arr_index++;
            }
        }
    }
    return $_total_arr;
}


//取出所有反引号
function delete_fxg(&$array) {
    while(list($k,$v) = each($array)) {
        if (is_string($v)) {
            $array[$k] = stripslashes($v);//去掉反斜杠字符
        }
        if (is_array($v))  {
            $array[$k] = delete_fxg($v);//调用本身，递归作用
        }
    }
    return $array;
}


/**
 * @param $url  请求的地址
 * @return mixed    请求后获取的数据
 */
function curl_get($url){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_HEADER,0);
    $response = curl_exec($ch);
    if ($response === false){
        return curl_error($ch);
    }
    curl_close($ch);
    return $response;
}

/**
 * @param $url 请求网址
 * @param $data 携带的数据
 * @return mixed|string  返回数据
 */
function curl_post($url,$data){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    curl_setopt($ch,CURLOPT_HEADER,0);
    $response = curl_exec($ch);
    if ($response === false){
        return curl_error($ch);
    }
    curl_close($ch);
    return $response;
}