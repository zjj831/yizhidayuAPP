<?php
namespace Activity\Controller;
use Think\Controller;
class FmmarketController extends RequestCurlController
{
    private $millisecond;
    private $sign_sting;
    protected $ch;
    protected $cookie_file;
    protected $aes_obj;
    public function __construct()
    {
        require_once(VENDOR_PATH.'fmmarket/aes.php');
        header("Content-type: text/html; charset=utf-8");
        //$request = new \AlipayTradeAppPayRequest();
        $this->aes_obj = new \CryptAES();
        $this->aes_obj->set_key(C('API_KEY'));
        $this->aes_obj->set_iv(C('IV'));
        parent::__construct();
    }

    public function setObjectOption($param,$value)
    {
        $this->$param = $value;
    }

    //充值流量接口
    public function recharge()
    {
        $request= $_POST['orderid'];
        //$request='C9RSZLMS1511862909';
        $where['out_trade_no']=$request;
        $orderinfo=M('coupon_order')->where($where)->find();//查询订单信息
//查询流量信息
        $where1['content']=$orderinfo['order_subject'];
        $where1['costprice']=$orderinfo['buyer_pay_amount'];
        $flowinfo=M('coupon_flow')->where($where1)->find();
//$arr=json_decode($request,true);
        if($flowinfo)
        {
            $arr1=$this->request($orderinfo['phone'],$flowinfo['amount'],$flowinfo['content'],0,1,$request);
            echo $arr1;exit;
        }
        else
        {
            echo 2;exit;
        }

        //print_r($orderinfo['phone']);
    }
    public function callback()
    {
        /*$data['aa']='111';
        M('coupon_text')->data($data)->add();
        echo json_encode(array('status'=>1));*/
       header('Content-Type:application/json; charset=utf-8');
        $arr1=$GLOBALS['HTTP_RAW_POST_DATA'];
        /*$data['aa']=json_encode($arr1);
        M('coupon_text')->data($data)->add();*/
        $arr2=json_decode($arr1,true);
        if($arr2['status']==1)
        {
            $data['pay_status']=4;
            $where['out_trade_no']=$arr2['channelOrderId'];
            M('coupon_order')->where($where)->save($data);//将订单状态添加进数据库
            echo json_encode(array('status'=>1));
        }
        else
        {
            $data['pay_status']=5;
            $where['out_trade_no']=$arr2['channelOrderId'];
            M('coupon_order')->where($where)->save($data);//将订单状态添加进数据库
            echo json_encode(array('status'=>1));
        }
    }

