<?php
/**
 * Created by PhpStorm.
 * User: tinkle
 * Date: 2017/9/19
 * Time: 11:28
 */
namespace Activity\Controller;
use Think\Controller;

class PayforController extends Controller {
    var $aop;
    // 初始化
    protected function _initialize()
    {

        //支付宝支付
        require_once(VENDOR_PATH.'alipay/aop/AopClient.php');
        $this->aop    =    new \AopClient();
        $this->aop->appId                 = C('ALIPAY_APPID');
        //$this->aop->method             =C('ALIPAY_PID');
        $this->aop->format                 = "JSON";
        $this->aop->charset                = "utf-8";
        $this->aop->signType            = "RSA2";
        //$this->aop->sign               ='';
        //$this->aop->timestamp         =	date("Y-m-d H:i:s",time());
        $this->aop->apiVersion         =1.0;
        $this->aop->gatewayUrl            = C('ALIPAY_GATEWAYURL');
        $this->aop->rsaPrivateKey; //        = C('ALIPAY_RSAPRIVATEKEY');//私有密钥
        $this->aop->alipayrsaPublicKey;  //  = C('ALIPAY_RSAPUBLICEKEY');//共有密钥
        //$this->aop->notify_url          =C('ALIPAY_NOTIFY_URL');

    }

    /**
     * 创建APP支付订单
     *
     * @string $body 对一笔交易的具体描述信息。
     * @string $subject 商品的标题/交易标题/订单标题/订单关键字等。
     * @string $order_sn 商户网站唯一订单号
     * @return array 返回订单信息
     */


    // public function tradeAppPay($body, $subject, $order_sn, $total_amount)
    public function tradeAppPay($body, $subject, $order_sn, $total_amount){
        /*****测试数据******/
        require_once(VENDOR_PATH.'alipay/aop/request/AlipayTradeAppPayRequest.php');

        $request = new \AlipayTradeAppPayRequest();

        /*$bizcontent    =    [
            'body'                =>  $body,
            'subject'            =>    $subject,
            'out_trade_no'        =>   $order_sn, //确保唯一
            'timeout_express'    =>    '15m',//失效时间为 15分钟
            'total_amount'        =>    $total_amount,//价格
            'product_code'        =>    'QUICK_MSECURITY_PAY',
        ];*/

        $bizcontent = "{\"body\":\"$body\","
            . "\"subject\": \"$subject\","
            . "\"out_trade_no\": \"$order_sn\","
            . "\"timeout_express\": \"30m\","
            . "\"total_amount\": \"$total_amount\","
            . "\"product_code\":\"QUICK_MSECURITY_PAY\""
            . "}";



        //商户外网可以访问的异步地址 (异步回掉地址)
        //$err_url =U('Payfor/AliPayNotify');//设置回调地址
        $err_url=C('ALIPAY_NOTIFY_URL');
        $request->setNotifyUrl($err_url);//设置
        //$request->setBizContent(json_encode($bizcontent));
        $request->setBizContent($bizcontent);

        $response = $this->aop->sdkExecute($request);
       //return $bizcontent['total_amount'];
        return $response;
    }

    public function printInfo(){
        require_once(VENDOR_PATH.'alipay/aop/AopClient.php');
        $this->aop    =    new \AopClient();
        $a['gatewayUrl']=$this->aop->gatewayUrl            = C('ALIPAY_GATEWAYURL');
        $a['appId']=$this->aop->appId                 = C('ALIPAY_APPID');
        $a['rsaPrivateKey']=$this->aop->rsaPrivateKey         = C('ALIPAY_RSAPRIVATEKEY');//私有密钥
        $a['format']=$this->aop->format                 = "JSON";
        $a['charset']=$this->aop->charset                = "utf-8";
        $a['signType']=$this->aop->signType            = "RSA2";
        $a['alipayrsaPublicKey']=$this->aop->alipayrsaPublicKey     = C('ALIPAY_RSAPUBLICEKEY');//共有密钥
        $a['rsaPrivateKey1']=$this->aop->rsaPrivateKey;
        $a['bizcontent']    =    [
            'body'                =>  'body',
            'subject'            =>    'subject',
            'out_trade_no'        =>   'out_trade_no', //确保唯一
            'timeout_express'    =>    '15m',//失效时间为 15分钟
            'total_amount'        =>    'total_amount',//价格
            'product_code'        =>    'QUICK_MSECURITY_PAY',
        ];
        $a['notify_url']    =   C('ALIPAY_NOTIFY_URL');
        $a['method']             =C('ALIPAY_PID');
        $a['version']=$this->aop->apiVersion;
        $a['timestamp']=date('Y-m-d h:i:s');
        print_r('<pre>');
        print_r($a);
        print_r('</pre>');
    }

