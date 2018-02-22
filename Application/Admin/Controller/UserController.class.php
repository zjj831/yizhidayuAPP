<?php
namespace Admin\Controller;
//用户数据统计
class UserController extends CommonController
{
    /*
     * 1、当前注册用户数
2、分天注册用户数（当天显示到前一天的，按0点-24点统计）
3、今日登录用户数（实时或每隔一定时间刷新）
4、每条链接的分享数量
5、互动点击数
6、用户提现审核

    当前用户数（ios/安卓）
    总分享次数(种类1活动 2单卷 3邀请)
    今日登陆用户数

  条件:  1.开始时间  2.截至时间  
    1.用户注册数 （系统ios/安卓）
    2.分享次数(种类1活动 2单卷 3邀请)

     * */

    public function index()
    {
        $nowday=mktime(0,0,0,date("m"),date("d"),date("Y"));
        if($_GET['date']!='')
        {
            $nowday= strtotime($_GET['date']);
        }

        $nowTime=time();
        $info['usersum']=M('coupon_user')->count();//总用户量
        $info['usersumios']=M('coupon_user')->where('system=1')->count();//IOS用户量
        $info['usersuman']=M('coupon_user')->where('system=2')->count();//IOS用户量

        $info['clickuv']=M('click_uv')->count();//APP进入总UV
        $info['clickuvtoday']=M('click_uv')->where('create_day='.$nowday)->count();//当日进入UV

        $info['usertodaylogin']=M('coupon_user')->where(
       array(
           'last_login_time'=>array(array('egt',$nowday),array('elt',($nowday+86399)),'and')
       ) )->count();//当日登陆用户数
        $info['sharetimessum']=M('active_share')->count();//用户总分享次数
        $info['sharetimestoday']=M('active_share')->where('create_day='.$nowday)->count();//当日分享次数
        $sharepersontoday=M('active_share')->where('create_day='.$nowday)->group('member_id')->select();//当日分享人数
        $info['sharepersontoday']=count($sharepersontoday);
        $info['sharetimesyq']=M('active_share')->where(array('create_day'=>array('eq',$nowday), 'cate'=>array('eq',1)))->count();//当日分享邀请次数
        $sharepersonyq=M('active_share')->where(array('create_day'=>array('eq',$nowday), 'cate'=>array('eq',1)))->group('member_id')->select();
        $info['sharepersonyq']=count($sharepersonyq);//当日分享邀请人数
        $info['sharetimesactive']=M('active_share')->where(array('create_day'=>array('eq',$nowday), 'cate'=>array('eq',2)))->count();//当日分享活动次数
        $sharepersonactive=M('active_share')->where(array('create_day'=>array('eq',$nowday), 'cate'=>array('eq',2)))->group('member_id')->select();
        $info['sharepersonactive']=count($sharepersonactive);//当日分享活动人数
        $info['sharetimescert']=M('active_share')->where(array('create_day'=>array('eq',$nowday), 'cate'=>array('eq',3)))->count();//当日分享活动次数
        $sharepersonacert=M('active_share')->where(array('create_day'=>array('eq',$nowday), 'cate'=>array('eq',3)))->group('member_id')->select();
        $info['sharepersonacert']=count($sharepersonacert);//当日分享活动人数
        //echo json_encode($info);
        // echo  json_encode($info['sharepersontoday']);
        $this->assign('info',$info);
        $this->display();
    }


}