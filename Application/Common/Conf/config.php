<?php
return array(
	//'配置项'=>'配置值'
    'PUBLIC'=>__ROOT__.'/Public',//公共文件位置
/*    'DOMAIN'=>'http://www.chipshare.cn',//域名
    'WODOMIAN'=>'http://www.chipshare.cn/we7/attachment/',//沃体验图片路径*/
    //数据库配置信息
    'DB_TYPE'=>'mysql',
    'DB_HOST'=>'127.0.0.1',
    'DB_NAME'=>'dybackground',
    'DB_USER'=>'root',
    'DB_PWD' =>'',
    'DB_PORT'=>3306,
    'DB_PREFIX'=>'dy_',
    'DB_CHARSET'=>'UTF8',
    'DB_DEBUG'=>true,

/*    'WOAPPID'=>'wxb77c6476c1b40ebb',//沃粉团APPID
    'WOAPPSECRET'=>'255faf681d79b6348276ff4c5a102a4e',//沃粉团APPSECRET
    'TEMPLATE_ID'=>'AJUTwWRDxmWGJw_kWFgymQx0yx7JFFZh77WO70fy2fc',//微信模板消息id
    'TEMPLATE_URL'=>'www.baidu.com',//模板跳转链接*/
    'ALIPAY_GATEWAYURL'=>'https://openapi.alipay.com/gateway.do',
    'ALIPAY_APPID'=>'',
    'ALIPAY_RSAPRIVATEKEY'=>'MIIEowIBAAKCAQEAnnnZLvYb3JEGAUUifpcIPDjUfZkfiLYLlq5XOqxVfLXDYpBtX/1r9J8pWWZfwDkYbV+oh7KMoBowUJALEAE8szFu71GwVAeqxv5MWSVZlXI3HLkEYrSM5KZy7ZV+8sk2uClvS9V7vJsL1sARLWY3qmd7lFktbtdpht9L0gv8MthvJNde3NRxIcRl288XWWSC+IbMuAK8ILj6qaVAbtoBKu6IlcD/1yFutKDPLS3I4CL0f/lEBoPi0LnxfUNvvN5X65TxoTg7tQvbnIt3R/QCtkpxQHYVH2+FPkyS0TPTXpP887UqzVIJCJbTK6/9V1bJ46DH9Pi0iPMaDd8f2PdbOwIDAQABAoIBAQCVKVEPj5wX1fSV+3GFPzkEHeV7NkXlEpwDvqLh2dU45Yg63H/mKoyTGb/8oowbTGI+iBwDZT5Rb3TsTzfqX4+3hh7JaNUTsoe+dxp7idkw/ej7wvVqxlAa4sQn9V8gu90iJ/XWpeCqXDEfd3ZzidN5M5+wuOM3gc+Un9YopRlC7NM6emFQPCkS0VPEkgFuHWWGJX0vAQ1M5W9WlGVpmS7zS0/mJcKd/jkoX0B18QBbxi1QgySVdvXSq37Edj94Ah/vQiEsdK9lWZ6mYo1wlXHYE2DMdWfYjdEMac/OOkAJ6BNgcUnaKUbsGZvWu3f6tH66+8sNwv4QEkEwO+cDu115AoGBAMrrmGXBEUgxvV2DtrcW0yZ6pgGEE4DI5U2QKgyq5mieRwbNCBaoP6/lLlaebVST7/SrjGt/wPxGRDsbRYFSD0ZFDCpJSHdI00tEvpg1L83VzlH0aFmeObSg25Pkg/bsEg51kvQdBjz1cWT9DkIRjIxE9sH7SYoE9k720Mf66PrPAoGBAMfuEofEJKHnw07845c2E6F+U4W7ZLMabU3jMdYieN7YpnKovR/MuVGEx9ssAqBtQb+ctkxf2gpYb+eUFXI4QPo61ZZXM93+4LOis2UATZPrtLJ6P2y4FI/I+gkyKOGwMLVfW5Z4tGipS5Y6uEODD3Rdu7+TF9hgTa6jlCEpfcPVAoGAbnM+SGSGW513TWdcFNw/ojowEbMqSncPGODXgn2jXF6KmpEPTgXWZI+CYXNqXxcHDU4y6HBpQuecS+/ULUfVOJJsxLeO0h65o8aPV5nbo1Y1LzaxddZB4qeL3TwM+GIWkfg9PNJvis6uIiH7mMqkjdUb2wpERPPefayqh69zENECgYBaajoLGBMQ/UUARbGPQq9iC0UuZ27E6KCh5qs1EeXjscqkc9cDuIveZ9QSNDcD4iUnyHFQ3NA4eYIyEnAYdYQ9JbpOASW9sXRhCKVkedyblq7jQBHK0vzJgbRB0GNYnVuJypQa2n+MDXPXfrqyHWUx1OoBWz4fZn37CpME5ESx+QKBgH1IdyTcLUaJ1AeMD6W/p+jhlqpe7yPifEskxwnh259RegmQk+k6rr70gaav/3MycBA4451uqHwxWipIwZqEmV+4c1bSztpXT+RW10+s0Cu1vV0cKUCGjtsBSHKLxr3y7H/K7QVcwrOY5wvlBCPkwmr/xd2MnfObo9NRO+PtMRSJ',
    'ALIPAY_RSAPUBLICEKEY'=>'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAh34hV7RFJ3f3zYK5f2sc4x08ilVg+n+SvDYnEPCU0f1S5WZStGP396qIx7lQeG/Sw7GKh+0+rcgwcBQgHHYhmg4QYFwUEBLh8co/KoSNULR2BgFk7f1FF4D3lL/ywtylO8l2LjIlEkTzWYz5UQoyiUJaJuc9ltfMbhp6HB6l6yAKdr43A/TDtZWbHX9dKpeGNZhn3eD6KSNnCochfU2TfOtB9XEwHsTGygb32d+TQifXenNsxvHOeYAUrATeUL1zuhep32l5a/qQ2rtI/oEeuNtZfR00ATolbkTmeo9tT3SXdfpNLk2eWb2M9uQXm23OJXNcLLFwILo8wKU2tOB8kQIDAQAB',
    'ALIPAY_PID'=>'alipay.trade.app.pay',
    'ALIPAY_NOTIFY_URL'=>'http://'.gethostbyname($_SERVER['SERVER_NAME']).'/test/index.php/Activity/Payfor/AliPayNotify',


//    'CP_USER'=>'200266',
//    'API_KEY'=>'AYiZxwvT6IDeSffqWRaCyre9FDGQy5IT',
//    'SECRET_KEY'=>'aspRKtT074Bipl8E',
    'CP_USER'=>'',
    'API_KEY'=>'',
    'SECRET_KEY'=>'',
    'IV'=>chr(0x31) . chr(0x37) . chr(0x36) . chr(0x35) . chr(0x34) . chr(0x33) . chr(0x32) . chr(0x31).chr(0x38) . chr(0x27) . chr(0x36) . chr(0x35) . chr(0x33) . chr(0x23) . chr(0x32) . chr(0x33),
    'NOTIFY_URL'=>'http://120.27.221.108/test/index.php/Activity/Fmmarket/callback',
);