    /*******创建支付订单参数*************/
    public function appPay(){
        $request= $_POST['data'];
        // $request=array("body"=>"我是测试数据一只大鱼","total_amount" =>"0.01","subject" => "订单信息233", "out_trade_no" => "VP52M8OQ1506074547");
        //$request=json_encode(array("data"=>$request));
        //$request='{"body":"\u6211\u662f\u6d4b\u8bd5\u6570\u636e\u4e00\u53ea\u5927\u9c7c","total_amount":"0.01","subject":"\u8ba2\u5355\u4fe1\u606f233","out_trade_no":"NYFC4HIC1506153796"}';
        $arr=json_decode($request,true);
        $orderInfo    = $this->tradeAppPay($arr['body'], $arr['subject'], $arr['out_trade_no'], (float)$arr['total_amount']);

        $data['buyer_pay_amount']=(float)$arr['total_amount'];
        $data['phone']=$arr['phone'];
        $data['uid']=$arr['uid'];
        $data['pay_status']=0;
        $data['createtime']=time();
        $data['order_body']=$arr['body'];
        $data['order_subject']=$arr['subject'];
        $data['out_trade_no']=$arr['out_trade_no'];
        M('coupon_order')->data($data)->add();


        //$orderInfo    = $this->tradeAppPay();
        //将获取的参数返回给app端
        exit($orderInfo);
        //exit(json_encode($orderInfo));
       // exit($arr);
       /* print_r('<pre>');
        print_r($orderInfo);
        print_r('</pre>');*/
        /*if(!empty($orderInfo)){
            my_jsonReturn(1, 20170001, ['payinfo'=>$orderInfo], '操作成功');
        }else{
            my_jsonReturn(0, 20170002, ['payinfo'=>$orderInfo], '操作失败');
        }*/
        /*print_r('<pre>');
        print_r(explode('&',$orderInfo));
        print_r('</pre>');*/
    }

    /**
     * 以json方式格式化输出
     * @param int $status 状态：0-失败，1-成功
     * @param int $msg 返回状态码
     * @param string/array $data 数据
     * @param string $text 提示文字
     * @return string
     */

/*    public function my_jsonReturn($status=0, $code=0, $data='', $msg='',$type = 1){
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

    }*/

    /**
     * 异步通知验签
     *
     * @param string $params 参数
     * @param string $signType 签名类型：默认RSA
     * @return bool 是否通过
     */
    public function rsaCheck($params, $signType)
    {
        require_once(VENDOR_PATH.'alipay/aop/AopClient.php');
        $this->aop    =    new \AopClient();
        return $this->aop->rsaCheckV1($params, NULL, $signType);
    }

    //支付回调函数，把订单信息填入
    public function paynotify()
    {
        /*$where['']=;
        $data['pay_status']=1;
        M('coupon_order')->where('id=5')->save($data);*/
    }

    /*******异步通知处理***********/
    /*  public function err_url(){
        echo 'ceshi';
    }*/
    public function AliPayNotify()
    {
        $request  = $_POST;
        $signType = $request['sign_type'];
        $flag =$this->rsaCheck($request, $signType);
        $where['out_trade_no'] = $request['out_trade_no'] ;
        $orderinfo=M('coupon_order')->where($where)->find();
        if ($flag) {
            //支付成功:TRADE_SUCCESS   交易完成：TRADE_FINISHED
            if ($request['trade_status'] == 'TRADE_SUCCESS' || $request['trade_status'] == 'TRADE_FINISHED') {
                //这里根据项目需求来写你的操作 如更新订单状态等信息 更新成功返回'success'即可
                $object =  json_decode(($request['fund_bill_list']),true);
                $trade_type     =   $object[0]['fundChannel'];//支付渠道
                $data    =    [
                    'pay_status'        =>   1,
                    'pay_type'          =>   1,
                    'trade_type'        =>   $trade_type,
                    'pay_time'          =>   strtotime($request['gmt_payment'])
                ];
                /*if($orderinfo['pay_status']<3)
                {
                    $data['pay_status']=1;
                }*/
                //$saveorder      =   model('orders')->successPay($out_trade_no,$buyer_pay_amount,$data);
                M('coupon_order')->where($where)->save($data);//将订单状态添加进数据库
               exit('success'); //成功处理后必须输出这个字符串给支付宝程序执行完后必须打印输出“success”（不包含引号）。如果商户反馈给支付宝的字符不是success这7个字符，支付宝服务器会不断重发通知，直到超过24小时22分钟 间隔频率一般是：4m,10m,10m,1h,2h,6h,15h）；

            } else {
                $data['pay_status']=2;
                M('coupon_order')->where($where)->save($data);//将订单状态添加进数据库
                exit('fail');//订单不成功
            }
        } else {
            exit('fail');//验签失败
        }
    }

}
?>