    public function bb()
    {
        $recharge_url = "http://www.igaoyin.com/weixin/v3/ord/add?phone=13587015766&qq=878595213&name=测试";

        echo $this->curl_get_https($recharge_url);
    }
    function curl_get_https($url){
        $curl = curl_init(); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);  // 从证书中检查SSL加密算法是否存在
        $tmpInfo = curl_exec($curl);     //返回api的json对象
        //关闭URL请求
        curl_close($curl);
        return $tmpInfo;    //返回json对象
    }
    public function dd()
    {
        $recharge_url = "http://www.igaoyin.com/weixin/v3/ord/add";
        //echo $recharge_url;
        $this->setOption(CURLOPT_URL, $recharge_url);
        $head_info = array(
            //'Content-type: text/plain'
            'Content-Type: application/octet-stream; charset=UTF-8'
        );
        $data = array(
            'phone' => 13587015766,
            'qq'=>878595213,
            'name'=>'测试'
        );
        $o = '';
        foreach ($data as $k=>$v)
        {
            $o.= "$k=".urlencode($v)."&";		//默认UTF-8编码格式
        }
        $data=substr($o,0,-1);
        $this->setOption(CURLOPT_POSTFIELDS, $data);
        $this->setOption(CURLOPT_HTTPHEADER,$head_info);
        $this->setOption(CURLOPT_POST, 1);
        $this->setOption(CURLOPT_HEADER, 0);
        $recharge_info = $this->get();
        echo $recharge_info;
    }
    public function ee()
    {
        $url = "http://www.igaoyin.com/weixin/v3/ord/add";
//$url ="http://120.27.221.108/test/index.php/Activity/Fmmarket/ee";
        $post_data =array('phone' => 13587015766,
            'qq'=>87859521111,
            'name'=>'测试');
        $o = '';
        foreach ($post_data as $k=>$v)
        {
            $o.= "$k=".urlencode($v)."&";		//默认UTF-8编码格式
        }
        $post_data=substr($o,0,-1);

       /* $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// post数据
        curl_setopt($ch, CURLOPT_POST, 1);
// post的变量
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $output = curl_exec($ch);
        curl_close($ch);*/
//打印获得的数据
        print_r($post_data);
    }

    public function request($phone,$amount,$content,$range,$type=1,$order_number)
    {
        $this->set_present_time();
        //$order_number = $this->create_order_number();
        $_send_content = array(
            'cpUser'=>C('CP_USER'),
            'channelOrderId'=>$order_number,
            'content'=>$content,
            'createTime'=>date("YmdHis"),
            'type'=>$type,
            'range'=>$range,
            'amount'=>$amount,
            'mobile'=>$phone,
            'notifyUrl'=>C('NOTIFY_URL')
        );
        $aes_data = $this->get_aes_data(json_encode($_send_content));
        $result = $this->recharge_request($aes_data);

        //echo $order_number;
        return $result;
    }

    public function set_present_time()
    {
        /*$micro_time = explode(' ',microtime());
          $this->millisecond = floor($micro_time[1].($micro_time[0]*1000));*/
        list($s1, $s2) = explode(' ', microtime());
        $this->millisecond = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
    }
    public function get_sign_string($md5_sign)
    {
        $sign_array = array(C('CP_USER'),C('SECRET_KEY'),$md5_sign,$this->millisecond);
        sort($sign_array, SORT_STRING | SORT_FLAG_CASE);
        $sign_array_rs = array_reverse($sign_array);
        /*
        $len = count($sign_array);
        for($i=1;$i<$len;$i++)
        {
            for($j=$len-1;$j>=$i;$j--)
            if(strtolower($sign_array[$j])>strtolower($sign_array[$j-1]))
            {
               $x=$sign_array[$j];
               $sign_array[$j]=$sign_array[$j-1];
               $sign_array[$j-1]=$x;
            }
        }*/
        return implode('', $sign_array_rs);
    }

    public function recharge_request($data)
    {
        $md5_sign = md5($data);
        $_to_sign = $this->get_sign_string($md5_sign);
        //echo $_to_sign;
        $sha1_sign = sha1($_to_sign);
        //$recharge_url = "http://122.224.212.160:8980/recharge/order?d={$md5_sign}&t={$this->millisecond}&s={$sha1_sign}&a=".('CP_USER');
        $recharge_url = "http://mailiuliang.com.cn/api/recharge/order?d={$md5_sign}&t={$this->millisecond}&s={$sha1_sign}&a=".C('CP_USER');
        //echo $recharge_url;
        $this->setOption(CURLOPT_URL, $recharge_url);
        $head_info = array(
            //'Content-type: text/plain'
            'Content-Type: application/octet-stream; charset=UTF-8'
        );
        $this->setOption(CURLOPT_HTTPHEADER,$head_info);
        $this->setOption(CURLOPT_POST, 1);
        $this->setOption(CURLOPT_POSTFIELDS, $data);
        $this->setOption(CURLOPT_HEADER, 0);
        $recharge_info = $this->get();
        return $recharge_info;
    }

    public function get_aes_data($body)
    {
        return $this->aes_obj->encrypt($body);
    }

    public function create_order_number()
    {
        return substr(date("YmdHis").uniqid(mt_rand(), true),0,25);
    }

}
?>